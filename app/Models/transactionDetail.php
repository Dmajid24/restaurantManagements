<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transactiondetail'; 

    // Primary Key (opsional, jika bukan 'id')
    protected $primaryKey = 'transactionID';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'transactionDate',
        'menuID',   
        'quantity',    
    ];
    public $timsstamps = true;

    public function transactionHeaders() {
        return $this->belongsTo(transactionHeader::class, 'transactionID', 'transactionID');
    }
    public function menu() {
        return $this->belongsTo(Menu::class, 'menuID', 'menuID');
    }
}
