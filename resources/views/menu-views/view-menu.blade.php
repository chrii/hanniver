@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" id="top">
        <img class="card-img-top menu-pic" src="storage/pictures/binoculars.jpg" alt="Picture of Goggles and Menu Cards" height="400px">
        <div class="card-body">
            <h5 class="card-title">Unsere Karte</h5>
            <p class="card-text">Gib über den Schieberegler an wieviel du davon möchtest</p>
            @foreach( $categorys AS $category)
                <a href="#{{ strtolower($category->category_name) }}" class="btn btn-primary">{{ $category->category_name }}</a>
            @endforeach
        </div>
    </div>
    @foreach ($products AS $product)
    <!-- Calls All Products From Database Grouped By Category -->
    <div class="card" id="{{ strtolower($product->first()->category->category_name) }}">
        <img class="card-img-top menu-pic" src="storage/pictures/{{ $product->first()->category->picture_path }}" alt="Picture of Goggles and Menu Cards" height="400px">
        <div class="card-body">
            <!-- Fetch First Product Category For Title -->
            <h5 class="card-title">{{ $product->first()->category->category_name }}</h5>
            <p class="card-text">{{ $product->first()->category->category_description }}</p>
            <div id="accordion">
                <!-- Calls The Single Products And Forms An Accordeon-->
                @foreach($product AS $item)
                <div class="card">
                    <div class="card-header" id="heading{{$item->product_id}}" data-toggle="collapse" data-target="#collapse{{$item->product_id}}" aria-expanded="true" aria-controls="collapse{{$item->product_id}}">
                        <h5 class="mb-0">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-link">
                                        {{ $item->product_name }}
                                    </button></div>
                                <div class="col text-right">
                                    € {{ $item->actual_price }}
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div id="collapse{{ $item->product_id }}" class="collapse" aria-labelledby="heading{{$item->product_id}}" data-parent="#accordion">
                        <div class="card-body">
                            {{ $item->product_description }}                            
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="#top" class="btn btn-primary">Top</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection