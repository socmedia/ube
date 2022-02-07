<?php

namespace Modules\Lead\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_type', 'name', 'phone', 'email', 'address', 'question', 'status', 'is_readed',
    ];
}