@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
              <h3 class="card-header">New Top</h3>
              <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 mb-2 shadow-sm">
                        <div class="card" style="width: 18rm,height:100%">
                            <div class="card-img-top">
                                <img src="{{$product->image}}" alt="{{$product->title}}" srcset="" class="img-thumbnail">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$product->title}}
                                </h5>
                                <p class="d-flex flex-row justify-content-between align-item-center">
                                    <span class="text-muted">
                                        {{$product->price}} DH
                                    </span>
                                    <span class="text-danger">
                                        <strike>
                                            {{$product->old_price}} DH
                                        </strike>
                                    </span>
                                </p>
                                <p class="card-text">
                                    {{Str::limit($product->description,100)}}
                                </p>
                                <a href="{{route("products.show",$product->slug)}}" class="btn outline-primary">
                                <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
              <hr>
              <div class="justify-content-center d-flex">
                {{$products->links('pagination::bootstrap-4')}}
              </div>
            </div>

            
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <li class="list-group-item active">
                    Categories
                </li>
                @foreach ($category as $category)
                    <a href="{{route("category.products",$category->slug)}}" class="list-group-item list-group-item-action">
                        {{$category->title}}
                        {{$category->products->count()}}
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
