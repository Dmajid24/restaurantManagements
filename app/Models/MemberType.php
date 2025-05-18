<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberType extends Model
{
    use HasFactory;

    protected $table = 'member_type_table';
    protected $primaryKey = 'membertypeID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['membertypeID', 'membertypeName'];
}
