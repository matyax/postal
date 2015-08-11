<?php namespace App;

use CMS\Model\Base as BaseModel;
use Input;
use Gregwar\Image\Image as ImageLib;

class Image extends BaseModel {

    const SAVE_PATH = 'img/upload/';

    /*
     * Fillabel fields
     * @var Array
     */
    public $fillable = array(
        'class',
        'id_element',
        'extension'
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * Listen for events
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function($image) {

            $image->processThumbnails(function ($image, $thumbnail, $method) {
                $thumbnailPath = $image->getImage($thumbnail);

                $imagePath = Input::file('file') ? Input::file('file') : $image->path;

                ImageLib::open($imagePath)
                        ->$method($thumbnail[0], $thumbnail[1])
                        ->save($thumbnailPath);
            });

        });

        static::deleted(function($image) {

            $image->processThumbnails(function ($image, $thumbnail, $method) {
                $thumbnailPath = $image->getImage($thumbnail);

                if (file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            });

        });
    }

    public function processThumbnails($callback) {

        $model = $this->model;

        if (! isset($model->thumbnailConfig)) {
            return false;
        }

        foreach ($model->thumbnailConfig as $method => $thumbnails) {
            foreach ($thumbnails as $thumbnail) {
                $callback($this, $thumbnail, $method);
            }
        }

        return true;
    }

    public function getModelAttribute()
    {
        $className = '\\App\\' . ucfirst($this->class);

        if (! $this->id_element) {
            return new $className();
        }

        return $className::find($this->id_element);
    }

    public function getPath($name)
    {
        return self::SAVE_PATH . $name .  '.' . $this->extension;
    }

    public function getImage($thumbnail = NULL)
    {
        if (! $thumbnail) {
            return $this->getPath($this->id);
        }

        return $this->getPath($this->id . '_' . $thumbnail[0] . 'x' . $thumbnail[1]);
    }

    /*
     * Attributes
     */
    public function getPathAttribute()
    {
        return $this->getPath($this->id);
    }

    public function getThumbnailAttribute()
    {
        return $this->getPath($this->id . '_t');
    }

    private $_imageSize;

    public function getWidthAttribute() {
        if ($this->_imageSize) {
            return $this->_imageSize[0];
        }

        $this->_imageSize = getimagesize($this->path);

        return $this->getWidthAttribute();
    }

    public function getHeightAttribute() {
        if ($this->_imageSize) {
            return $this->_imageSize[1];
        }

        $this->_imageSize = getimagesize($this->path);

        return $this->getHeightAttribute();
    }

}
