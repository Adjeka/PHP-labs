<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected  $primaryKey = 'id';

    protected $fillable = [
        'title',
        'lid',
        'content',
        'image',
        'rubric_id'
    ];

    public function rubric()
    {
        return $this->belongsTo(Rubric::class, 'rubric_id');
    }
}
