<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    // الوصول إلى الملف الشخصي للمستخدم عبر علاقة المستخدم
    public function profile()
    {
        return $this->user()->profile(); // الوصول إلى ملف المستخدم الشخصي
    }
    public function products()
{
    return $this->belongsToMany(Product::class);  // إذا كانت العلاقة Many-to-Many
    // أو إذا كانت العلاقة One-to-Many
    // return $this->belongsTo(Product::class);
}

}