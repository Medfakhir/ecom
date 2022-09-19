@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
              
                <h3 class="card-header">{{$product->title}}</h3>
                    <img src="{{$product->image}}" alt="" srcset="" >
                    <div class="text-desc">
                        <p class="text-justify">{{$product->description}}</p>
                    </div>
                    
              
            </div>
        </div>
        <div class="col-md-4">
            
                    <div class="card cartshop">
                        <p class="text-sm-left d-flex flex-row justif align-item-center">
                            <span class="text-muted">
                              Price:   {{$product->price}} DH
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="text-danger">
                                <strike>
                                        {{$product->old_price}} DH
                                </strike>
                            </span>
                        </p>
                        <div class="stock">
                            @if ($product->inStock>0)
                                <span class="text-success">InStock</span>
                         
                            @else
                            <span class="text-danger">Not Instock</span>
                            @endif
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="form">
                            <form action="{{ route("add.cart",$product->slug) }}" method="post">
                                @csrf

                                <div>
                                    <label for="qty" class="lable-input">
                                        Quiantity:
                                    </label>
    
                                    <input type="number" name="qty" id="qty" value="1" min="1" max="{{$product->inStock}}">
                                </div>
                                <br>
                                <div class="form-group w200">
                                    <button type="submit" class="btn text-white btn-block bg-dark">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                
           
        </div>

    </div>
</div>
@endsection
