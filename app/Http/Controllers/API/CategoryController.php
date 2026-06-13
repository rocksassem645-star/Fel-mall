<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $category = CategoryResource::collection(Category::all());

        return response()->json([
            'msg'    => 'Return All Data',
            'status' => 200,
            'data'   => $category,
        ]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if ($category) {
            return response()->json([
                'msg'    => 'Return One of Record',
                'status' => 200,
                'data'   => new CategoryResource($category),
            ]);
        }

        return response()->json([
            'msg'    => 'No such ID',
            'status' => 205,
            'data'   => null,
        ]);
    }

    public function delete(Request $request)
    { 
        $id = $request->id;
        $category = Category::findOrFail($id);

        $imagePath = public_path('img/Category/' . $category->cate_img);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $category->delete();

        return response()->json([
            'msg'    => 'Deleted',
            'status' => 200,
            'data'   => null,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'             => ['required', 'unique:categories', 'max:20'],
            'cate_img'       => ['required', 'image', 'max:3062'],
            'title_en'       => ['required', 'unique:categories', 'max:255'],
            'title_ar'       => ['required', 'unique:categories', 'max:255'],
            'description_en' => ['required', 'unique:categories', 'max:255'],
            'description_ar' => ['required', 'unique:categories', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg'    => 'Require validation',
                'status' => 201,
                'data'   => $validator->errors(),
            ]);
        }

        $imgname = '';

        if ($request->hasFile('cate_img')) {
            $img     = $request->cate_img;
            $imgname = rand(1, 10000) . '_' . time() . '.' . $img->extension();
            $img->move(public_path('img/Category/'), $imgname);
        }

        $category = Category::create([
            'id'             => $request->id,
            'cate_img'       => $imgname,
            'title_en'       => $request->title_en,
            'title_ar'       => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
        ]);

        return response()->json([
            'msg'    => 'Created',
            'status' => 200,
            'data'   => new CategoryResource($category),
        ]);
    }


   public  function update(Request $request)
    {
        $old_id = $request->old_id;
        $Category = Category::find($old_id);

        if($Category){ 
         $validator = Validator::make($request->all(), [
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

            'description_en' => [
                'required',
                Rule::unique('categories', 'description_en')->ignore($Category->id)
            ],

            'description_ar' => [
                'required',
                Rule::unique('categories', 'description_ar')->ignore($Category->id)
            ],
         ]);

             if ($validator->fails()) {
            return response()->json([
                'msg'    => 'Require validation',
                'status' => 201,
                'data'   => $validator->errors(),
            ]);
         }

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
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar
         ]);

            return response()->json([
            'msg'    => 'Updated successfully',
            'status' => 205,
            'data'   => new CategoryResource($Category),
         ]);
        
        }else {
                return response()->json([
             'msg'    => 'No such ID',
             'status' => 205,
             'data'   => null,
        ]);
        }
        
    }
}
