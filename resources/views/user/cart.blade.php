@include('user.navbar')

<section class="py-5">
  <div class="container">
    <div class="row my-5">
      <div class="col-md-8">
        <div class="cart-table">
          <div class="cart-header">
            <div class="row d-flex border-bottom">
              <h6 class="cart-title text-uppercase col-lg-4 pb-3">Product</h6>
              <h6 class="cart-title text-uppercase col-lg-3 pb-3">Quantity</h6>
              <h6 class="cart-title text-uppercase col-lg-4 pb-3">Subtotal</h6>
            </div>
          </div>

          @foreach($cart as $productId => $item)
          @php
              $product = $products->firstWhere('id', $productId); // جلب المنتج من الـ products
          @endphp
          
          @if ($product)
              <div class="cart-item border-top border-bottom">
                  <div class="row align-items-center">
                      <div class="col-lg-4 col-md-3">
                          <div class="cart-info d-flex flex-wrap align-items-center">
                              <div class="col-lg-5">
                                  <div class="card-image">
                                      <img src="{{ asset($product->images->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <div class="card-detail ps-3">
                                      <h5 class="card-title">
                                          <a href="#" class="text-decoration-none">{{ $product->name }}</a>
                                      </h5>
                                      <div class="card-price">
                                          <span class="money">${{ $product->price }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-7">
                          <div class="row d-flex">
                              <div class="col-md-4">
                                
                                  <div class="input-group product-qty">
                                      <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-product-id="{{ $product->id }}">
                                          <svg width="16" height="16">
                                              <use xlink:href="#minus"></use>
                                          </svg>
                                      </button>
                                      </span>
                                      <input type="text" id="quantity-{{ $product->id }}" name="quantity" class="form-control input-number text-center" value="{{ $item['quantity'] }}" min="1" max="{{ $product->stock }}">
                                      <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-product-id="{{ $product->id }}">
                                          <svg width="16" height="16">
                                              <use xlink:href="#plus"></use>
                                          </svg>
                                      </button>
                                      </span>
                                  </div>
                              </div>
                              <div class="col-md-8 text-center">
                                  <div class="total-price">
                                      <span class="money text-dark" id="total-price-{{ $product->id }}">jd{{ $product->price * $item['quantity'] }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-1 col-md-2">
                        <div class="cart-remove">
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
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
              </div>
          @endif
          @endforeach
          
        </div>
      </div>

      <div class="col-md-4">
        <div class="cart-totals bg-grey py-5">
          <h4 class="text-dark pb-4">Cart Total</h4>
          <div class="total-price pb-5">
            <table cellspacing="0" class="table text-uppercase">
              <tbody>
                <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                  <th>Subtotal</th>
                  <td data-title="Subtotal">
                    <span class="price-amount amount text-dark ps-5">
                      <bdi>
                        <span class="price-currency-symbol">jd</span>
                        @php
                          // تحويل السلة إلى Collection
                          $cartCollection = collect($cart);
                        @endphp
                        {{ number_format($cartCollection->sum(function ($item) use ($products) {
                          // استخدام المفتاح $productId الذي هو المفتاح في السلة
                          $product = $products->firstWhere('id', $item['product_id']);
                          return $item['quantity'] * $product->price;
                        }), 2) }}
                      </bdi>
                    </span>
                  </td>
                </tr>
                <tr class="order-total pt-2 pb-2 border-bottom">
                  <th>Total</th>
                  <td data-title="Total">
                    <span class="price-amount amount text-dark ps-5" id="cart-total">
                      <bdi>
                        <span class="price-currency-symbol">jd</span>
                        {{ number_format($cartCollection->sum(function ($item) use ($products) {
                          // حساب total
                          $product = $products->firstWhere('id', $item['product_id']);
                          return $item['quantity'] * $product->price;
                        }), 2) }}
                      </bdi>
                    </span>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="button-wrap row g-2">
            <div class="col-md-6"><button class="btn btn-dark text-uppercase btn-rounded-none w-100">Update Cart</button></div>
            <div class="col-md-6"><button class="btn btn-dark text-uppercase btn-rounded-none w-100">Continue Shopping</button></div>
            {{-- <div class="col-md-12"><button class="btn btn-primary text-uppercase btn-rounded-none w-100" >Proceed to Checkout</button></div> --}}
            <div class="col-md-12">
              <a href="{{ route('user.checkout.redirect') }}" class="btn btn-primary text-uppercase btn-rounded-none w-100">
                  Proceed to Checkout
              </a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // دالة لتحديث السلة
    const updateCart = (productId, quantity) => {
        fetch(`/cart/update/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            // تحديث السعر الفرعي للمنتج
            document.querySelector(`#total-price-${productId}`).textContent = `JD ${data.totalPrice}`;

            // تحديث الكمية المعروضة في المدخل
            document.querySelector(`#quantity-${productId}`).value = quantity;

            // تحديث السعر الكلي للسلة
            const cartTotalElement = document.querySelector('#cart-total');
            if (cartTotalElement) {
                cartTotalElement.textContent = `JD ${data.cartTotal}`; // تحديث الـ Total في الصفحة
            }
        })
        .catch(error => console.error('Error:', error));
    };

    // إضافة حدث عند الضغط على زر + لزيادة الكمية
    document.querySelectorAll('.quantity-right-plus').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const quantityInput = document.querySelector(`#quantity-${productId}`);
            let quantity = parseInt(quantityInput.value);
            quantity++; // زيادة الكمية
            updateCart(productId, quantity); // تحديث الكمية في السلة
        });
    });

    // إضافة حدث عند الضغط على زر - لتقليل الكمية
    document.querySelectorAll('.quantity-left-minus').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const quantityInput = document.querySelector(`#quantity-${productId}`);
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--; // تقليل الكمية
                updateCart(productId, quantity); // تحديث الكمية في السلة
            }
        });
    });
});





</script>
@include('user.footer')


