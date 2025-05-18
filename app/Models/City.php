<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model{
    use HasFactory;
    protected $table = 'citytable';
    protected $primaryKey = 'cityId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['cityId', 'cityName'];
}
