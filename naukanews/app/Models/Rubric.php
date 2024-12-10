<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    protected  $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'rubric_id');
    }
}
