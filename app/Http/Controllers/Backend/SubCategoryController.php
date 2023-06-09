<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SubCategoryView()
    {
        $subcategory = SubCategory::all();
        $category = Category::all();
        return view('admin.subcategory.subcategory_view', compact('subcategory', 'category'));
    }

    public function SubCategoryStore(Request $request)
    {

        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories|max:255',
        ]);
        $data = new SubCategory();
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;
        $data->save();

        $notification = array(
            'message' => 'Successfully SubCategory Insert',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $subcategory = SubCategory::find($id);
        $category = Category::all();
        return view('admin.subcategory.subcategory_edit', compact('subcategory', 'category'));
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $data = SubCategory::find($id);
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;
        $data->save();
        $notification = array(
            'message' => 'Successfully SubCategory Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.view')->with($notification);
    }


    public function SubCategoryDelete($id)
    {

        $data = SubCategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully SubCategory Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
