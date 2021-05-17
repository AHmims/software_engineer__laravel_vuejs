<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name', 'description', 'price', 'image'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }
}
