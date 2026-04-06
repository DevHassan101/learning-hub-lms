@extends('layouts.app2')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
<script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
<style>
    * {
        font-family: "Outfit", sans-serif !important;
    }
</style>

@section('main')
    <section class="min-h-screen py-16 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-[85rem] mx-auto px-5">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-center justify-between mb-12 gap-4">
                <a href="{{ url('/programs') }}"
                    class="flex items-center gap-2 text-[#3bcbbe] font-semibold hover:opacity-80">
                    <iconify-icon icon="icon-park-outline:arrow-left" width="25" height="25"
                        style="color: #28c4b7"></iconify-icon>
                    Back to Programs
                </a>

                <select class="currency border-2 border-[#3bcbbe] rounded-xl py-2 px-10 shadow-sm">
                    <option value="USD" data-symbol="$">USD</option>
                    <option value="NGN" data-symbol="₦">Naira</option>
                    <option value="GBP" data-symbol="£">GBP</option>
                </select>
            </div>
            <center>
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    Our Subscriptions
                </span>
            </center>
            <h1 class="text-center text-4xl font-bold text-[#102935] mb-4">
                Choose Your Subscription Plan
            </h1>
            <p class="text-center text-slate-500 mb-14 max-w-2xl mx-auto">
                Flexible pricing designed for students and professionals. Cancel anytime. Upgrade anytime.
            </p>

            <!-- Plans -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">

                @foreach ($plans as $i => $plan)
                    <form action="{{ route('selected-plan') }}" method="post" class="h-full">
                        @csrf
                        <input type="hidden" name="currency" value="USD" class="currency-input">
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <input type="hidden" name="amount" value="{{ $plan->price }}"
                            id="purchase-amount-{{ $i }}">

                        <div
                            class="relative h-full cursor-pointer bg-white border border-[#3bcbbe] rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 flex flex-col">

                            <!-- Plan Badge -->
                            <div
                                class="absolute top-5 right-5 bg-[#3bcbbe]/5 border border-[#3bcbbf71] text-[#3bcbbe] px-4 py-1 rounded-full text-sm font-semibold tracking-wide">
                                Popular
                            </div>

                            <!-- Title -->
                            <h2 class="text-3xl font-bold text-[#102935] mb-3 text-center">
                                {{ $plan->name }}
                            </h2>

                            <!-- Price -->
                            <div class="flex justify-center items-baseline mb-6">
                                <span id="symbol-{{ $i }}" class="text-3xl font-semibold mr-2">$</span>
                                <span id="amount-{{ $i }}" data-original-amount="{{ $plan->price }}"
                                    class="text-5xl font-extrabold text-[#102935]">
                                    {{ $plan->price }}
                                </span>
                                <span class="ml-2 text-slate-400">/ month</span>
                            </div>

                            <!-- CTA -->
                            <button type="submit"
                                class="w-full py-3 rounded-xl bg-gradient-to-br from-[#3bcbbe] to-[#2db8ad] text-white text-lg font-semibold hover:scale-[1.02] transition mb-4">
                                Subscribe Now
                            </button>

                            <p class="text-center text-slate-400 mb-8">
                                Cancel anytime · Instant access
                            </p>

                            <!-- Features -->
                            <ul class="space-y-4 mt-auto">
                                @foreach ($plan->points as $point)
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="w-6 h-6 rounded-full border border-[#3bcbbf71] bg-[#3bcbbe]/10 flex items-center justify-center">
                                            <svg width="14" height="12" viewBox="0 0 16 13" fill="none">
                                                <path d="M1 8.5C1 8.5 2.5 8.5 4.5 12C4.5 12 10.059 2.833 15 1"
                                                    stroke="#3bcbbe" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="text-slate-700 text-base">
                                            {{ $point->point }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            let exchangeRates = {};

            async function fetchExchangeRates() {
                try {
                    const response = await fetch(`https://api.exchangerate-api.com/v4/latest/USD`);
                    const data = await response.json();
                    exchangeRates = data.rates;
                } catch (error) {
                    console.error("Error fetching exchange rates:", error);
                }
            }

            fetchExchangeRates();

            $('.currency').change(function(e) {
                let currency = $(this).val();
                $('.currency-input').val(currency);
                let exchangeRate = exchangeRates[currency];
                let symbol = $(this).find(':selected').data('symbol');
                let count = "{{ count($plans) }}";

                for (let index = 0; index < count; index++) {
                    let amount = $(`#amount-${index}`).data('original-amount');
                    let newAmount = exchangeRate * amount;

                    $(`#purchase-amount-${index}`).val(newAmount);
                    $(`#amount-${index}`).text(newAmount.toFixed(2));
                    $(`#symbol-${index}`).text(symbol);
                }
            });
        });
    </script>
@endsection
