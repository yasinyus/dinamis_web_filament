<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'app_name',
        'title',
        'logo_image',
        'banner_content',
        'footer_content',
        'footer',
        'description',
    ];
}
