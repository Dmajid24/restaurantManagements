<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffPosition extends Model
{
    use HasFactory;

    protected $table = 'staff_position_table';
    protected $primaryKey = 'positionID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['positionID', 'positionName'];
}
