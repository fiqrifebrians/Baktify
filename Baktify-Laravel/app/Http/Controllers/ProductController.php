<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('dashboard.products.product-index', compact('product'));
    }


    public function create()
    {
        $category = Category::all();

        return view('dashboard.products.product-create', compact('category'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:5',
            'price' => 'required|numeric|between:1000,10000000',
            'description' => 'required|between:15,500',
            'stock' => 'required|between:1,10000',
            'image' => 'required|mimes:jpg,png,jpeg',
            'id_category' => 'required'
        ]);


        $product = new Product();

        $file = $request->file('image');

        $fileName = $file->getClientOriginalName();
        $location = 'product_image';
        $file->move($location, $request->name . '-' . $fileName);

        $product->name           = $request->name;
        $product->price          = $request->price;
        $product->description    = $request->description;
        $product->id_category    = $request->id_category;
        $product->stock          = $request->stock;
        $product->image          = $request->name . '-' . $fileName;
        $product->save();

        return redirect()->route('product.index');
    }


    public function show($id)
    {
        $product = Product::with('Category')->find($id);

        return view('dashboard.products.product-show', compact('product'));
    }


    public function edit($id)
    {

        $product = Product::with('Category')->find($id);
        $category = Category::all();
        return view('dashboard.products.product-edit', compact(['product', 'category']));
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->validate($request, [
            'name' => 'required|min:5',
            'price' => 'required|numeric|between:1000,10000000',
            'description' => 'required|between:15,500',
            'stock' => 'required|between:1,10000',
            'image' => 'required|mimes:jpg,png,jpeg',
            'id_category' => 'required'
        ]);
        $file = $request->file('image');

        $fileName = $file->getClientOriginalName();
        $location = 'product_image';
        if ($request->has('image')) {


            if (File::exists('product_image/' . $product->image)) {
                File::delete('product_image/' . $product->image);
            };
        }
        $file->move($location, $request->name . '-' . $fileName);

        $product->name  = $request->name;
        $product->price  = $request->price;
        $product->description  = $request->description;
        $product->id_category  = $request->id_category;
        $product->stock          = $request->stock;
        $product->image  = $request->name . '-' . $fileName;
        $product->save();

        return redirect()->route('product.index');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            File::delete('Book product_image/' . $product->image);
            $product->delete();
            return redirect()->route('product.index');
        }
    }
}
