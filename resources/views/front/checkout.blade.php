
@extends('front.master')

@section('title','Checkout')

@section('content')
<section class="check-out-section pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-30">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    1 Personal Information
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <form action="{{url('placeorder')}}" method="post" class="personal-information">

                                    @csrf
                                    
                                    
                                    
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="firstname" class="form-control" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="email" id="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
 
                                
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    2 Shipping Address
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="checkout-inner border-0">
                                    <div class="checkout-address p-0">
                                        <p>
                                            The selected address will be used both as your personal address (for invoice) and as your delivery address.
                                        </p>
                                    </div>
                                    <div class="check-out-content">
                                        
                                            <div class="form-group row">
                                                <label class="col-md-3" for="firstName2">Name</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="firstName2" name="name"
                                                        type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="address1">Address</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="address1" name="address" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="city">City</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="city" name="city" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">State</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="state">
                                                        <option>-- please choose --</option>
                                                        <option value="1">AA</option>
                                                        <option value="2">AE</option>
                                                        <option value="3">AP</option>
                                                        <option value="4">Alabama</option>
                                                        <option value="5">Alaska</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="zip">Zip/Postal Code</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="zip" name="pincode" type="text" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">Country</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="country">
                                                        <option>-- please choose --</option>
                                                        <option>United States</option>
                                                        <option>India</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3" for="phone">Phone</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" id="phone" name="phone" type="text" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="optional">
                                                        Optional
                                                    </span>
                                                </div>
                                            </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>3</span> Payment
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body pt-0">
                                <div class="custom-radio mb-4">
                                    <input type="radio" id="test5" name="payment_method" value="pay online">
                                    <label for="test5">Pay online</label>
                                </div>
                                
                                <div class="custom-radio mb-4">
                                    <input type="radio" id="test7" name="payment_method" value="pay by cash on delivery">
                                    <label for="test7">Pay by Cash on Delivery</label>
                                </div>
                                <div class="filter-check-box mb-4">
                                    <input type="checkbox" id="20828" required="">
                                    <label class="checkout" for="20828">I agree to the terms and Conditions</label>
                                </div>

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
             <div class="col-4 mb-30">

                        <h3 class="text-center">Order Summary</h3><br>
                        <ul class="list-group cart-summary rounded-0">
                           <?php  $total_amount=0; ?>
                           @foreach ($d as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                
                                <ul class="items">

                                    <li>{{$d->product_name}}</li>
                                    <li>Quantity</li>
                                </ul>
                                <ul class="amount text-center">
                                    <li>Rs.{{$d->product_price*$d->product_quantity}}</li>
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
                                     <input type="hidden" name="grand_total" value="<?php echo $total_amount; ?>">
                                    
                                    <li><?php echo $total_amount; ?></li>
                                </ul>
                            </li>
                            <li class="list-group-item text-center">
                                <input type="submit" class="btn theme-btn--dark1 btn--md" value="Place Order">
                            </li>
                        </ul>
                    </form> 
             </div>       
        </div>
    </div>
</section>

@endsection