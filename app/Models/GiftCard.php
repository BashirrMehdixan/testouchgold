<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GiftCard extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail',
        'file',
        'status'
    ];
    protected $casts = ['file' => 'array'];

    protected array $translatable = ['name', 'slug', 'description'];
}
