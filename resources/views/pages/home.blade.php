@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        @foreach($all_product as $key => $product)
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{('public/uploads/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{ number_format(floatval($product->product_price)).' '.'VND' }}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <a href="{{URL::to('/show-cart')}}" class="btn btn-default add-to-cart">Thêm giỏ hàng</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
<!--features_items-->
@endsection