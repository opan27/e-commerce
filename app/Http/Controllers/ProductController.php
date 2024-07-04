<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $data = Products::orderBy('id', 'DESC')->get();
        return view('pages.products.index', compact('data'));
    }

    public function formAdd()
    {
        $categories = Category::where('status', 1)->get();
        return view('pages.products.form-add', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $product = new Products();
        $product->setAttribute('sku', $request->sku);
        $product->setAttribute('productName', $request->productName);
        $product->setAttribute('productDesc', $request->productDesc);
        $product->setAttribute('productCat', $request->productCat);
        $product->setAttribute('productGroup', $request->productGroup);
        $product->setAttribute('productType', $request->productType);
        $product->setAttribute('price', $request->price);
        $product->setAttribute('discount', $request->discount);
        $product->setAttribute('priceAfterDiscount', $request->priceAfterDiscount);
        $product->setAttribute('netWeight', $request->netWeight);
        $product->setAttribute('grossWeight', $request->grossWeight);
        $product->setAttribute('uom', $request->uom);
        $product->setAttribute('stock', $request->stock);
        $product->setAttribute('bpom', $request->bpom);
        $product->setAttribute('halal', $request->halal);
        $product->setAttribute('slug', $request->slug);
        $product->setAttribute('status', 1);

        // // upload file image
        if ($request->file('file')) {
            $files = [];
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    Storage::put('productImage/'.$file->getClientOriginalName(), file_get_contents($file));
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('productImage'), $filename);
                    array_push($files,[
                        'filename' => $filename
                    ]);
                }
            }
            $product->setAttribute('productImage', json_encode($files));
        }
        $product->setAttribute('status', 1);
        $product->save();
        return redirect('products')->with('message', 'Add Product Successfully');
    }

    public function editProduct(Request $request)
    {
        $data = Products::where('id', $request->id)->first();
        if($request->file('file')){
            $data->sku = $request->sku;
            $data->productName = $request->productName;
            $data->productDesc = $request->productDesc;
            $data->productCat = $request->productCat;
            $data->productGroup = $request->productGroup;
            $data->productType = $request->productType;
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->priceAfterDiscount = $request->priceAfterDiscount;
            $data->netWeight = $request->netWeight;
            $data->grossWeight = $request->grossWeight;
            $data->uom = $request->uom;
            $data->stock = $request->stock;
            $data->bpom = $request->bpom;
            $data->halal = $request->halal;
            $data->slug = $request->slug;
            $data->status = $request->status;
            $files = [];
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    Storage::put('productImage/'.$file->getClientOriginalName(), file_get_contents($file));
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('productImage'), $filename);
                    array_push($files,[
                        'filename' => $filename
                    ]);
                }
            }

            $oldimg = json_decode($data->productImage);
            $mergedImages = array_merge($oldimg, $files);
            $data->productImage = json_encode($mergedImages);
            $data->save();
        }else{
            $data->sku = $request->sku;
            $data->productName = $request->productName;
            $data->productDesc = $request->productDesc;
            $data->productCat = $request->productCat;
            $data->productGroup = $request->productGroup;
            $data->productType = $request->productType;
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->priceAfterDiscount = $request->priceAfterDiscount;
            $data->netWeight = $request->netWeight;
            $data->grossWeight = $request->grossWeight;
            $data->uom = $request->uom;
            $data->stock = $request->stock;
            $data->bpom = $request->bpom;
            $data->halal = $request->halal;
            $data->slug = $request->slug;
            $data->status = $request->status;
            $data->save();
        }
        return redirect('/products')->with('message', 'Edit Product Successfully');
    }

    public function deleteProduct($id)
    {
        $data = Products::find($id);
        $img = json_decode($data->productImage);
        foreach($img as $g){
            $path = public_path('productImage/' . $g->filename);
            if(file_exists($path)){
                unlink($path);
            }
        }
        $data->delete();
        return redirect('products')->with('message', 'Delete Product Successfully');
    }

    public function formEdit($id)
    {
        $data = Products::where('id', $id)->first();
        $categories = Category::where('status', 1)->get();
        return view('pages.products.form-edit', compact('data','categories'));
    }

    public function editImage($id, $img)
    {
        $path = public_path('productImage/' . $img);

        if (file_exists($path)) {
            // Hapus file dari folder
            unlink($path);

            // Temukan item berdasarkan ID
            $item = Products::where('id', $id)->first();

            if ($item) {
                // Decode productImage dari item
                $arr = json_decode($item->productImage, true);

                // Hapus gambar dari array jika ada
                foreach ($arr as $index => $i) {
                    if ($i['filename'] == $img) {
                        unset($arr[$index]);
                        $arr = array_values($arr); // Reset indeks array
                        break; // Hentikan iterasi setelah gambar dihapus
                    }
                }

                // Periksa apakah ada perubahan dalam productImage
                $updatedProductImage = json_encode($arr);
                if ($updatedProductImage !== $item->productImage) {
                    // Update item dengan daftar gambar yang diperbarui
                    $item->productImage = $updatedProductImage;

                    // Simpan perubahan jika ada
                    $item->save();

                    return response()->json(['message' => 'Image deleted successfully.', 'data' => $arr], 200);
                } else {
                    // Tidak ada perubahan dalam productImage
                    return response()->json(['message' => 'No changes in productImage.'], 200);
                }
            } else {
                return response()->json(['message' => 'Item not found.'], 404);
            }
        } else {
            return response()->json(['message' => 'Image file not found.'], 404);
        }
    }

}
