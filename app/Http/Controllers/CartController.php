<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Products;


class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $prodid = $request->input('id_product');
        $qty = $request->input('quantity');
        $userid = $request->input('iduser');

        $insertCart = CartModel::insert([
            'id_user' => $userid,
            'id_product' => $prodid,
            'qty' => $qty,
            'created_time' => date("Y-m-d H:i:s")
        ]);

        return response()->json([
            'message' => 'Success add product to cart'
        ]);
    }

    public function getCart()
    {
        // session()->flush();
        $dataCart;
        if(session('email')){
            $dataCart = DB::table('cart')
                            ->join('products', 'cart.id_product', '=', 'products.id')
                            ->join('users', 'cart.id_user', '=', 'users.id')
                            ->select(
                                'cart.id_cart',
                                'products.productName',
                                'products.price',
                                'products.discount',
                                'products.priceAfterDiscount',
                                'products.productImage',
                                'cart.qty'
                            )
                            ->where('cart.id_user', session('userId'))->get();

            return response()->json([
                'dataCart' => $dataCart
            ]);
        }else{
            $session = Session::get('cart');
            $cart = [];

            if ($session) { // Memeriksa apakah sesi berisi data
                foreach ($session as $sess) {
                    $prd = Products::where('id', $sess['prodid'])->first();

                    if ($prd) { // Memeriksa apakah produk ditemukan
                        $cart[] = [
                            'id_cart' => $sess['id_cart'],
                            'prodid' => $sess['prodid'],
                            'qty' => $sess['qty'],
                            'productName' => $prd->productName,
                            'price' => $prd->price,
                            'discount' => $prd->discount,
                            'priceAfterDiscount' => $prd->priceAfterDiscount,
                            'productImage' => $prd->productImage
                        ];
                    }
                }
            }

            return response()->json([
                'dataCart' => $cart
            ]);
        }

    }


    public function dellCart($id)
    {
        $prod = DB::table('cart')->where('id_cart', $id)->first();
        if($prod){
            DB::table('cart')->where('id_cart', $id)->delete();
        }else{
            $cart = Session::get('cart', []);
            foreach ($cart as &$item) {
                if ($item['id_cart'] == $id) {
                    $cart = Session::get('cart', []);
                    $cart = array_filter($cart, function($item) use ($id) {
                        return $item['id_cart'] != $id;
                    });
                    Session::put('cart', $cart);
                }
            }
        }
        return response()->json([
            'message' => 'Success delete cart'
        ]);
    }

    public function addCartSession(Request $request)
    {
        $prodid = $request->input('id_product');
        $qty = $request->input('quantity');

        // Ambil data keranjang dari sesi
        $cart = Session::get('cart', []);

        // Periksa apakah produk sudah ada di keranjang
        $found = false;
        foreach ($cart as &$item) {
            if ($item['prodid'] == $prodid) {
                // Jika produk sudah ada, perbarui jumlahnya
                $item['qty'] += $qty;
                $found = true;
                break;
            }
        }

        // Jika produk belum ada di keranjang, tambahkan sebagai item baru
        if (!$found) {
            // Ambil data produk dari database
            $prd = Products::where('id', $prodid)->first();

            if ($prd) { // Memeriksa apakah produk ditemukan
                $cart[] = [
                    'id_cart' => md5(rand()),
                    'prodid' => $prodid,
                    'qty' => $qty,
                    'nama_prod' => $prd->productName,
                    'price' => $prd->price,
                    'disc' => $prd->discount,
                    'price_discount' => $prd->priceAfterDiscount
                ];
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk tidak ditemukan'
                ]);
            }
        }

        // Simpan kembali data keranjang ke sesi
        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'dataCart' => $cart
        ]);

    }


}
