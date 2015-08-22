<?php namespace CMS\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use App\Image;

class Base extends EloquentModel
{
    protected $table;
    protected $fillable;
    protected $fillableRelations             = [];
    public static $eagerLoadingRelationships = [];
    protected $hasImages                     = false;

    public $images = [];

    public function getFillableFieldsAttribute()
    {
        return $this->fillable;
    }

    public function getFillableRelationsAttribute()
    {
        return $this->fillableRelations;
    }

    public function getUploadedImagesAttribute()
    {
        if (! $this->images) {
            $this->loadImages();
        }

        return $this->images;
    }

    /*
     * Load user upload images
     */
    public function loadImages()
    {
        $this->images = [];

        if (! $this->id) {
            return;
        }

        $class = lcfirst(str_replace('App\\', '', get_class($this)));

        $images = Image::where('id_element', $this->id)
                        ->where('class', $class)
                        ->orderBy('id', 'DESC')
                        ->get();

        foreach ($images as $image) {
            if (! file_exists($image->path)) {
                continue;
            }

            $size = getimagesize($image->path);

            $this->images[] = [
                'id'            => $image->id,
                'path'          => '/' . $image->path,
                'size'          => [ $size[0], $size[1] ],
                'thumbnail'     => '/' . $image->thumbnail,
                'type'          => $image->type,
            ];
        }
    }

    /*
     * Override toArray to include images.
     */
    public function toArray()
    {
        $array = parent::toArray();

        if ($this->hasImages) {
            $this->loadImages();
        }


        $array['images'] = $this->images;

        return $array;
    }
}