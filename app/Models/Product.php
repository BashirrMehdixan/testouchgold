<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'collection_id',
        "brand_id",
        "wedding_occasion_id",
        'description',
        'price',
        'sale_price',
        'image',
        "status",
    ];
    protected array $translatable = [
        "name", "slug", "description"
    ];
    protected $casts = ['image' => 'array'];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
