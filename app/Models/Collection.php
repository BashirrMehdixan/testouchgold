<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Collection extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'thumbnail',
        "status",
    ];

    protected array $translatable = ["name", "slug", "description"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
