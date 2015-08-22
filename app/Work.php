<?php namespace App;

use CMS\Model\Base as BaseModel;

class Work extends BaseModel
{
    protected $hasImages = true;

    /**
     * Array of relationships to eager load with list queries.
     *
     * @var array
     */
    public static $eagerLoadingRelationships = [
        'category'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'works';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'work_category_id',
        'position',
        'display_home'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'display_home' => 'boolean'
    ];

    /*
     * Relationships
     */
    public function category()
    {
        return $this->belongsTo('App\WorkCategory');
    }

    /*
     * Methods
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->category) {
            $data['category'] = $this->category->title;
        }

        return $data;
    }
}
