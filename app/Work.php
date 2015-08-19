<?php namespace App;

use CMS\Model\Base as BaseModel;

class Work extends BaseModel
{
    protected $hasImages = true;

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
        'position'
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
}
