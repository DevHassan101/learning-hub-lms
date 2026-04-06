@forelse ($courses as $i => $course)
    <tr class="border-b border-[#102935]">
        <td class="text-[16px] font-regular py-3 text-center">{{ $i + 1 }}</td>
        <td class="text-[16px] font-regular py-3 text-center">{{ $course->title }}</td>
        <td class="text-[16px] font-regular py-3 text-center">{{ count($course->enrollments) }}</td>
        <td class="text-[16px] font-regular py-3 text-center">{{ count($course->quizQuestions) }}
        </td>
        <td class="text-[16px] font-regular py-3 text-center">{{ count($course->examQuestions) }}
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5">
            <div class="flex justify-center items-center">
                <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}" alt="">
            </div>
        </td>
    </tr>
@endforelse
