<?php namespace App;

use CMS\Model\Base as BaseModel;

class WorkCategory extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'work_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'position' ];

    /**
     * Relations
     */

    /**
     * Methods
     */
}
