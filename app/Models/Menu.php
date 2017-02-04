<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Menu extends Model
{
    //
    use CrudTrait;
    protected $table = 'menus';
    protected $fillable = ['category','name','ingridient','price','weight'];
    public $timestamps = true;

    public function parent()
    {
        return $this->belongsTo('App\Models\CategoryMenu', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryMenu', 'category','id');
    }


    public function children()
    {
        return $this->hasMany('App\Models\CategoryMenu', 'pid');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }
}
