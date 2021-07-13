<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'size',
        'price',
        'status_id',
    ];
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    public function productRequests()
    {
        return $this->hasMany(ProductRequest::class);
    }
}
