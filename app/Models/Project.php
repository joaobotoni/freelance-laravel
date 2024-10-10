<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ProjectStatus;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ends_at',
        'status',
        'tech_stack',
        'created_by',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'status' => ProjectStatus::class,
        'ends_at' => 'datetime',
    ];

    public function author() { 
        return $this->belongsTo(User::class, 'created_by');
    }
}
