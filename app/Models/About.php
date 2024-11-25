<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'logo',
        'favicon'
    ];

    public array $translatable = [
        'title',
        'description',
        'content',
    ];
}
