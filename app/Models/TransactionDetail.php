<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'sparepart_id',
        'qty',
        'price', // <-- Tambahkan ini
    ];

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}