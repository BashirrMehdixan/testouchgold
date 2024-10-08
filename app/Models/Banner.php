<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        "title", "title_color", "description", "description_color", "image", "slug",
    ];

    protected array $translatable = [
        "title", "description",
    ];
}
