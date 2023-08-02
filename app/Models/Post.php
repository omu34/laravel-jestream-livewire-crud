<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'go_live_date',
    ];

    protected $dates = [
        'go_live_date',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
}
