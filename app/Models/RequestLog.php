<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'request_id',
        'status',
        'note',
        'forword_to_id',
        'forword_from_id',
    ];


}
