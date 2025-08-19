@extends('admin_layout')
@section('admin_content');
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update list category
                        </header>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name List</label>
                                    <input type="text" value="{{ $edit_value->category_name }}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category Description</label>
                                    <textarea style="resize: none;" rows="5" name="category_product_desc" class="form-control" id="exampleInputPassword1">{{$edit_value->category_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_category_product" class="btn btn-info">Update Category</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

</div>
@endsection