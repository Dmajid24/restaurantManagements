<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MsStaff extends Model
{
    protected $table = 'msstaff';
    protected $primaryKey = 'staffID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'staffID',
        'staffName',
        'staffEmail',
        'staffPositionID'
    ];

    public function position()
    {
        return $this->belongsTo(StaffPosition::class, 'staffPositionID', 'staffPositionID');
    }
}
