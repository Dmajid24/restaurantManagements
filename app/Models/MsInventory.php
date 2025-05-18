<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsInventory extends Model
{
    protected $table = 'msinventory';
    protected $primaryKey = 'ingredientID';
    public $incrementing = false; // Karena ingredientID berupa VARCHAR
    public $timestamps = false;

    protected $fillable = [
        'ingredientID',
        'ingredientName',
        'ingredientstock'
    ];

    // Relasi ke menuToInventory (satu bahan bisa digunakan di banyak menu)
    public function menuToInventories()
    {
        return $this->hasMany(MenuInventory::class, 'ingredientID', 'ingredientID');
    }
}
