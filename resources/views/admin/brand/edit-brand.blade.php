@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{--<h4 class="text-center text-success"> {{ Session::get('message') --}}
                    {{Form::open(['route'=>'update-brand', 'method'=>'POST','class'=>'form-horizontal'])}}


                    <div class="form-group">
                        <label class="control-label col-md-3">Band Name</label>
                        <div class="col-md-9">
                            <input type="text" name="brand_name" value='{{$brand->brand_name}}' class="form-control"/>
                            <input type="hidden" name="brand_id" value='{{$brand->id}}' class="form-control"/>
                            <span class="text-danger"> {{$errors->has('brand_name') ? $errors->first('brand_name') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="brand_description">{{$brand->brand_description}}</textarea>
                            <span class="text-danger"> {{$errors->has('brand_description') ? $errors->first('brand_description') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" {{$brand->publication_status == 1 ? 'checked': ""}} value="1"/> Published</label>
                            <label><input type="radio" name="publication_status" {{$brand->publication_status == 0 ? 'checked': ""}} value="0"/> Unpublished</label><br>
                            <span class="text-danger"> {{$errors->has('publication_status') ? $errors->first('publication_status') :  ''}} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="update Brand Info" class="btn btn-success btn-block"/>
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