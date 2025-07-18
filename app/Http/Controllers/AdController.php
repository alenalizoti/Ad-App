<?php

namespace App\Http\Controllers;

use App\Http\Requests\createAdRequest;
use App\Http\Requests\editAdRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::paginate(10);
        return view('admin.ad-index', compact('ads'));
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Uspesno ste obrisali oglas!');
    }

    public function create()
    {
        $allCategories = Category::all();
        $categories = Category::buildCategoryTree($allCategories);
        $users = User::where('role', 'customer')->get();
        return view('admin.ad-create', compact('categories', 'users'));
    }

    public function store(createAdRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('ads', 'public');
        } else {
            $imagePath = null;
        }

        $ad = Ad::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'condition' => $validated['condition'],
            'contact_phone' => $validated['contact_phone'],
            'location' => $validated['location'],
            'category_id' => $validated['category_id'],
            'image_path' => $imagePath,
            'user_id' => $validated['user_id'],
        ]);

        return redirect()->route('ads.index')->with('success', 'Uspesno ste kreirali oglas!');
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $allCategories = Category::all();
        $categories = Category::buildCategoryTree($allCategories);
        $users = User::where('role', 'customer')->get();

        return view('admin.ad-edit', compact('categories', 'users', 'ad'));
    }

    public function update(editAdRequest $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            if ($ad->image_path && \Storage::exists($ad->image_path)) {
                \Storage::delete($ad->image_path);
            }
            $path = $request->file('image_path')->store('ads_images', 'public');
            $ad->image_path = $path;
        }

        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->price = $validated['price'];
        $ad->condition = $validated['condition'];
        $ad->contact_phone = $validated['contact_phone'];
        $ad->location = $validated['location'];
        $ad->category_id = $validated['category_id'];
        $ad->user_id = $validated['user_id'];

        $ad->save();

        return redirect()->route('ads.index')->with('success', 'Uspesno ste izmenili oglas!');
    }
}
