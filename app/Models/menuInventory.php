<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menuInventory extends Model
{
    protected $table = 'menuinventory';
    protected $primaryKey = 'menuInventoryID';
    public $incrementing = false; // karena tipe VARCHAR
    public $timestamps = false;

    protected $fillable = [
        'menuInventoryID',
        'menuID',
        'ingredientID',
        'ingredient_quantity'
    ];

    // Relasi ke menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menuID', 'menuID');
    }

    // Relasi ke inventory/bahan
    public function inventory()
    {
        return $this->belongsTo(MsInventory::class, 'ingredientID', 'ingredientID');
    }
}
