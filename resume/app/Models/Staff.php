<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected  $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
