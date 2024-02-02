<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;
use Facade\FlareClient\Truncation\TruncationStrategy;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function add_category()
    {
        return view('admin.category.add_category');
    }

    public function store_category(CategoryFormRequest $request)
    {
        $data = $request->validated();


        $category = new Category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->mete_keyword = $data['mete_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();


        return redirect()->route('category')->with('message', 'Category Added Successfully!');
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function update_category(CategoryFormRequest $request, $id)
    {
        $data = $request->validated();


        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->mete_keyword = $data['mete_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();


        return redirect()->route('category')->with('message', 'Category Updated Successfully!');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        if ($category) {
            $destination = 'uploads/category/' . $category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $category->delete();
            return redirect()->route('category')->with('message', 'Category Deleted Successfully!');
        } else {
            return redirect()->route('category')->with('message', 'No Category ID found!');
        }
    }
}
