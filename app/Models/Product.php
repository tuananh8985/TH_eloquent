<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'noteable');
    }
}
