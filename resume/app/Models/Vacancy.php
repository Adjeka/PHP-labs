<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected  $primaryKey = 'id';

    protected $fillable = [
        'firm_id',
        'staff_id'
    ];
}
