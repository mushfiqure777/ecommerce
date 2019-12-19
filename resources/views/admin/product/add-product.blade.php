@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  {{--  <h4 class="text-center text-success"> {{ Session::get('message')}}</h4>--}}
                    {{Form::open(['route'=>'new-product', 'method'=>'POST','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}


                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                           <select class="col-md-9" name="category_id">
                               <option>----select category name----</option>
                               @foreach($categories as $category)
                               <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach

                           </select>
                            <span class="text-danger"> {{$errors->has('brand_name') ? $errors->first('brand_name') :  ''}} </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <select class="col-md-9" name="brand_id">
                                <option>----select Brand name----</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach


                            </select>
                            <span class="text-danger"> {{$errors->has('brand_name') ? $errors->first('brand_name') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="product_name"></input>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product price</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="product_price"></input>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Quantity</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="product_quantity"></input>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="short_description"></textarea>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="editor" name="long_description"></textarea>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Product Image</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="product_image" accept="image/*"/>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" value="1"/> Published</label>
                            <label><input type="radio" name="publication_status" value="0"/> Unpublished</label><br>
                            <span class="text-danger"> {{$errors->has('publication_status') ? $errors->first('publication_status') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Save Product Info" class="btn btn-success btn-block"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="text-center text-success"> {{ Session::get('message') }}</h4>
                    </div>



                    {{Form::close()  }}

                </div>
            </div>
        </div>
    </div>

@endsection