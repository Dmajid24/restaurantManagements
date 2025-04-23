<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPosition extends Model
{
    use HasFactory;

    protected $table = 'staffpositiontable';
    protected $primaryKey = 'positionID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['positionID', 'positionName'];
}
