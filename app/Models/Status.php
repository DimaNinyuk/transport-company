<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function productRequests()
    {
        return $this->hasMany(ProductRequest::class);
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
