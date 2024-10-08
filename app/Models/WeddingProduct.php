<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class WeddingProduct extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'sale_price',
        'image',
        'wedding_occasion_id',
        'status',
    ];
    protected $casts = ['image' => 'array'];

    public array $translatable = ['name', 'slug', 'description'];

    public function wedding_occasion(): BelongsTo
    {
        return $this->belongsTo(WeddingOccasion::class);
    }
}
