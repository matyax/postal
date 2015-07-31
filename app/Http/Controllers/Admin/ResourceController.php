<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use CMS\Resource\PersistenceInterface as ResourcePersistence;
use Input;
use Excel;

class ResourceController extends Controller
{
    protected $_resourcePersistence;
    protected $_queryConditions = [];
    protected $_listOrder = 'id DESC';

    public function __construct(ResourcePersistence $resourcePersistence) {
        $this->_resourcePersistence = $resourcePersistence;
        $this->_resourcePersistence->setResource($this->resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Input::get('ajax')) {
            return $this->_resourcePersistence->getAll($this->_getListOrder(), $this->_getQueryConditions());
        }

        return view('admin.' . $this->resource . '.index')
                ->with('resource', $this->resource);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.' . $this->resource . '.edit')
                ->with('resource', $this->resource);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return $this->_resourcePersistence->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.' . $this->resource . '.show')
                ->with('resource', $this->resource)
                ->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Input::get('ajax')) {
            return $this->_resourcePersistence->get($id);
        }

        return view('admin.' . $this->resource . '.edit')
                ->with('resource', $this->resource)
                ->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return $this->_resourcePersistence->store($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->_resourcePersistence->destroy($id);
    }

    /**
     * Delete image
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteImage($id)
    {
        return $this->_resourcePersistence->deleteImage($id);
    }

    /**
     * Post images
     *
     * @return Response
     */
    public function postImages()
    {
        return $this->_resourcePersistence->postImages();
    }

    /**
     * Get images
     *
     * @return Response
     */
    public function getImages($id)
    {
        return $this->_resourcePersistence->getImages($id);
    }

    /**
     * Export as XLS
     *
     * @return Response
     */
    public function export()
    {
        $models     = $this->_resourcePersistence->getAll($this->_getListOrder(), $this->_getQueryConditions(), false);
        $classname  = '\App\\' . ucfirst($this->resource);

        Excel::create($this->resource, function($excel) use ($models, $classname) {

            $excel->sheet('Datos exportados', function($sheet) use ($models, $classname) {

                $sheet->row(1, $classname::getXLSheaders());

                $row = 2;
                $endLetter = chr(ord('A') + count($classname::getXLSheaders()) - 1);

                foreach ($models as $model) {
                    $sheet->row($row, $model->toXLS());

                    $backgroundColor    = $model->getXLSbackgroundColor();
                    $fontColor          = $model->getXLSfontColor();

                    if ($backgroundColor) {
                        $sheet->cells('A' . $row . ':' . $endLetter . $row, function($cells) use ($backgroundColor, $fontColor) {
                            $cells->setBackground($backgroundColor);
                            $cells->setFontColor($fontColor);
                        });
                    }

                    $row++;
                }

            });

        })->export('xls');

        return;
    }

    protected function _getQueryConditions()
    {
        if (Input::get('search')) {
            $search = [];

            foreach (Input::get('search') as $key => $value) {
                if (empty($value)) {
                    continue;
                }

                $search[$key] = $value;
            }

            $this->_queryConditions = array_merge($this->_queryConditions, $search);
        }

        return $this->_queryConditions;
    }

    protected function _getListOrder()
    {
        return Input::get('orderBy') ? Input::get('orderBy') : $this->_listOrder;
    }
}