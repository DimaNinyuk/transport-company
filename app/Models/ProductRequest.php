<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'adress',
        'phone',
        'email',
        'comment',
        'customer_id',
        'user_id',
        'product_id',
        'status_id',
        'package_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
