<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryControl extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'categorycontrol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id','category_id',
    ];

    public function categorys(){
        return $this->hasMany(Category::class);
    }
}
