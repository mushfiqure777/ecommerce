<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use vendor\project\StatusTest;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.add-category');
    }

    public function saveCategoryInfo(Request $request) {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
       $category->save();
        return redirect('/category/add')->with('message','category info save');

    }
    public function manageCategoryInfo(){
        $categories=category::all();
        return view('admin.category.manage-category', ['categories' => $categories]);
    }
    public function  unpublishedCategoryInfo($id){
        $category = category::find($id);
        $category -> publication_status = 0;
        $category->save();
        return redirect('/category/manage')->with('message', 'category info unpublished');

    }
    public function  publishedCategoryInfo($id){
        $category = category::find($id);
        $category -> publication_status = 1;
        $category->save();
        return redirect('/category/manage')->with('message', 'category info published');

    }
    public function  editCategoryInfo($id){
        $category = category::find($id);
        return view ('admin.category.edit-category',['category'=>$category ]);
    }
      public function updateCategoryInfo(Request $request){
          $category = category::find($request->category_id);
          $category->category_name = $request->category_name;
          $category->category_description = $request->category_description;
          $category->publication_status = $request->publication_status;
          $category->save();
           return redirect('/category/manage')->with('message', 'category info update');

      }
      public function deleteCategoryInfo($id)
      {
          $category = category::find($id);
          $category->delete();
          return redirect('/category/manage')->with('message', 'category info delete');

      }

}
