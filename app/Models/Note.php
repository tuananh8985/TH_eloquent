<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = array('noteable_id', 'noteable_type', 'notes');
 
    /**
     * Get all of the owning noteable models.
     */
    public function noteable()
    {
        return $this->morphTo();
    }
}
