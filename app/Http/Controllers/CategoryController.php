<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categori = Category::orderBy('id', 'DESC')->get();
        return view('pages.categories.index', compact('categori'));
    }

    public function storeCategorie(Request $request)
    {
        $category = new Category();
        $category->setAttribute('name', $request->name);
        $category->setAttribute('createdTime', date('Y-m-d H:i:s'));
        $category->setAttribute('status', 1);
        $category->save();
        return redirect('categories')->with('message', 'Add Category Successfully');
    }

    public function formAddCategory()
    {
        return view('pages.categories.form-add');
    }

    public function formEditCategory($id)
    {
        $cat = Category::find($id);
        return view('pages.categories.form-edit', compact('cat'));
    }

    public function editCategory(Request $request)
    {
        $cat = Category::where('id', $request->id)->first();
        $cat->name = $request->name;
        $cat->status = $request->status;
        $cat->save();
        return redirect('categories')->with('message', 'Edit Category Successfully');
    }

    public function deleteCategory($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('categories')->with('message', 'Delete Category Successfully');
    }
}
