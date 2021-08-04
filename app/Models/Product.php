<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    public $fillable = [
        'name', 'cate_id', 'price', 'quantity', 'detail'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id');
    }

    // public function tags(){
    //     return $this->hasManyThrough(Tag::class, ProductTag::class, 'product_id', 'tag_id', 'id', 'id');
    // }
}
