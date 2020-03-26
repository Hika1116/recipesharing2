<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class View extends Model
{
    protected $fillable = [];

    final public function __set($key, $value)
    {
        throw new \RuntimeException('this class is just readable.');
    }

    final public function setAttribute($key, $value)
    {
        throw new \RuntimeException('this class is just readable.');
    }

    
}