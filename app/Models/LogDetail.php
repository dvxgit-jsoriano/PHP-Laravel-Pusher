<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'aux_main',
        'aux_sub',
        'log_datetime',
    ];
}
