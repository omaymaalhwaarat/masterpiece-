<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'discount_id', 'how_to_use'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
public function orders()
{
    return $this->belongsToMany(Order::class);  // إذا كانت العلاقة Many-to-Many
    // أو إذا كانت العلاقة One-to-Many
    // return $this->hasMany(Order::class);
}


}