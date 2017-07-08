<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Primary key of the table
     *
     * @var integer
     */
    protected $primaryKey = 'id';


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at'];

    protected $guarded = ['id','path_info'];


    public function blogs()
    {
        return $this->hasMany('App\Entity\Blog', 'category_id');
    }
}
