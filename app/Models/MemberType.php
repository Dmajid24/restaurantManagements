<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    use HasFactory;

    protected $table = 'membertypetable';
    protected $primaryKey = 'membertypeID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['memberTypeID', 'memberTypeName'];
}
