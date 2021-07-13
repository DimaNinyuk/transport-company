<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'track_number',
        'transport_company_id',
    ];
    public function transportCompany(){
        return $this->belongsTo(TransportCompanies::class);
    }
    public function productRequests()
    {
        return $this->hasMany(ProductRequest::class);
    }
}
