@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 card-p3">

            <h3 class="text-dark">Your Prodact</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td><img src="{{$item->associatedModel->image}}" alt="{{$item->title}}" width="70" class="img-fluid"></td> 
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} DH</td>
                            <td> 
                                <form class="d-flex flex-row justify-content-center align-items-center" action="{{ route("update.cart",$item->associatedModel->slug) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div>
                                    <input type="number" name="qty" id="qty" value="{{$item->quantity}}" min="1" max="{{$item->associatedModel->inStock}}">
                                </div>
                                <br>
                                <div class="form-group w200">
                                    <button type="submit" class="btn text-white btn-sm bg-dark">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </div>

                                </form>

                            </td>

                            <td>{{$item->price * $item->quantity}} HD</td>

                            <td>
                                <form class="d-flex flex-row justify-content-center align-items-center" action="{{ route("remove.cart",$item->associatedModel->slug) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <div class="form-group w200">
                                        <button type="submit" class="btn text-white btn-sm bg-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
    
                                    </form>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="text-dark font-weight-bold">
                        <td colspan="3" class="border">
                            Total
                        </td>
                        <td colspan="3" class="border">
                            {{Cart::getSubtotal()}} DH
                        </td>
                    </tr>
                </tbody>

                
            </table>
            @if (Cart::getSubtotal()>0)
                <div class="form-group">
                    <a href="{{route('make.payment')}}" class="btn btn-dark">
                        Pay {{Cart::getSubtotal()}} with Paypal
                    </a>
                </div>
            @endif
           
        </div>

    </div>
</div>
@endsection
