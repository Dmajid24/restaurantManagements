<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsCustomer extends Model
{
    protected $table = 'mscustomer';
    protected $primaryKey = 'customerID';
    public $incrementing = false; // karena tipe VARCHAR
    public $timestamps = false;

    protected $fillable = [
        'customerID',
        'customerName',
        'customerAddress',
        'memberTypeID',
        'cityID'
    ];

    // Relasi ke member type
    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'memberTypeID', 'memberTypeID');
    }

    // Relasi ke kota
    public function city()
    {
        return $this->belongsTo(City::class, 'cityID', 'cityID');
    }

    // Relasi ke transaksi
    public function transactionHeaders()
    {
        return $this->hasMany(TransactionHeader::class, 'customerID', 'customerID');
    }
}
