<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialControl extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'materialcontrol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id', 
        'material_id','amount'
    ];
}
