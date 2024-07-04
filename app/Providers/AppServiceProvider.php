<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // View::composer('pages-fe.shopping-cart', function ($view) {
        //     $dataCart;
        // if(session('email')){
        //     $dataCart = DB::table('cart')
        //                     ->join('products', 'cart.id_product', '=', 'products.id')
        //                     ->join('users', 'cart.id_user', '=', 'users.id')
        //                     ->select(
        //                         'products.productName',
        //                         'products.price',
        //                         'products.discount',
        //                         'products.priceAfterDiscount',
        //                         'products.productImage',
        //                         'cart.qty'
        //                     )
        //                     ->where('cart.id_user', session('userId'))->get();
        //     $view->with('dataCart', $dataCart);

        // }else{
        //     $view->with('dataCart');
        // }
        // });
    }
}
