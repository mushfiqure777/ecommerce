<?php

namespace App\Http\Controllers;
use App\brand;
use App\category;
use App\product;
use Image;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function index(){
        $categories= category::where('publication_status', 1)->get();
        $brands  = brand::where('publication_status', 1)->get();



        return view('admin.product.add-product',[
           'categories'=> $categories,
            'brands' =>$brands,

        ]);
    }


    /*public function saveProduct(Request $request)
    {
        $productImage = $request->file('product_image');
        $ImageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imgUrl = $directory . $ImageName;
        $productImage->move($directory, $ImageName);

        $product = new product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imgUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
        return redirect('/product/add')->with('message', 'Product info save');



    }*/

    protected function productInfoValidate($request) {
        $this->validate($request, [
            'product_name' => 'required'
        ]);
    }


    protected function productImageUpload($request) {
        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);
        return $imageUrl;
    }


    protected function saveProductBasicInfo($request, $imageUrl) {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }


    public function saveProduct(Request $request) {
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request, $imageUrl);

        return redirect('/product/add')->with('message', 'Product info save successfully');
    }

public  function manageProduct(){
    $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->get();
    return view('admin.product.manage-product', ['products'=>$products]);

}

public  function editProduct($id){
        $product=product::find($id);
    $categories= category::where('publication_status', 1)->get();
    $brands  = brand::where('publication_status', 1)->get();

        return view('admin.product.edit-product',[

            'product'=> $product,
            'categories'=> $categories,
            'brands'=> $brands



        ]);
}


    public function productBasicInfoUpdate($product, $request, $imageUrl=null) {
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if($imageUrl) {
            $product->product_image = $imageUrl;
        }
        $product->publication_status = $request->publication_status;
        $product->save();

    }

    public function updateProduct(Request $request) {
        $productImage = $request->file('product_image');
        $product = Product::find($request->product_id);

        if($productImage) {
            unlink($product->product_image);
            $imageUrl= $this->productImageUpload($request);
            $this->productBasicInfoUpdate($product, $request, $imageUrl);
        }  else {
            $this->productBasicInfoUpdate($product, $request);
        }

        return redirect('/product/manage')->with('message', 'Product info updated');
    }
	
	
	
	public function deleteProductinfo($id){
		$product=product::find($id);
		$product->delete();
		return redirect('/product/manage/')->with('message','product info delete');
		
		
	}
}

