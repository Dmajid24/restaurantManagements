<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactionHeader extends Model
{
    protected $table = 'transactionHeader';
    protected $primaryKey = 'TransactionID';
    public $incrementing = false; // Karena ID-nya bukan auto-increment
    protected $keyType = 'string'; // Karena tipe datanya VARCHAR
    public $timestamps = false; // Jika tabel tidak punya created_at dan updated_at

    // Relasi ke customer
    public function customer()
    {
        return $this->belongsTo(MsCustomer::class, 'customerID', 'customerID');
    }

    // Relasi ke staff
    public function staff()
    {
        return $this->belongsTo(MsStaff::class, 'staffID', 'staffID');
    }

    // Relasi ke detail transaksi
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'TransactionID', 'TransactionID');
    }
}
