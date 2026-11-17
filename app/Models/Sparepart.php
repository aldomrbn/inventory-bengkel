<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sparepart extends Model
{
    protected $fillable = ['category_id', 'code', 'name', 'buy_price', 'sell_price', 'stock', 'min_stock'];

    // Relasi ke kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke transaksi
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
    //

