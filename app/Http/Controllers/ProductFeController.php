<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductFilter;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductFeController extends Controller
{
    public function index()
    {
        $dataProduct = Products::orderBy('id', 'DESC')->paginate(6);
        $allDataProduct = Products::all();
        $category = Category::all();
        return view('pages-fe.our-products', compact('dataProduct', 'allDataProduct', 'category'));
    }

    public function bestSellerProduct()
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

        $dataProductBestSeller = collect();
        $allDataProduct = '';
        foreach($productFilter as $flt){
            if($flt['status_product'] == 'Best Seller'){
                $dataProductBestSeller = $dataProductBestSeller->merge($flt['data_product']);
            }
        }
        $allDataProduct = count($dataProductBestSeller);

        $perPage = 6; // Number of products per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $dataProductBestSeller->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $dataProductBestSeller->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('pages-fe.best-seller-product', [
            'dataProductBestSeller' => $paginatedItems,
            'allDataProduct' => $dataProductBestSeller->count()
        ]);
    }

    public function recomendationProduct()
    {
        // $dataProductRecomended = Products::where('recomended', '=', '1')->orderBy('id', 'DESC')->paginate(6);
        // $allDataProduct = Products::all();
        // return view('pages-fe.recomended-product', compact('dataProductRecomended', 'allDataProduct'));

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

        $dataProductBestSeller = collect();
        $allDataProduct = '';
        foreach($productFilter as $flt){
            if($flt['status_product'] == 'Recomended'){
                $dataProductBestSeller = $dataProductBestSeller->merge($flt['data_product']);
            }
        }
        $allDataProduct = count($dataProductBestSeller);

        $perPage = 6; // Number of products per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $dataProductBestSeller->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $dataProductBestSeller->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('pages-fe.recomended-product', [
            'dataProductRecomended' => $paginatedItems,
            'allDataProduct' => $dataProductBestSeller->count()
        ]);
    }

    public function search(Request $request) {
        $min = $request->input('min', 0);
        $max = $request->input('max', 0);
        $arrcat = $request->input('cat', []);
        $page = $request->input('page', 1);

        $query = Products::join('productCat', 'products.productCat', '=', 'productCat.id')
                         ->select('products.*', 'productCat.name as category_name', 'productCat.id as id_cat');

        if ($min != 0 || $max != 0) {
            $query->whereBetween('products.price', [$min, $max]);
        }

        if($min == 0 && $max > 0){
            $query->whereBetween('products.price', [$min, $max]);
        }

        if (!empty($arrcat)) {
            $query->whereIn('products.productCat', $arrcat);
        }

        $datafilter = $query->paginate(6, ['*'], 'page', $page);

        $alldatafilter = $query->get();

        $pagination = $datafilter->appends(['min' => $min, 'max' => $max, 'categories' => $arrcat])->links()->render();

        return response()->json([
            'data' => $datafilter,
            'paginate' => $pagination,
            'allproduct' => $alldatafilter
        ]);
    }

}
