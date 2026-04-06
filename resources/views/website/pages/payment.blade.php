@extends('layouts.app2')
@section('main')

    <section class="p-5">
        <a href="{{ url('/plan/' . encrypt($plan->category->title)) }}">
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.21934 7.29865C0.0788893 7.15802 -2.87182e-07 6.9674 -2.9587e-07 6.76865C-3.04557e-07 6.56989 0.0788893 6.37927 0.21934 6.23865L6.21934 0.238644C6.288 0.164958 6.3708 0.105856 6.4628 0.0648639C6.5548 0.0238721 6.65411 0.00183076 6.75482 5.40642e-05C6.85552 -0.00172264 6.95555 0.0168015 7.04894 0.0545222C7.14233 0.0922429 7.22716 0.148389 7.29838 0.219607C7.3696 0.290826 7.42574 0.37566 7.46346 0.469048C7.50118 0.562437 7.51971 0.662464 7.51793 0.763167C7.51615 0.86387 7.49411 0.963185 7.45312 1.05518C7.41213 1.14718 7.35303 1.22998 7.27934 1.29865L2.55934 6.01865L16.7493 6.01864C16.9483 6.01864 17.139 6.09766 17.2797 6.23831C17.4203 6.37897 17.4993 6.56973 17.4993 6.76864C17.4993 6.96756 17.4203 7.15832 17.2797 7.29897C17.139 7.43963 16.9483 7.51864 16.7493 7.51864L2.55934 7.51865L7.27934 12.2386C7.35303 12.3073 7.41213 12.3901 7.45312 12.4821C7.49411 12.5741 7.51616 12.6734 7.51793 12.7741C7.51971 12.8748 7.50118 12.9749 7.46346 13.0682C7.42574 13.1616 7.3696 13.2465 7.29838 13.3177C7.22716 13.3889 7.14233 13.445 7.04894 13.4828C6.95555 13.5205 6.85552 13.539 6.75482 13.5372C6.65412 13.5355 6.5548 13.5134 6.4628 13.4724C6.3708 13.4314 6.288 13.3723 6.21934 13.2986L0.21934 7.29865Z"
                    fill="#442AE2" />
            </svg>
        </a>

        <div class="px-10 md:px-30 xl:px-40 w-full h-[90vh] flex items-center justify-center">
            <div class="sm:w-[80%]">
                @if (Session::has('success'))
                    <div class="success-card border border-green-500 bg-green-100 text-green-600 w-full rounded p-4">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <form role="form" action="{{ route('payment.process') }}" method="POST" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <input type="hidden" name="plan" value="{{ $plan->id }}">
                    <input type="hidden" name="currency" value="{{ $data->currency }}">
                    <input type="hidden" name="amount" step="any" value="{{ $data->amount }}">

                    <div class="sm:flex justify-center items-center mb-10">
                        @foreach (['stripe', 'paystack', 'paypal'] as $method)
                            <div class="text-center w-full sm:w-[200px] mb-5 sm:mb-0">
                                <div class="h-[70px] flex items-center justify-center">
                                    <img src="{{ asset($method . '.png') }}" alt="{{ $method }}">
                                </div>
                                <input type="radio" name="payment_method" id="payment_method_{{ $method }}"
                                    value="{{ $method }}" class="payment-method mt-5 h-5 w-5 ring-0 focus:ring-0">
                            </div>
                        @endforeach
                    </div>

                    <div id="error-card" class="hidden border border-red-500 bg-red-100 text-red-600 w-full rounded p-4">
                    </div>
                    <div class="card-fields">
                        <div class="mb-4">
                            <label class="text-[#102935] text-[20px]">Name on Card</label>
                            <input type="text" name="name" placeholder="Name on card"
                                class="w-full border border-[#482EE3] rounded">
                        </div>

                        <div class="mb-4">
                            <label class="text-[#102935] text-[20px]">Card Numberkk</label>
                            <input type="text" name="card_number"
                                class="card-number w-full border border-[#482EE3] rounded"
                                placeholder="1234 5678 0912 3456">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            <div>
                                <label class="text-[#102935] text-[20px]">Expiry Date</label>
                                <input type="text" name="exp_date" id="expire-date" placeholder="MM/YY"
                                    class="w-full border border-[#482EE3] rounded card-expiry-month">
                            </div>
                            <div>
                                <label class="text-[#102935] text-[20px]">CVV/CVC</label>
                                <input type="text" name="cvv" class="w-full border border-[#482EE3] rounded card-cvc" placeholder="CVC">
                            </div>
                        </div>

                    </div>


                    <center class="mt-5">
                        <button id="pay-button"
                            class="w-[80%] py-2 px-4 bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white">
                            Continue
                        </button>
                    </center>
                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    @session('success')
        <script>
            setTimeout(() => {
                $('.success-card').addClass('hidden');
            }, 4000);
        </script>
    @endsession
    <script>
        $(document).ready(function() {
            $('#payment-form').submit(function(e) {
                e.preventDefault();
                let selectedPayment = $("input[name='payment_method']:checked").val();

                if (!selectedPayment) {
                    showError("Please select a payment method.");
                    return;
                }

                if (selectedPayment === 'stripe') {
                    let cardNumber = $('.card-number').val();
                    if (!cardNumber) {
                        showError("Card number is required.");
                        return;                   
                    }
                    let cardCvc = $('.card-cvc').val();
                    if (!cardNumber) {
                        showError("Card cvc is required.");
                        return;                   
                    }


                    Stripe.setPublishableKey($('#payment-form').data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: cardNumber,
                        cvc: cardCvc,
                        exp_month: $('#expire-date').val().split('/')[0],
                        exp_year: $('#expire-date').val().split('/')[1]
                    }, function(status, response) {
                        if (response.error) {
                            showError(response.error.message);
                        } else {
                            $('#payment-form').append(
                                "<input type='hidden' name='stripeToken' value='" + response
                                .id + "'/>");
                            $('#payment-form').off('submit').submit();
                        }
                    });
                } else {
                    $('#payment-form').off('submit').submit();
                }
            });
        });

        function showError(msg) {
            $('#error-card').removeClass('hidden').text(msg);
            setTimeout(() => {
                $('#error-card').addClass('hidden');
            }, 4000);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const cardInput = document.querySelector(".card-number");
            const expDateInput = document.getElementById("expire-date");

            expDateInput.addEventListener("input", function(e) {
                let value = e.target.value.replace(/\D/g, ""); // Remove all non-digit characters
                if (value.length > 4) {
                    value = value.substring(0, 4); // Limit to MMYY format (4 digits)
                }

                // Automatically add '/' after the first two digits (MM/YY)
                if (value.length > 2) {
                    value = value.substring(0, 2) + "/" + value.substring(2);
                }

                e.target.value = value;
            });
            cardInput.addEventListener("input", function(e) {
                let value = e.target.value.replace(/\D/g, ""); // Remove all non-digit characters
                value = value.substring(0, 16); // Limit to 16 digits

                let formattedValue = value.match(/.{1,4}/g)?.join(" ") ||
                    ""; // Add space after every 4 digits
                e.target.value = formattedValue;
            });
            const cvvInput = document.querySelector(".card-cvc");

            cvvInput.addEventListener("input", function(e) {
                let value = e.target.value.replace(/\D/g, ""); // Remove all non-digit characters
                value = value.substring(0, 4); // Limit input to a maximum of 4 digits

                e.target.value = value;
            });

        });
        $('.payment-method').change(function(e) {
            e.preventDefault();
            let paymentMethod = $(this).val();
            console.log(paymentMethod);
            if (paymentMethod == 'stripe') {
                $('.card-fields').show();
            } else {
                $('.card-fields').hide();
            }
        });
    </script>

@endsection

