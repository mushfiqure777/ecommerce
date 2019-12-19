<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

   public  function index(){
       return view('admin.brand.add-brand');
   }
   public function saveBrand(Request $request){
       $this->validate($request, [
           'brand_name' => 'required|regex:/^[\pL\s\-]+$/U|max:16|min:2',
           'brand_description'=>'required',
           'publication_status'=>'required'
       ]);

        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_description = $request->brand_description;
        $brands->publication_status = $request->publication_status;
        $brands->save();
       return redirect('/brand/add')->with('message','Brand info save');

   }
    public function managebrandInfo(){
        $brands=brand::all();
        return view('admin.brand.manage-brand', ['brands' => $brands]);
    }
    protected function unpublishedBrandInfo($id)
    {
        $brands = brand::find($id);
        $brands -> publication_status = 0;
        $brands->save();
        return redirect('/brand/manage')->with('message', 'brand info unpublished');
    }

    public function publishedBrandInfo($id){
        $brands = brand::find($id);
        $brands -> publication_status = 1;
        $brands->save();
        return redirect('/brand/manage')->with('message', 'brand info published');
    }
      public function editBrandInfo($id){

             $brands = brand::find($id);
            return view('admin.brand.edit-brand',['brand'=> $brands]);
      }

      public function updateBrandInfo(Request $request){
          $brands = brand::find($request->brand_id);
          $brands->brand_name = $request->brand_name;
          $brands->brand_description = $request->brand_description;
          $brands->publication_status = $request->publication_status;
          $brands->save();
          return redirect('/brand/manage')->with('message', 'Brand info update');

      }
      public function deleteBrandInfo($id){
          $brands = brand::find($id);
          $brands->delete();
          return redirect('/brand/manage')->with('message', 'Brand info delete');

      }



}
