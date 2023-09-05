<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppControls extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','download_button'
    ];
}
