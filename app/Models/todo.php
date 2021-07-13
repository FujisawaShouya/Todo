<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $table = 'todo';
    protected $guarded = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'content'];
}
