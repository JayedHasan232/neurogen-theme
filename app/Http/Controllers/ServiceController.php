<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Str;
use Storage;
use App\Models\Service;

class ServiceController extends Controller
{
    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'image' => 'required|image',
            'article' => 'required|string',
            'overview' => 'required|string',
        ]);

        $service = Service::create([
            'type' => $request->type,
            'title' => $request->title,
            'url' => $request->url,
            'privacy' => $request->privacy,
            'article' => $request->article,
            'overview' => $request->overview,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($request->hasFile('image')){
            $service->image = $request->file('image')->store('images/service');
            $service->save();
        }

        return back()->with('success', 'Success!');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', ['service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'url' => 'required|string',
            'privacy' => 'required',
            'article' => 'required|string',
            'overview' => 'required|string',
        ]);
        
        $request->service->update([
            'type' => $request->type,
            'title' => $request->title,
            'url' => $request->url,
            'privacy' => $request->privacy,
            'article' => $request->article,
            'overview' => $request->overview,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($request->hasFile('image')){
            Storage::delete($request->service->image);
            $service->image = $request->file('image')->store('images/services');
            $service->save();
        }

        return back()->with('success', 'Success!');
    }
}
