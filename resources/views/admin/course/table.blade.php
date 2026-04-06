@forelse ($courses as $course)
    <tr class="border-b border-[#102935]">
        <td class="text-[14px] font-regular py-3 text-center text-nowrap p-3">
            <a href="{{ route('course.show', ['course' => $course]) }}" class="hover:underline">{{ $course->title }}</a>
        </td>
        <td class="text-[14px] font-regular py-3 text-center text-nowrap p-3">
            {{ $course->category->title ?? '' }}
        </td>
        <td class="text-[14px] font-regular py-3 text-center text-nowrap p-3">
            {{ substr($course->description, 0, 30) }}
            {{ strlen($course->description) > 30 ? '...' : '' }}
        </td>
        <td class="text-[14px] font-regular py-3 text-center text-nowrap p-3">
            <div class="flex justify-center">
                <a href="{{ route('course.edit', ['course' => $course]) }}" class="mr-2">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.5" cy="16.5" r="16.5" fill="url(#paint0_linear_3085_4505)" />
                        <path
                            d="M18.9591 10.1077C18.9251 10.0736 18.8846 10.0465 18.8401 10.028C18.7955 10.0095 18.7478 10 18.6995 10C18.6513 10 18.6036 10.0095 18.559 10.028C18.5145 10.0465 18.474 10.0736 18.44 10.1077L11 17.5484V20.6334C11 20.7306 11.0386 20.8239 11.1074 20.8926C11.1761 20.9614 11.2694 21 11.3666 21H14.4516L21.8923 13.56C21.9264 13.526 21.9535 13.4855 21.972 13.441C21.9905 13.3964 22 13.3487 22 13.3005C22 13.2522 21.9905 13.2045 21.972 13.1599C21.9535 13.1154 21.9264 13.0749 21.8923 13.0409L18.9591 10.1077Z"
                            fill="white" />
                        <defs>
                            <linearGradient id="paint0_linear_3085_4505" x1="16.5" y1="0" x2="16.5"
                                y2="33" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#4229E2" />
                                <stop offset="1" stop-color="#6552E7" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
                <button class="delete-course" data-id="{{ $course->id }}" type="button">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.5" cy="16.5" r="16.5" fill="url(#paint0_linear_3085_4508)" />
                        <path
                            d="M12 25C11.45 25 10.9793 24.8043 10.588 24.413C10.1967 24.0217 10.0007 23.5507 10 23V10H9V8H14V7H20V8H25V10H24V23C24 23.55 23.8043 24.021 23.413 24.413C23.0217 24.805 22.5507 25.0007 22 25H12ZM22 10H12V23H22V10ZM14 21H16V12H14V21ZM18 21H20V12H18V21Z"
                            fill="white" />
                        <defs>
                            <linearGradient id="paint0_linear_3085_4508" x1="16.5" y1="0" x2="16.5"
                                y2="33" gradientUnits="userSpaceOnUse">
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
    <td colspan="4">
        <div class="flex justify-center items-center">
            <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}"
                alt="">
        </div>
    </td>
</tr>
@endforelse