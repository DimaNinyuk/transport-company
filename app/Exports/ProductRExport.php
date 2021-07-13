<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\ProductRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductRExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
}
