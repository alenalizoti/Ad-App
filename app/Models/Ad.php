<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'condition',
        'image_path',
        'contact_phone',
        'location',
        'user_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
