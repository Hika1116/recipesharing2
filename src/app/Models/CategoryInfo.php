<?php

namespace App\Models;

// use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\View;

class CategoryInfo extends View
{
    protected $table = 'categorycontrol';

    protected static function boot(){

        parent::boot();

        static::addGlobalScope('core', function (Builder $builder) {
            $builder
                ->select('categorycontrol.id as categorycontrol_id', 'categorys.id as category_id', 'categorys.category_name as category_name')
                ->leftJoin('categorys', 'categorycontrol.category_id', 'categorys.id');
        });
    }

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}