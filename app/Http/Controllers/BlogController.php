<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Storage;
use App\Helper\ImageResize as Image;

use App\Models\Blog;
use App\Models\BlogCategory as Category;
use App\Models\BlogSubCategory as SubCategory;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'image' => 'required|image',
            'category' => 'required',
            'article' => 'required|string',
        ]);

        $blog = Blog::create([
            'privacy' => $request->privacy,
            'category_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'title' => $request->title,
            'url' => $request->url,
            'article' => $request->article,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'tags' => $request->tags,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 320,
                    'height' => 180,
                ],
                'small' => (object) [
                    'width' => 240,
                    'height' => 135,
                ]
            ];
            $path = "blog";

            $result = Image::store($image, $dimension, $path);

            $blog->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'category' => 'required',
            'article' => 'required|string',
        ]);

        $blog = Blog::findOrFail($id);
        
        $blog->update([
            'title' => $request->title,
            'url' => $request->url,
            'privacy' => $request->privacy,
            'category_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'article' => $request->article,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'tags' => $request->tags,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($request->hasFile('image')){

            Storage::delete($blog->image);
            Storage::delete($blog->image_medium);
            Storage::delete($blog->image_small);

            $image = $request->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 600,
                    'height' => 240,
                ],
                'small' => (object) [
                    'width' => 360,
                    'height' => 160,
                ]
            ];
            $path = "blog";

            $result = Image::store($image, $dimension, $path);

            $blog->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }
}
