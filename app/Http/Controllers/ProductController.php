<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    function index()
    {
        $product = Product::all();
        return view("Product", ['result' => $product]);
    }

    
    function show($id)
    {
        $product = Product::findOrFail($id);
        return view("Product.show", ["result" => $product]);
    }

    function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route("home")->with("product_message", "Deleted successfully");
    }

    function create()
    {
        
        $categories = Category::all();
        return view("Product.create",['categories'=>$categories]);
    }

    function store(Request $request)
    {

        

        $request->validate([
            'id' => ['required', 'unique:products', 'max:20'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'prod_img' => ['required', 'image', 'max:3062'],
            'title_en' => ['required', 'unique:products', 'max:255'],
            'title_ar' => ['required', 'unique:products', 'max:255'],
            'title_ru' => ['required', 'unique:products', 'max:255'],
            'description_en' => ['required', 'unique:products', 'max:255'],
            'description_ar' => ['required', 'unique:products', 'max:255'],
            'description_ru' => ['required', 'unique:products', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        $imgname = "";
        if ($request->hasFile('prod_img')) {
            $img = $request->prod_img;
            $imgname = rand(1, 10000) . "_" . time() . "." . $img->extension();
            $img->move(public_path('img/Product/'), $imgname);
        }

        Product::create([
            "id" => $request->id,
            "category_id" => $request->category_id,
            "prod_img" => $imgname,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "title_ru" => $request->title_ru,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "description_ru" => $request->description_ru,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route("home")->with("product_message", "Creation successful");
    }

    function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view("Product.edit", ["result" => $product, "categories"=>$categories]);
    }

    function update(Request $request)
    {
        $old_id = $request->old_id;
        $product = Product::findOrFail($old_id);

        $request->validate([
            'id' => ['required', Rule::unique('products', 'id')->ignore($product->id)],
            'prod_img' => ['nullable', 'image', 'max:3062'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'title_en' => ['required', Rule::unique('products', 'title_en')->ignore($product->id)],
            'title_ar' => ['required', Rule::unique('products', 'title_ar')->ignore($product->id)],
            'title_ru' => ['required', Rule::unique('products', 'title_ru')->ignore($product->id)],
            'description_en' => ['required', Rule::unique('products', 'description_en')->ignore($product->id)],
            'description_ar' => ['required', Rule::unique('products', 'description_ar')->ignore($product->id)],
            'description_ru' => ['required', Rule::unique('products', 'description_ru')->ignore($product->id)],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        if ($request->hasFile("prod_img")) {
            $img = $request->prod_img;
            $imgname = rand(1, 10000) . "_" . time() . "." . $img->extension();
            $img->move(public_path('img/Product/'), $imgname);
            $imagePath = public_path('img/Product/' . $product->prod_img);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        } else {
            $imgname = $product->prod_img;
        }

        $product->update([
            "id" => $request->id,
            "prod_img" => $imgname,
            "category_id" => $request->category_id,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "title_ru" => $request->title_ru,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "description_ru" => $request->description_ru,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);

        return redirect()->route("home")->with("product_message", "Edit successful");
    }
        /*
    |--------------------------------------------------------------------------
    | USER-FACING METHODS (For Customers)
    |--------------------------------------------------------------------------
    */

    /**
     * Display all products for customers (Shop page)
     * This is different from index() which is for admin
     */
    public function shop()
    {
        // Get all products with their categories, newest first
        $products = Product::with('category')
            ->latest()
            ->paginate(12);  // 12 products per page
        
        // Get all categories for sidebar filter
        $categories = Category::all();
        
        // Return the user shop view
        return view('shop.index', compact('products', 'categories'));
    }

    /**
     * Display single product for customers
     * This is different from show() which is for admin
     */
    public function productDetails($id)
    {
        // Find product or show 404 error
        $product = Product::with('category')->findOrFail($id);
        
        // Get related products from same category (exclude current product)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
        
        // Return the user product details view
        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
