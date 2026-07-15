<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'project_date',
    ];

    protected $casts = [
        'project_date' => 'date',
    ];
}
