@forelse ($users as $user)
    <tr class="border-b border-[#102935]">
        <td class="text-[16px] font-regular text-center text-nowrap p-3">{{ $user->name }}</td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">{{ $user->email }}</td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            @php
                $already = [];
            @endphp
            @foreach ($user->subscriptions as $index => $item)
                @if (!in_array($item->plan->category->title, $already))
                    @php
                        array_push($already, $item->plan->category->title);
                    @endphp
                    {{ 0 != $index ? ', ' : '' }}{{ $item->plan->category->title }}
                @endif
            @endforeach
        </td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            {{ count($user->continueCourses) }}
        </td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            {{ count($user->completedCourses) }}
        </td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            {{ number_format($user->user_quiz_average) }}
        </td>
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            {{ number_format($user->user_exam_average) }}
        </td>

        {{-- <td class="text-[16px] font-regular text-center text-nowrap p-3">
        {{ count($user->userExams) }}
    </td>
    <td class="text-[16px] font-regular text-center text-nowrap p-3">
        {{ count($user->userQuizzes) }}
    </td> --}}
        <td class="text-[16px] font-regular text-center text-nowrap p-3">
            <p class="bg-gradient-to-r from-[#442AE2] to-[#6956E7] text-white min-w-[70px] py-1 rounded text-[14px]">
                {{ $user->status == 1 ? 'Active' : 'De-active' }}
            </p>
        </td>
        <td class="text-[16px] font-regular py-3 text-center">
            <div class="flex justify-between">
                <a href="#" class="change-status" data-id="{{ $user->id }}"
                    data-status="{{ $user->status }}">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16.5" cy="16.5" r="16.5" fill="url(#paint0_linear_3085_4502)" />
                        <path
                            d="M25.9583 16.2975C25.9309 16.2325 25.261 14.695 23.7652 13.1467C22.3772 11.7117 19.9925 10 16.5 10C13.0075 10 10.6228 11.7117 9.23483 13.1467C7.73896 14.695 7.06912 16.23 7.04175 16.2975C7.01422 16.3615 7 16.4308 7 16.5008C7 16.5709 7.01422 16.6402 7.04175 16.7042C7.06912 16.7683 7.73896 18.3058 9.23483 19.8542C10.6228 21.2892 13.0075 23 16.5 23C19.9925 23 22.3772 21.2892 23.7652 19.8542C25.261 18.3058 25.9309 16.7708 25.9583 16.7042C25.9858 16.6402 26 16.5709 26 16.5008C26 16.4308 25.9858 16.3615 25.9583 16.2975ZM16.5 22C13.9736 22 11.7677 21.0483 9.9425 19.1725C9.17743 18.3854 8.53 17.4847 8.02155 16.5C8.52986 15.5155 9.17731 14.615 9.9425 13.8283C11.7677 11.9517 13.9736 11 16.5 11C19.0264 11 21.2323 11.9517 23.0575 13.8283C23.8227 14.615 24.4701 15.5155 24.9785 16.5C24.4656 17.5175 21.8941 22 16.5 22ZM16.5 12.6667C15.7675 12.6667 15.0515 12.8915 14.4425 13.3127C13.8335 13.7339 13.3588 14.3326 13.0785 15.033C12.7982 15.7335 12.7248 16.5043 12.8677 17.2478C13.0106 17.9914 13.3633 18.6745 13.8813 19.2106C14.3992 19.7467 15.0591 20.1118 15.7775 20.2597C16.4959 20.4076 17.2405 20.3317 17.9172 20.0415C18.594 19.7514 19.1724 19.2601 19.5793 18.6297C19.9862 17.9993 20.2034 17.2582 20.2034 16.5C20.2022 15.4837 19.8116 14.5095 19.1173 13.7909C18.4231 13.0723 17.4818 12.668 16.5 12.6667ZM16.5 19.3333C15.9586 19.3333 15.4294 19.1672 14.9792 18.8558C14.5291 18.5445 14.1782 18.102 13.971 17.5843C13.7639 17.0665 13.7097 16.4969 13.8153 15.9472C13.9209 15.3976 14.1816 14.8928 14.5644 14.4965C14.9472 14.1003 15.435 13.8304 15.966 13.7211C16.497 13.6118 17.0473 13.6679 17.5475 13.8823C18.0477 14.0968 18.4752 14.4599 18.776 14.9259C19.0768 15.3918 19.2373 15.9396 19.2373 16.5C19.2373 17.2514 18.9489 17.9721 18.4356 18.5035C17.9222 19.0348 17.226 19.3333 16.5 19.3333Z"
                            fill="white" />
                        <defs>
                            <linearGradient id="paint0_linear_3085_4502" x1="16.5" y1="0" x2="16.5"
                                y2="33" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#432BE2" />
                                <stop offset="1" stop-color="#6552E7" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
                <a href="{{ route('users.edit', ['user' => $user]) }}" class="mx-2">
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
                <button type="button" class="delete-user" data-id="{{ $user->id }}">
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
        <td colspan="8">
            <div class="flex justify-center items-center">
                <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}" alt="">
            </div>
        </td>
    </tr>
@endforelse
