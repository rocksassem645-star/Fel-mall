<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    function index()
    {
        $Category = Category::all();
        return view("Category", ['result' => $Category]);
    }

    public function show($id)
    {
        $Category = Category::findOrFail($id);

        return view("Category.show", ["result" => $Category]);
    }

    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect()->route("home")->with("category_message", "Delete successful");
    }


    public function create()
    {

        return view("Category.create");
    }

    public function store(Request $request)
    {

        $request->validate([
            'id' => ['required', 'unique:categories', 'max:20'],
            'cate_img' => ['required', 'image', 'max:3062'],
            'title_en' => ['required', 'unique:categories', 'max:255'],
            'title_ar' => ['required', 'unique:categories', 'max:255'],
            'title_ru' => ['required', 'unique:categories', 'max:255'],
            'description_en' => ['required', 'unique:categories', 'max:255'],
            'description_ar' => ['required', 'unique:categories', 'max:255'],
            'description_ru' => ['required', 'unique:categories', 'max:255'],

        ]);

        $imgname = "";
        if ($request->hasFile('cate_img')) {
            $img = $request->cate_img;
            $imgname = rand(1, 10000) . "_" . time() . "." . $img->extension();
            $img->move(public_path('img/Category/'), $imgname);
        }

        Category::create([
            "id" => $request->id,
            "cate_img" => $imgname,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "title_ru" => $request->title_ru,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "description_ru" => $request->description_ru
        ]);
        return redirect()->route("home")->with("category_message", "Creation successful");
    }


    public function edit($id)
    {
        $Category = Category::findOrFail($id);
        return view("Category.edit", ["result" => $Category]);
    }


    public function update(Request $request)
    {




        $old_id = $request->old_id;

        $Category = Category::findOrFail($old_id);


        $request->validate([
            'id' => [
                'required',
                Rule::unique('categories', 'id')->ignore($Category->id)
            ],

            'cate_img' => ['nullable', 'image', 'max:3062'],

            'title_en' => [
                'required',
                Rule::unique('categories', 'title_en')->ignore($Category->id)
            ],

            'title_ar' => [
                'required',
                Rule::unique('categories', 'title_ar')->ignore($Category->id)
            ],

            'title_ru' => [
                'required',
                Rule::unique('categories', 'title_ru')->ignore($Category->id)
            ],

            'description_en' => [
                'required',
                Rule::unique('categories', 'description_en')->ignore($Category->id)
            ],

            'description_ar' => [
                'required',
                Rule::unique('categories', 'description_ar')->ignore($Category->id)
            ],

            'description_ru' => [
                'required',
                Rule::unique('categories', 'description_ru')->ignore($Category->id)
            ],
        ]);

        if ($request->hasFile("cate_img")) {
            $img = $request->cate_img;
            $imgname = rand(1, 10000) . "_" . time() . "." . $img->extension();
            $img->move(public_path('img/Category/'), $imgname);
            $imagePath = public_path('img/Category/' . $Category->cate_img); // e.g., public/images/photo.jpg

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        } else {
            $imgname = $Category->cate_img;
        }



        $Category->update([
            "id" => $request->id,
            "cate_img" => $imgname,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "title_ru" => $request->title_ru,       // ❌ was missing
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "description_ru" => $request->description_ru  // ❌ was missing
        ]);


        return redirect()->route("home")->with("category_message", "Edit successful");
    }
    /*
|--------------------------------------------------------------------------
| USER-FACING METHODS (For Customers)
|--------------------------------------------------------------------------
*/

/**
 * Show all categories for customers
 */
public function userIndex()
{
    $categories = Category::withCount('products')->get();
    return view('shop.categories', compact('categories'));
}

/**
 * Show products in a specific category
 */
public function userProducts($id)
{
    $category = Category::with('products')->findOrFail($id);
    $products = $category->products()->paginate(12);
    
    return view('shop.category-products', compact('category', 'products'));
}
}
