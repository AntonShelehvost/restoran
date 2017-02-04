<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class CategoryMenu extends Model
{
    //
    use CrudTrait;
    protected $table = 'category_menus';
    protected $fillable = ['name','pid'];
    public $timestamps = true;

    public function parent()
    {
        return $this->belongsTo('App\Models\CategoryMenu', 'pid');
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
