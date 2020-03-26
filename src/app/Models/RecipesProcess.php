<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipesProcess extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'recipesprocess';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id', 'recipe_order', 'process_text',
    ];
}
