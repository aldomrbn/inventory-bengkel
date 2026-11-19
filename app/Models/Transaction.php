<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'user_id',
        'type', // IN atau OUT
        'note',
    ];

    // Relasi ke detail transaksi (Satu transaksi punya banyak detail barang)
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Relasi ke user/admin yang melakukan transaksi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke bengkel pemilik transaksi
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}