@include('user.navbar')

<section class="checkout-wrap pb-5">
    <div class="container">
        <form class="form-group" method="POST" action="{{ route('user.checkout.placeOrder') }}">
            @csrf
            <div class="row g-5">
                
                <div class="col-lg-6">
                    <h4 class="text-dark pb-4">Additional Information</h4>
                    <div class="billing-details">
                        <label for="orderNotes">Order notes (optional)</label>
                        <textarea class="form-control pt-3 pb-3 ps-3 mt-2" name="order_notes" placeholder="Notes about your order. Like special notes for delivery."></textarea>
                    </div>
                     <!-- Payment Method Section -->
                     <h4 class="text-dark pb-4">Payment Method</h4>
                     <div class="payment-method">
                         <label for="paymentMethod">Choose payment method*</label>
                         <select class="form-select form-control mt-2 mb-4" id="paymentMethod" name="payment_method" onchange="togglePaymentSection()">
                             <option value="cod" {{ old('payment_method', $profile->payment_method) == 'cod' ? 'selected' : '' }}>Cash on Delivery</option>
                             <option value="paypal" {{ old('payment_method', $profile->payment_method) == 'paypal' ? 'selected' : '' }}>PayPal</option>
                             <option value="card" {{ old('payment_method', $profile->payment_method) == 'card' ? 'selected' : '' }}>Credit/Debit Card</option>
                         </select>
                     </div>
 
                     <!-- PayPal Section -->
                     <div id="paypalSection" class="payment-details" style="display: none;">
                         <label for="paypalEmail">PayPal Email*</label>
                         <input type="email" id="paypalEmail" name="paypal_email" class="form-control mt-2 mb-4 ps-3" placeholder="Enter your PayPal email">
                     </div>
 
                     <!-- Credit Card Section -->
                     <div id="cardSection" class="payment-details" style="display: none;">
                         <label for="cardNumber">Card Number*</label>
                         <input type="text" id="cardNumber" name="card_number" class="form-control mt-2 mb-4 ps-3" placeholder="Enter your card number">
 
                         <label for="expiryDate">Expiry Date*</label>
                         <input type="text" id="expiryDate" name="expiry_date" class="form-control mt-2 mb-4 ps-3" placeholder="MM/YY">
 
                         <label for="cvv">CVV*</label>
                         <input type="text" id="cvv" name="cvv" class="form-control mt-2 mb-4 ps-3" placeholder="Enter CVV">
                     </div>

                    <div class="your-order mt-5">
                        <h4 class="display-7 text-dark pb-4">Cart Totals</h4>
                        <div class="total-price">
                            <table cellspacing="0" class="table">
                                <tbody>
                                    <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal">
                                            <span class="price-amount amount ps-5">
                                                <bdi><span class="price-currency-symbol">$</span>{{ $cartTotal }}</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                        <th>Total</th>
                                        <td data-title="Total">
                                            <span class="price-amount amount ps-5">
                                                <bdi><span class="price-currency-symbol">$</span>{{ $cartTotal }}</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('user.checkout.placeOrder') }}" method="POST">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-dark btn-lg text-uppercase btn-rounded-none w-100">Place an order</button>
                            </form>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Function to show or hide payment sections based on selected payment method
    function togglePaymentSection() {
        var paymentMethod = document.getElementById('paymentMethod').value;
        
        // Hide all sections initially
        document.getElementById('paypalSection').style.display = 'none';
        document.getElementById('cardSection').style.display = 'none';
        
        // Show the relevant section based on selected payment method
        if (paymentMethod == 'paypal') {
            document.getElementById('paypalSection').style.display = 'block';
        } else if (paymentMethod == 'card') {
            document.getElementById('cardSection').style.display = 'block';
        }
    }

    // Call the function on page load to set the initial state
    window.onload = togglePaymentSection;
</script>
@include('user.footer')
