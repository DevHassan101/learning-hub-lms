
@forelse ($contactUsMessages as $message)
<tr class="border-b border-[#102935]">
    <td class="text-[16px] font-regular text-center text-nowrap p-3">{{ $message->name }}
    </td>
    <td class="text-[16px] font-regular text-center text-nowrap p-3">
        {{ $message->email }}
    </td>
    <td class="text-[16px] font-regular text-center text-nowrap p-3">
        {{ Str::limit($message->message, 50) }}
    </td>
    <td class="text-[16px] font-regular py-3 text-center">
        <div class="flex justify-center">
            <button class="mr-2 show-message" data-message="{{ $message->message }}">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="16.5" cy="16.5" r="16.5"
                        fill="url(#paint0_linear_3085_4508)" />
                    <path
                        d="M8 11H8.01M12 11H12.01M16 11H16.01M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z"
                        stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" transform="translate(4.5,4.5)" />
                    <defs>
                        <linearGradient id="paint0_linear_3085_4508" x1="16.5"
                            y1="0" x2="16.5" y2="33"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4229E2" />
                            <stop offset="1" stop-color="#6653E7" />
                        </linearGradient>
                    </defs>
                </svg>
            </button>
            <button type="button" class="delete-message" data-id="{{ $message->id }}">
                <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="16.5" cy="16.5" r="16.5"
                        fill="url(#paint0_linear_3085_4508)" />
                    <path
                        d="M12 25C11.45 25 10.9793 24.8043 10.588 24.413C10.1967 24.0217 10.0007 23.5507 10 23V10H9V8H14V7H20V8H25V10H24V23C24 23.55 23.8043 24.021 23.413 24.413C23.0217 24.805 22.5507 25.0007 22 25H12ZM22 10H12V23H22V10ZM14 21H16V12H14V21ZM18 21H20V12H18V21Z"
                        fill="white" />
                    <defs>
                        <linearGradient id="paint0_linear_3085_4508" x1="16.5"
                            y1="0" x2="16.5" y2="33"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#4229E2" />
                            <stop offset="1" stop-color="#6653E7" />
                        </linearGradient>
                    </defs>
                </svg>

            </button>

        </div>
    </td>
</tr>

@empty
<tr>
    <td colspan="3">
        <div class="flex justify-center items-center">
            <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}"
                alt="">
        </div>
    </td>
</tr>
@endforelse