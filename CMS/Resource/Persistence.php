<?php namespace CMS\Resource;

use Response;
use Exception;
use Input;
use Gregwar\Image\Image as ImageLib;
use CMS\Database\Query;
use App\Image;

//require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/gregwar/image/Gregwar/Image/Image.php');

class Persistence implements PersistenceInterface
{
    public function __construct()
    {
        set_time_limit(0);
        ini_set('memory_limit','100M');
    }

    private $_modulePrefix = '';
    private $_resource = '';
    private $_resourceClassname = '';

    public function setModulePrefix($modulePrefix)
    {
        $this->_modulePrefix = $modulePrefix;
    }

    public function setResource($resource)
    {
        $this->_resource = $resource;
        $this->_resourceClassname = '\\App\\' . ucfirst(camel_case($this->_resource));
    }

    /* Create */
    public function create()
    {
        return \View::make($this->_resource . '.edit')
                    ->with('resource', $this->_resource)
                    ->with('resourceName', $this->_resourceName);
    }

    private function _replaceSmartValues($modelData)
    {
        foreach ($modelData as $key => $value) {
            if (\CMS\Date::isDate($value)) {
                $modelData[$key] = \CMS\Date::toDbFormat($value);
            }
        }

        return $modelData;
    }

    public function store($id = NULL)
    {
        try {
            $modelData = Input::get($this->_resource);

            if (empty($modelData)) {
                throw new Exception('No se recibieron datos para ' . $this->_resource);
            }

            $modelData = $this->_replaceSmartValues($modelData);
            $className = $this->_resourceClassname;

            if ($id) {
                $model = $className::find($id);

                if (!$model) {
                    throw new Exception('Objeto no encontrado.');
                }

                foreach ($model->fillableFields as $fillable) {

                    $model->$fillable = isset($modelData[$fillable]) ? $modelData[$fillable] : $model->$fillable;
                }

                if (! $model->save()) {
                    throw new Exception('No se pudo guardar.');
                }

                foreach ($model->fillableRelations as $fillable) {

                    $model->$fillable = isset($modelData[$fillable]) ? $modelData[$fillable] : $model->$fillable;
                }
            } else {
                $model = new $className($modelData);

                if (! $model->save()) {
                    throw new Exception('No se pudo crear.');
                }

                $this->_addImages($model->id);
            }

            $this->_updateImages($model);

            /*
             * Processing relations
             */
            foreach ($modelData as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }

                if ($key == 'images') {
                    continue;
                }

                if ($key == 'many') {
                    $this->_saveMany($model, $value); //one to many

                    continue;
                }

                //$model->$key()->sync($value); //many to many
            }

            /*
             * Post saves
             */
            if ($id) {
                return $this->_updateSuccess();
            }

            return $this->_storeSuccess();

            if ($model->hasErrors()) {
                foreach ($model->getErrors()->all() as $error) {
                    throw new Exception($error);
                }
            }
        } catch (Exception $ex) {
            return response()->json(array(
                'result' => 'error',
                'message' => $ex->getMessage()
            ));
        }
    }

    private function _saveMany($model, $values)
    {
        $keys       = array_keys($values);
        $className  = ucfirst($keys[0]);
        $values     = $values[$keys[0]];

        $mergedValues = array();
        $allAmptyFields = true;
        foreach ($values as $key => $data)
        {
            for ($i = 0; $i < count($data); $i++) {
                $mergedValues[$i][$key] = $data[$i];

                if (! empty($data[$i])) {
                    $allAmptyFields = false;
                }
            }
        }

        if ($allAmptyFields) {
            return false;
        }

        $relationshipName = $className::$modelPluralName;

        foreach ($mergedValues as $data) {
            $childModel = new $className($data);

            $model->$relationshipName()->save($childModel);
        }

        return true;
    }

    protected function _storeSuccess()
    {
        return response()->json(array(
            'result' => 'success',
            'message' => 'Ítem creado exitosamente.'
        ));
    }

    /* Update */

    public function get($id)
    {
        $className = $this->_resourceClassname;
        $model = $className::find($id);

        return response()->json($model);
    }

    protected function _updateSuccess()
    {
        return response()->json(array(
            'result' => 'success',
            'message' => 'Ítem actualizado exitosamente.'
        ));
    }

    public function update($id)
    {
        return $this->store($id);
    }

    /* List */

    public function getAll($order = 'id DESC', $conditions = [], $json = true)
    {
        $models = \CMS\Database\Query::find($this->_resourceClassname, $conditions, $order);

        if ($json) {
            return response()->json(array( $this->_resource => $models ));
        }

        return $models;
    }

    /*
     * Delete
     */
    public function destroy($id)
    {
        $className = $this->_resourceClassname;
        $model = $className::find($id);

        if ($model) {
            $model->delete();

            foreach (Image::where('id_element', $id)
                    ->where('class', $this->_resource)
                    ->get() as $image) {

                $image->delete();

            }
        }

        return \response()->json(array(
            'result' => 'success'
        ));
    }

    /*
     * Upload image
     */

    private function _addImages($id_element)
    {
        return Image::where('id_element', 0)
                        ->where('class', $this->_resource)
                        ->update([
                            'id_element'    => $id_element
                        ]);
    }

    private function _updateImages($model) {
        $images = Input::get('images');

        if (! $images) {
            return false;
        }

        foreach ($images as $imageData) {
            $image = Image::find($imageData['id']);

            if (! $image) {
                continue;
            }

            if (isset($imageData['description'])) {
                $image->description = $imageData['description'];
            }

            if (isset($imageData['category_id'])) {
                $image->category_id = $imageData['category_id'];
            }

            if (isset($imageData['type'])) {
                $image->type = $imageData['type'];
            }

            $image->save();
        }

        return true;
    }

    public function postImages()
    {
        try {
            $data = Input::get('data');

            if ($data) {
                $data = json_decode($data);
            }

            if ((is_object($data)) && (isset($data->id))) {
                $id = $data->id;
            } else {
                $id = 0;
            }

            $image = new Image([
                'class'         => $this->_resource,
                'id_element'    => $id,
                'extension'     => strtolower(Input::file('file')->getClientOriginalExtension())
            ]);

            if (! $image->save()) {
                throw new Exception('Error inserting image.');
            }

            if ($image->extension == 'gif') {
                copy(Input::file('file'), $image->path);
            } else {
                ImageLib::open(Input::file('file'))
                    ->save($image->path);
            }

            ImageLib::open($image->path)
                    ->resize(100, 100)
                    ->save($image->thumbnail);

            return response()->json([
                'id'        => $image->id,
                'image'     => '/' . $image->path,
                'thumbnail' => '/' . $image->thumbnail
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    /*
     * Retrieve image
     */
    public function getImages()
    {
        $images = Query::find('Image', [
            'id_element' => 0
        ]);

        $response = [];

        foreach ($images as $image) {
            $response[] = [
                'id'        => $image->id,
                'image'     => '/' . $image->path,
                'thumbnail' => '/' . $image->thumbnail
            ];
        }

        return response()->json($response);
    }

    /*
     * Delete image
     */
    public function deleteImage($id)
    {
        $image = Image::find($id);

        if ($image) {
            $image->delete();
        }

        return response()->json([ 'result' => 'success' ]);
    }

    /*
     * Sort items
     */
    public function sort()
    {
        $className = $this->_resourceClassname;

        $i = 1;

        foreach (Input::get('ids') as $id) {
            $model = $className::find($id);
            $model->position = $i++;
            $model->save();
        }

        return response()->json(['result' => 'success']);
    }
}
