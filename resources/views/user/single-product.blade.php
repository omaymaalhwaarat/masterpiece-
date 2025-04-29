@include('user.navbar')




    <section id="product-detail" class="single-product py-5 no-padding-top">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-7">
            <div class="row flex-column">
              <div class="col-md-12">
                <!-- product-large-slider -->
                <div class="swiper product-large-slider">
                  <div class="swiper-wrapper">
                    @foreach($product->images as $image)
            <div class="swiper-slide">
              <img src="{{ asset($image->image_path) }}" alt="product-large" class="img-fluid" style="width: 50%; height:35%; object-fit: cover; border-radius: 10%; margin-left: 10%; ">
            </div>
          @endforeach
                  </div>
                </div>
                <!-- / product-large-slider -->
              </div>
            </div>
          </div>
          <div class="col-md-5" style="margin-top: 10%;">
            <div class="product-info mt-4">
              <div class="element-header">
                <h2 itemprop="name" class="product-title text-uppercase text-black">{{ $product->name }}</h2>
                <div class="rating-container d-flex align-items-center">
                  <div class="rating" data-rating="1" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="2" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="3" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="4" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="5" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                  <span class="rating-count">(3.5)</span>
                </div>
              </div>


<div class="product-price my-3">
    @if($product->discount)
        <!-- السعر بعد الخصم -->
        <span class="fs-2 text-black">JD {{ number_format($product->price - ($product->price * ($product->discount->percentage / 100)), 2) }}</span>
        <!-- السعر الأصلي مع الشطب -->
        <del class="text-muted">JD {{ number_format($product->price, 2) }}</del>
    @else
        <!-- إذا لم يكن هناك خصم، يظهر السعر الأصلي فقط -->
        <span class="fs-2 text-black">JD {{ number_format($product->price, 2) }}</span>
    @endif
</div>


              <p>{{ $product->description }}</p>
              <div class="product-action mt-4">
                <div class="item-title">{{ $product->stock }} in stock</div>

           
                <form action="{{ route('cart.add') }}" method="POST" class="w-100">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                  <div class="product-quantity d-flex flex-wrap">
                    <div class="input-group product-qty me-3" style="max-width: 150px;">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field="">
                          <svg width="16" height="16">
                            <use xlink:href="#minus"></use>
                          </svg>
                        </button>
                      </span>
                      <input type="text" id="quantity" name="quantity" class="form-control input-number text-center"
                        value="1" min="1" max="{{ $product->stock }}">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="">
                          <svg width="16" height="16">
                            <use xlink:href="#plus"></use>
                          </svg>
                        </button>
                      </span>
                    </div>
                
                    <button type="submit" name="add" id="add-to-cart"
                      class="btn btn-dark product-cart-submit btn-lg text-uppercase me-3">
                      <span id="add-to-cart">Add to cart</span>
                    </button>
                
                    <button href="#" class="btn btn-dark wish-list-button">
                      <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                        <use xlink:href="#heart"></use>
                      </svg>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 
    <section class="product-tabs mt-5">
      <div class="container">
          <div class="row">
              <div class="tabs-listing">
                  <nav>
                      <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                          <button class="nav-link active text-uppercase px-5 py-3" id="nav-home-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                              aria-selected="true">Details</button>
                          <button class="nav-link text-uppercase px-5 py-3" id="nav-information-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information"
                              aria-selected="false">How To Use</button>
                          <button class="nav-link text-uppercase px-5 py-3" id="nav-review-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                              aria-selected="false">Reviews</button>
                      </div>
                  </nav>
                  <div class="tab-content py-5" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <h5>Product Description</h5>
                          <p>{{ $product->description }}</p>
                      </div>
    
                      <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        @if(auth()->check())
                            <!-- التحقق إذا كان المستخدم قد اشترى المنتج -->
                            @if(auth()->user()->orders()->whereHas('items', function($query) use ($product) {
                              $query->where('product_id', $product->id);
                          })->exists())
                                <form action="{{ route('review.store', $product->id) }}" method="POST" class="review-form">
                                    @csrf
                                    <h5>Leave a Review</h5>
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <div class="rating-container d-flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <div class="rating" data-rating="{{ $i }}">
                                                    <input type="radio" id="rating_{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                    <svg width="32" height="32">
                                                        <use xlink:href="{{ old('rating') >= $i ? '#star-solid' : '#star-outline' }}"></use>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Your Comment</label>
                                        <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Write your review here...">{{ old('comment') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                                </form>
                            @else
                                <p>You must have purchased this product to leave a review.</p>
                            @endif
                        @else
                            <p>You must be logged in to leave a review.</p>
                        @endif
                    
                        <!-- عرض التعليقات الموجودة -->
                        @foreach($product->reviews as $review)
                            <div class="review-item d-flex">
                                <div class="row g-4">
                                    <div class="col-md-7">
                                        <div class="review-content">
                                            <div class="rating-container d-flex align-items-center">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <div class="rating" data-rating="{{ $i }}">
                                                        <svg width="32" height="32">
                                                            <use xlink:href="{{ $i <= $review->rating ? '#star-solid' : '#star-outline' }}"></use>
                                                        </svg>
                                                    </div>
                                                @endfor
                                                <span class="rating-count">({{ $review->rating }})</span>
                                            </div>
                                            <div class="review-header">
                                                <span class="author-name">{{ $review->user->name }}</span>
                                                <span class="review-date">– {{ $review->created_at->format('d/m/Y') }}</span>
                                            </div>
                                            <p class="comment-text">{{ $review->comment }}</p>
                                            @auth
                                            @if($review->user_id == auth()->user()->id)
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('review.delete', $product->id) }}" class="btn btn-danger w-100">Delete Review</a>
                                                    <button class="btn btn-warning w-100 edit-review-btn" data-review-id="{{ $review->id }}">Edit Review</button>
                                                </div>
                                            @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
    
                      <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                          @if(auth()->check())
                              <form action="{{ route('review.store', $product->id) }}" method="POST" class="review-form">
                                  @csrf
                                  <h5>Leave a Review</h5>
                                  <div class="form-group">
                                      <label for="rating">Rating</label>
                                      <div class="rating-container d-flex">
                                          @for($i = 1; $i <= 5; $i++)
                                              <div class="rating" data-rating="{{ $i }}">
                                                  <input type="radio" id="rating_{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                  <svg width="32" height="32">
                                                      <use xlink:href="{{ old('rating') >= $i ? '#star-solid' : '#star-outline' }}"></use>
                                                  </svg>
                                              </div>
                                          @endfor
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="comment">Your Comment</label>
                                      <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Write your review here...">{{ old('comment') }}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                              </form>
                          @else
                              <p>You must be logged in to leave a review.</p>
                          @endif
    
                          @foreach($product->reviews as $review)
                              <div class="review-item d-flex">
                                  <div class="row g-4">
                                      <div class="col-md-7">
                                          <div class="review-content">
                                              <div class="rating-container d-flex align-items-center">
                                                  @for($i = 1; $i <= 5; $i++)
                                                      <div class="rating" data-rating="{{ $i }}">
                                                          <svg width="32" height="32">
                                                              <use xlink:href="{{ $i <= $review->rating ? '#star-solid' : '#star-outline' }}"></use>
                                                          </svg>
                                                      </div>
                                                  @endfor
                                                  <span class="rating-count">({{ $review->rating }})</span>
                                              </div>
                                              <div class="review-header">
                                                  <span class="author-name">{{ $review->user->name }}</span>
                                                  <span class="review-date">– {{ $review->created_at->format('d/m/Y') }}</span>
                                              </div>
                                              <p class="comment-text">{{ $review->comment }}</p>
                                              @auth
                                              @if($review->user_id == auth()->user()->id)
                                                  <div class="d-flex gap-3">
                                                      <a href="{{ route('review.delete', $product->id) }}" class="btn btn-danger w-100">Delete Review</a>
                                                      <button class="btn btn-warning w-100 edit-review-btn" data-review-id="{{ $review->id }}">Edit Review</button>
                                                  </div>
                                              @endif
                                          @endauth
                                          
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
    <!-- JavaScript للتحكم في زر التعديل -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // جلب جميع أزرار "Edit"
          var editButtons = document.querySelectorAll('.edit-review-btn');
    
          editButtons.forEach(function (button) {
              button.addEventListener('click', function () {
                  // جلب التعليق الذي سيتم تعديله
                  var reviewId = button.getAttribute('data-review-id');
                  var commentText = button.closest('.review-item').querySelector('.comment-text').innerText;
    
                  // تحويل النص إلى مربع نص
                  var textarea = document.getElementById('comment');
                  textarea.value = commentText;
                  textarea.placeholder = "Edit your comment here...";
    
                  // تغيير النموذج ليكون تحديثًا بدلاً من إرسال جديد
                  var form = button.closest('form');
                  form.action = "{{ route('review.update', '') }}/" + reviewId;
                  form.method = "POST";
    
                  // إضافة طريقة التحديث (PUT)
                  var methodInput = document.createElement('input');
                  methodInput.setAttribute('name', '_method');
                  methodInput.setAttribute('value', 'PUT');
                  form.appendChild(methodInput);
    
                  // تغيير النص في زر الإرسال ليصبح "Update Review"
                  form.querySelector('button[type="submit"]').innerText = "Update Review";
              });
          });
      });
    </script>
    




    <section id="related-products" class="related-products product-carousel py-5 position-relative open-up"
      data-aos="zoom-out">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center my-5 py-lg-5">
          <div class="line-img my-2">
            <img src="images/line.png" alt="">
          </div>
          <h4 class="text-uppercase mb-0">Related Products</h4>
          <div class="line-img my-2">
            <img src="images/line.png" alt="">
          </div>
        </div>
        <div class="swiper product-swiper overflow-hidden">
          <div class="swiper-wrapper d-flex">



            @foreach($relatedProducts as $relatedProduct)
        <div class="swiper-slide">
          <div class="product-item">
          <div class="image-holder position-relative">
            <a href="{{ route('user.product.show', $relatedProduct->id) }}">
            {{-- <img
              src="{{ asset('images/products/' . $relatedProduct->images->first()->image_path ?? 'images/default-product.jpg') }}"
              alt="product image" class="product-image img-fluid"> --}}
            <img src="{{ asset($relatedProduct->images->first()->image_path ?? 'images/default-product.jpg') }}"
              alt="categories" class="product-image img-fluid">
            </a>
            <a href="wishlist.html" class="btn-icon btn-wishlist">
            <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#heart"></use>
            </svg>
            </a>
            <a href="wishlist.html" class="btn-icon btn-cart">
            <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
              <use xlink:href="#cart"></use>
            </svg>
            </a>
            <div class="product-content">
            <h5 class="element-title text-uppercase fs-6 mt-3">
              <a href="{{ route('user.product.show', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
            </h5>
            <a href="#" class="text-decoration-none" data-after="Add to cart">
              <span>JD {{ number_format($relatedProduct->price, 2) }}</span>
            </a>
            </div>
          </div>
          </div>
        </div>
      @endforeach
          </div>
        </div>
      </div>
    </section>
 

@include('user.footer')