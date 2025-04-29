@include('user.navbar')

<section id="Wishlist" class="py-5 mb-5">
    <div class="container">
        <div class="row text-dark my-3">
            <div class="col-5 text-uppercase">Product</div>
            <div class="col-2 text-uppercase">Unit Price</div>
            <div class="col-2 text-uppercase">Stock Status</div>
        </div>
        <div id="wishlist-items" class="product-wrapper">
            @foreach ($wishlist as $item)
                <div class="product-item row align-items-center mb-4">
                    <div class="col-4 col-md-1 d-flex align-items-center text-left">
                        <a href="{{ route('user.product.show', $item->id) }}">
                            <img src="{{ asset($item->images->first()->image_path) }}" alt="wishlist" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-8 col-md-4">
                        <h3 class="item-title text-uppercase fs-5">
                            <a href="{{ route('user.product.show', $item->id) }}">{{ $item->name }}</a>
                        </h3>
                    </div>
                    <div class="col-3 col-md-2 product-price text-left">
                        <span class="item-price">${{ number_format($item->price, 2) }}</span>
                    </div>
                    <div class="col-3 col-md-2 wishlist-stock text-left">
                        <span class="item-stock">In Stock</span>
                    </div>
                    <div class="col-3 col-md-2 wishlist-add text-left">
                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark text-uppercase">Add To Cart</button>
                        </form>
                    </div>
                    <div class="col-3 col-md-1 text-left">
                        <div class="cart-remove">
                            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <svg width="32px">
                                        <use xlink:href="#trash"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('user.footer')
