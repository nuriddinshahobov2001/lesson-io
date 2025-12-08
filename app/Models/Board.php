<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['user_id', 'name', 'color', 'position', 'project_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('position');
    }

}
