
<div class="shopping-items">
    <div class="shop-images">
        <img src="{{ route('show-image', $product->image->id) }}" alt="shop_image_1">
    </div>
    <div class="shop-text">
        <span>{{ $product->heading }}</span>
        <h2>{{ $product->price }}€</h2>
        <a href="#">ADD TO CART</a>
        @auth
            @if (Auth::user()->is_admin)
                <br><br><br>
                <a href="{{ route('shop.edit', $product->id) }}" class="btn-submit">Edit</a>
                <form action="{{ route('shop.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-submit">X</button>
                </form>
            @endif
        @endauth
    </div>
</div>