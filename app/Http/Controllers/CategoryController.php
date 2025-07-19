<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);

        return view('admin.categoty-index',compact('categories'));
    }

    public function destroy($category_id){
        $category = Category::findOrFail($category_id);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Uspesno ste obrisali kategoriju!');
    }

    public function create(){
        $categories = Category::all();
        return view('admin.category-create', compact('categories'));
    }

    public function store(createCategoryRequest $request){
        $validated = $request->validated();

        Category::create([
            'name' => $validated['name'],
            'parent_id' => $validated['parent_id']
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Uspesno ste kreirali kategoriju!');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.category-edit', compact('categories','category'));
    }

    public function update(updateCategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $validated = $request->validated();

        $category->name = $validated['name'];
        $category->parent_id = $validated['parent_id'];

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Uspesno ste azurirali kategoriju!');
    }
}
