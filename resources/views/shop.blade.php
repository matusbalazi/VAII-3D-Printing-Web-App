@extends('layouts.master')
{{-- dedi z master layoutu --}}
@section('page-name')
    Shop
@endsection
@section('page-content')
<div class="white-space">
    <div class="container">
        @if ($errors->any())
        <div class="error-message">
            <h2 class="error-heading">Oh, something bad happened &#128551</h2>
            <ol class="list-of-errors">
                @foreach ($errors->all() as $error)
                <li>
                    <p class="error">{{ $error }}</p>
                </li>
                @endforeach
            </ol>
        </div>
        @endif
        <div class="shop-header">
            <div class="shop-heading">
                <h1>Shop with us</h1>
                <p>Showing all {{ count($products) }} items</p>
            </div>

            {{-- <div class="shop-combo-box">
                <form action="#" method="GET" class="sorting-form">
                    <select name="sorting" class="select-sorting">   
                        <option value="1">Default sorting</option>
                        <option value="2">Sort by popularity</option>
                    <option value="3">Sort by average rating</option>
                    <option value="4">Sort by newness</option>
                    <option value="5">Sort by price: low to high</option>
                    <option value="6">Sort by price: high to low</option>
                </select>
            </form>
        </div> --}}
        </div>
        
        @auth   
            @if (Auth::user()->is_admin)
                <h3 class="shop-heading">Create new item</h3>
                <form action="{{ route('shop.store') }}" method="post" class="contact-form-containers create" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="heading" value="{{ old('heading') }}" placeholder="Name" required>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="Price" required>
                    <input type="file" name="image" placeholder="image">
                    <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
                    <button type="submit" name="btn-submit" class="btn-submit">Create</button>
                </form>
            @endif
        @endauth


        <div class="shop">
            

            @foreach ($products as $product)
                @include('items.shopping-item', ['product' => $product])
            @endforeach
            
        </div>
    </div>
</div>

@endsection