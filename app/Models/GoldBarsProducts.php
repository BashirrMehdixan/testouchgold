<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class GoldBarsProducts extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'gold_bars_id',
        'name',
        'slug',
        'description',
        'price',
        'thumbnail',
        'status',
    ];
    protected array $translatable = [
        'name',
        'slug',
        'description',
    ];
    protected $casts = ['thumbnail' => 'array'];

    public function gold_bars(): BelongsTo
    {
        return $this->belongsTo(GoldBar::class);
    }
}
