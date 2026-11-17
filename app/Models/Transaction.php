<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // IN atau OUT
        'note',
    ];

    // Relasi ke detail transaksi (Satu transaksi punya banyak detail barang)
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}