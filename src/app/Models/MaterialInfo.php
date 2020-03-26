<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Models\View;

class MaterialInfo extends View
{
    protected $table = 'materialcontrol';

    protected static function boot(){

        parent::boot();

        static::addGlobalScope('core', function (Builder $builder) {
            $builder
                ->select('materialcontrol.id as materialcontrol_id', 'materials.id as material_id', 'materials.material_name as material_name','materialcontrol.amount as amount')
                ->leftJoin('materials', 'materialcontrol.material_id', 'materials.id');
        });
    }

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}