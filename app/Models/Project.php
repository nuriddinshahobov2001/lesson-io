<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'created_by'];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function boards()
    {
        return $this->hasMany(Board::class, 'project_id')->orderBy('position');
    }

    public function members()
    {
        return $this->hasMany(ProjectUser::class, 'project_id');
    }
}
