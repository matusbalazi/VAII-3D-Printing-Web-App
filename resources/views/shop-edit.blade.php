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
                <h3 class="shop-heading">Editing item</h3>
                <form name="shopEditForm" action="{{ route('shop.update',$product->id) }}" onsubmit="return validateShopForm(false)" method="post" class="contact-form-containers create" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="heading" value="{{ old('heading', $product->heading) }}" placeholder="Name" required>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" placeholder="Price" required>
                    <textarea name="description" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                    <button type="submit" name="btn-submit" class="btn-submit btn-edit">Edit</button>
                </form>
                
            @endif
        @endauth

        

        <div class="shop">
            <img src="{{ asset('/img/edit-image1.jpg') }}" alt="edit-image" class="edit-image">
        </div>
    </div>
</div>

@endsection