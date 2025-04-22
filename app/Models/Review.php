<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // تحديد الجدول الذي يتعامل معه هذا الموديل
    protected $table = 'reviews';

    // تحديد الأعمدة التي يمكن ملؤها (Mass Assignment)
    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rating',
    ];

    // علاقة مع موديل User (مراجعة من قبل مستخدم معين)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع موديل Product (مراجعة مرتبطة بمنتج معين)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}