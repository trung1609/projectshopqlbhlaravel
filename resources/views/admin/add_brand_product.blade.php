@extends('admin_layout')
@section('admin_content');
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add product brand
                        </header>
                        <div class="panel-body">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Brand</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Brand Description</label>
                                    <textarea style="resize: none;" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Brand description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Display</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15">       
                                        <option value="0">Hide</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_brand_product" class="btn btn-info">Add Brand</button>
                            </form>
                            </div>

                        </div>
                    </section>

</div>
@endsection