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
                <p>Showing all 8 items</p>
            </div>

            <div class="shop-combo-box">
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
            </div>
        </div>

        <div class="shop">
            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_1.png" alt="shop_image_1">
                </div>
                <div class="shop-text">
                    <span>BIRDSNEST EGGCUP QUATTRO</span>
                    <h2>35.00€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_2.png" alt="shop_image_2">
                </div>
                <div class="shop-text">
                    <span>EARDROPS IV – HOPF (S)</span>
                    <h2>30.00€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_3.png" alt="shop_image_3">
                </div>
                <div class="shop-text">
                    <span>IPHONE 4 / 4S CASE – CELL 2</span>
                    <h2>23.49€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_4.png" alt="shop_image_4">
                </div>
                <div class="shop-text">
                    <span>IPHONE 6 CASE – CELL 2</span>
                    <h2>23.49€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_5.png" alt="shop_image_5">
                </div>
                <div class="shop-text">
                    <span>NINJA 1983DEB</span>
                    <h2>45.00€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_6.png" alt="shop_image_6">
                </div>
                <div class="shop-text">
                    <span>OCTO, NO.1</span>
                    <h2>12.34€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_7.png" alt="shop_image_7">
                </div>
                <div class="shop-text">
                    <span>PROJET 5500X</span>
                    <h2>22.00€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>

            <div class="shopping-items">
                <div class="shop-images">
                    <img src="img/shop_image_8.png" alt="shop_image_8">
                </div>
                <div class="shop-text">
                    <span>VERTICALS 8597</span>
                    <h2>99.00€</h2>
                    <a href="#">ADD TO CART</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection