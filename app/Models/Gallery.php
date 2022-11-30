<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
      'user_id',
      'title' ,
      'description',
      'date',
      'status',
      'done_time',
    ];
    use HasFactory;
}
