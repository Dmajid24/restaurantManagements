<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'msmenu';
    protected $primaryKey = 'menuID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'menuID',
        'menuName',
        'menuPrice',
        'menuCalorie',
    ];

    // Relasi ke menuToInventory
    public function menuInventories(): HasMany
    {
        return $this->hasMany(menuInventory::class, 'menuID', 'menuID');
    }

    // Relasi ke TransactionDetail
    public function transactionDetails(): HasMany
    {
        return $this->hasMany(transactionDetail::class, 'menuID', 'menuID');
    }
}
