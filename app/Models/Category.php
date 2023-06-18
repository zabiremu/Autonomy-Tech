<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_id ', 'category_name','category_status'];
    // subcategories relationship
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'category_id')->with('subcategories');
    }

    // categories relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
