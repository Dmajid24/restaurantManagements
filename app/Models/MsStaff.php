<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsStaff extends Model
{
    use HasFactory;

    protected $table = 'msstaff';
    protected $primaryKey = 'staffID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'staffID',
        'staffName',
        'staffpositionID',
        'staffAddress',
        'cityID'
    ];

    // Relasi (opsional)
    public function position()
    {
        return $this->belongsTo(StaffPosition::class, 'staffpositionID', 'positionID');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cityID', 'cityId');
    }
}
