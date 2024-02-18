<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    function rel_to_cat(){
        return $this->belongsTo(Category::class,'category_id');
    }

    function rel_to_sub(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    function rel_to_brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    function rel_to_sub_product(){
        return $this->belongsTo(SubProduct::class,'product_sub_id');
    }

    function rel_to_inventory(){
        return $this->hasMany(Inventory::class,'product_id');
    }

    function rel_to_color(){
        return $this->belongsTo(Color::class,'color_id');
    }

    function rel_to_size(){
        return $this->belongsTo(Size::class,'size_id');
    }
}
