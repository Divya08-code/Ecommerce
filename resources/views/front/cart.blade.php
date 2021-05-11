@extends('front.master')
@section('title','ecommerce')

@section('content')

<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">cart</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<section class="whish-list-section theme1 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-8 mb-30">
                <h3 class="title mb-30 pb-25 text-capitalize">Your cart items</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Product Image</th>
                                <th class="text-center" scope="col">Product Name</th>
                                <th class="text-center" scope="col">Stock Status</th>
                                <th class="text-center" scope="col">Qty</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($data as $a)
                            <tr>
                                <th class="text-center" scope="row">
                                    <img src="{{url('/upload/'.$a->product_image)}}" alt="img">
                                </th>
                                <td class="text-center">
                                    <span class="whish-title">{{$a->product_name}}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-danger position-static">In Stock</span>
                                </td>
                                <td class="text-center">
                                    <div class="product-count style">
                                        <div class="count d-flex justify-content-center">
                                            <input type="number"  value="{{$a->product_quantity}}">
                                            <div class="button-group">

                                               <a href="{{url('cart/updatequantity/'.$a->id.'/1')}}" class="count-btn increment">
                                                <i class="fas fa-chevron-up"></i></a>
                                                <a href="{{url('cart/updatequantity/'.$a->id.'/-1')}}" class="count-btn decrement">
                                                <i class="fas fa-chevron-down"></i></a>
                                                <!-- <button type="button" class="count-btn increment"><i
                                                        class="fas fa-chevron-up"></i></button>
                                                <button type="button" class="count-btn decrement"><i
                                                        class="fas fa-chevron-down"></i></button> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="whish-list-price">
                                       Rs.{{$a->product_price*$a->product_quantity}}
                                    </span></td>

                                <td class="text-center">
                                    <a href="#"> <span class="trash"><i class="fas fa-trash-alt"></i> </span></a>
                                </td>
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                 </div>
                <div class="col-4 mb-30">
                    <h3 class=" text-center" style="color: #c74073;">Order Summary</h3><br>
                    <ul class="list-group cart-summary rounded-0">
                    <?php  $total_amount=0; ?>
                     @foreach($d as $d)   

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <ul class="items">

                            <li>{{$d->product_name}}</li>
                            <li>Quantity</li>
                        </ul>
                        <ul class="amount">
                            <li>{{$d->product_price}}</li>
                            <li>{{$d->product_quantity}}</li>

                        </ul>
                    </li>
                       <?php $total_amount=$total_amount+($d->product_price*$d->product_quantity); ?>

                     @endforeach
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <ul class="items">
                            <li>Total (tax excl.)</li>
                           
                        </ul>
                        <ul class="amount">
                             <li><?php echo $total_amount; ?></li>
                        </ul>
                    </li>
                    
                    <li class="list-group-item text-center">
                        @if(Auth::check())

                        <a href="{{url('checkout')}}" class="btn theme-btn--dark1 btn--md"> Checkout</a>
                        @else
                          <a href="{{url('user/login')}}" class="btn theme-btn--dark1 btn--md"> Checkout</a>
                          @endif
                    </li>
                </ul>

               </div>
            </div>
        </div>
    
</section>
<!-- product tab end -->
@endsection