<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;
use App\ProjectStatus;

class Project extends Model
{
    use HasFactory;

    public function casts()
    {
        return [
            'tech_stack' => 'array',
            'status' => ProjectStatus::class,
            'ends_at' => 'datetime',
        ];
    }

    public function proposals(){
        return $this->hasMany(Proposal::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'created_by');
    }

}
