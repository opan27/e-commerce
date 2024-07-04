<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFilter;
use App\Models\Products;

class ProductFilterController extends Controller
{
    public function index()
    {
        $productFilter = [];
        $dataProductFilter = ProductFilter::all();
        foreach($dataProductFilter as $filter){
            $json = json_decode($filter['value']);
            $statusFilter = $filter['key'];
            $status = $filter['status'];
            $p = [];
            foreach($json as $i){
                $prod = Products::where('id', $i->pid)->first();
                $p[] = $prod;
            }

            $array = [
                "status_product" => $statusFilter,
                "data_product" => $p,
                "status" => $status
            ];
            $productFilter[] = $array;
        }
        return view('pages.product-filter.index', compact('productFilter'));
    }
}
