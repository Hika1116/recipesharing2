<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recipe extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'recipes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'sentence','created_sum'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoryInfos() {
        return $this->hasMany(CategoryInfo::class);
    }
    public function materialInfos(){
        return $this->hasMany(MaterialInfo::class);
    }
}
