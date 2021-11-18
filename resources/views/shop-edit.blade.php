@extends('layouts.master')
{{-- dedi z master layoutu --}}
@section('page-name')
    Shop
@endsection
@section('page-content')
<div class="white-space">
    <div class="container">
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
        @if ($errors->any())
        <div class="w-full mb-4 p-4 error-list">
            <h2 class="text-2xl secondary-font text-white font-bold mb-4">Ups... Nevyplnili formulár správne
            </h2>
            <ol class=" list-disc ml-8 text-white">
                @foreach ($errors->all() as $error)
                <li>
                    <p class="has-text-weight-bold text-gray-100">{{ $error }}</p>
                </li>
                @endforeach
            </ol>
        </div>
        @endif


        @auth   
            @if (Auth::user()->is_admin)
                <h3 class="shop-heading">Create new item</h3>
                <form action="{{ route('shop.update',$product->id) }}" method="post" class="contact-form-containers create" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="heading" value="{{ old('heading', $product->heading) }}" placeholder="Name" required>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" placeholder="Price" required>
                    <textarea name="description" placeholder="Description">{{ old('description', $product->description) }}</textarea>
                    <button type="submit" name="btn-submit" class="btn-submit">Edit</button>
                </form>
            @endif
        @endauth


        <div class="shop">
            


            
        </div>
    </div>
</div>

@endsection