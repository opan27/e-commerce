<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductFilter;
use App\Models\CartModel;
use Illuminate\Support\Facades\DB;

class HomeFeController extends Controller
{
    public function index()
    {
        $dataCategory = Category::all();
        $productFilter = [];
        $dataProductFilter = ProductFilter::all();
        foreach($dataProductFilter as $filter){
            $json = json_decode($filter['value']);
            $statusFilter = $filter['key'];
            $status = $filter['status'];
            $p = [];
            foreach($json as $i){
                $prod = Products::join('productCat', 'products.productCat', '=', 'productCat.id')->where('products.id', $i->pid)->first();
                $p[] = $prod;
            }

            $array = [
                "status_product" => $statusFilter,
                "data_product" => $p,
                "status" => $status
            ];
            $productFilter[] = $array;
        }


        return view('pages-fe.home', compact('dataCategory', 'productFilter'));
    }

    public function detailProduct($slug)
    {
        $detailProduct = Products::join('productcat', 'products.productCat', '=', 'productcat.id')
                                    ->where('products.slug', $slug)
                                    ->select('products.*', 'productcat.name','productcat.id as idcat')
                                    ->first();

        $idcat = $detailProduct->idcat;

        $relatedProduct = Products::join('productcat', 'products.productCat', '=', 'productcat.id')
                                    ->where('productcat.id', $idcat)
                                    ->select('products.*', 'productcat.name','productcat.id as idcat')
                                    ->get();
        return view('pages-fe.detail-product', compact('detailProduct', 'relatedProduct'));
    }


}
