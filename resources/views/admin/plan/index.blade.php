@section('title', 'Manage Subscription Settings')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            {{ __('Manage Subscription Settings') }}
        </div>
    </x-slot>

    <div class="bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl">
        <div class="p-6 border-b border-gray-200 overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left text-[20px]">Subscription</th>
                        <th class="text-[20px]">Price</th>
                        <th class="text-right text-[20px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr class="">
                            <td class="text-[16px] font-regular py-3">
                                {{ $plan->name }}
                            </td>
                            <td class="text-[16px] font-regular py-3 text-center">${{ $plan->price }}</td>
                            <td class="text-[16px] font-regular py-3 float-right">
                                <div class="flex justify-between">
                                    <button class="edit-subscription" data-id="{{ $plan->id }}"
                                        data-price="{{ $plan->price }}" data-name="{{ $plan->name }}">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16.5" cy="16.5" r="16.5"
                                                fill="url(#paint0_linear_3085_4505)" />
                                            <path
                                                d="M18.9591 10.1077C18.9251 10.0736 18.8846 10.0465 18.8401 10.028C18.7955 10.0095 18.7478 10 18.6995 10C18.6513 10 18.6036 10.0095 18.559 10.028C18.5145 10.0465 18.474 10.0736 18.44 10.1077L11 17.5484V20.6334C11 20.7306 11.0386 20.8239 11.1074 20.8926C11.1761 20.9614 11.2694 21 11.3666 21H14.4516L21.8923 13.56C21.9264 13.526 21.9535 13.4855 21.972 13.441C21.9905 13.3964 22 13.3487 22 13.3005C22 13.2522 21.9905 13.2045 21.972 13.1599C21.9535 13.1154 21.9264 13.0749 21.8923 13.0409L18.9591 10.1077Z"
                                                fill="white" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3085_4505" x1="16.5"
                                                    y1="0" x2="16.5" y2="33"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4229E2" />
                                                    <stop offset="1" stop-color="#6552E7" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="subscription-card" class="hidden p-6 bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl mt-10">
        <h1 class="text-[30px] md:text-[36px] font-semibold">
            Edit Price
        </h1>
        <form action="{{ route('subscription.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="sm:flex justify-between mt-3">
                <div>
                    <input type="hidden" name="id" id="subscription-id">
                    <input type="text" name="name" id="subscription-name"
                        class="w-full sm:w-auto bg-transparent border-[#442AE2] rounded-lg">
                    <input type="text" name="price" id="subscription-price"
                        class="w-full sm:w-auto bg-transparent border-[#442AE2] rounded-lg sm:ml-10 my-3 sm:my-0">
                </div>
                <button
                    class="w-full sm:w-auto py-2 px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[18px] font-medium hover:bg-indigo-500">
                    Edit
                </button>
            </div>
        </form>
    </div>

    @push('script')
        <script>
            $('.edit-subscription').click(function(e) {
                e.preventDefault();

                $('#subscription-card').removeClass('hidden');
                let subscriptionId = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                console.warn(subscriptionId);
                console.warn(name);
                console.warn(price);


                $('#subscription-id').val(subscriptionId);
                $('#subscription-name').val(name);
                $('#subscription-price').val(price);
            });
        </script>
    @endpush
</x-app-layout>
