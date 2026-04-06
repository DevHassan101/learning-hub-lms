@extends('website.app')
@section('title', 'Quiz')
@section('main')
    <section class="courses h-[85vh] flex items-center justify-center">
        <h1 class="text-white text-[48px] font-bold">
            Quiz
        </h1>
    </section>

    <section class="min-h-[283px] py-10 px-5 lg:p-20 w-full">
        <div class="bg-white py-20 px-10" style="box-shadow: 0px 2px 10px rgba(90, 90, 90, 0.452);">
            <h1 class="text-[#102935] text-[25px] md:text-[30px] lg:text-[36px] font-medium mb-5">
                Select Quiz
            </h1>
            <div class="sm:flex border-b-2 border-[#6651E7] py-5 items-center">
                <div class="w-full sm:w-auto">
                    <img src="{{ asset('practice-quiz.png') }}" class="w-full sm:w-auto" alt="" srcset="">
                </div>
                <div class="w-full p-4">
                    <div class="sm:flex justify-between items-center">
                        <h1 class="text-[#102935] font-medium text-[24px] md:text-[28px] lg:text-[34px]">
                            Normal Quiz
                        </h1>
                        @if (count($course->normalQuizes->where('lesson_id', $lesson->id)) > 0)
                            <a href="{{ url('course/quiz/' . $slug . '/' . $lesson->slug . '/normal') }}"
                                class="text-[#102935] text-[14px] md:text-[16px] lg:text-[18px] underline font-medium">
                                Start Now
                            </a>
                        @else
                            <p class="text-[#102935] text-[14px] md:text-[16px] lg:text-[18px] underline font-medium">
                                No quiz avaiable
                            </p>
                        @endif
                    </div>
                    <p class="text-[16px] md:text-[18px] lg:text-[20px] text-[#102935]">
                        <!--Flashcards are learning tools that consist of a card with a question on one side and the answer on-->
                        <!--the other. They are commonly used for memorization and reinforcement of information, such as-->
                        <!--vocabulary, concepts, or facts. Flashcards can be physical cards or digital apps, making them-->
                        <!--versatile for various study methods.-->
                    </p>
                </div>
            </div>
            <div class="sm:flex border-b-2 border-[#6651E7] py-5 items-center">
                <div class="w-full sm:w-auto">
                    <img src="{{ asset('timer-quiz.png') }}" class="w-full sm:w-auto" alt="" srcset="">
                </div>
                <div class="w-full p-4">
                    <div class="sm:flex justify-between items-center">
                        <h1 class="text-[#102935] font-medium text-[24px] md:text-[28px] lg:text-[34px]">
                            Timer Quiz
                        </h1>
                        @if (count($course->timerQuizes->where('lesson_id', $lesson->id)) > 0)
                            @if ($course->quiz_duration == 0)
                                <p class="text-[#102935] text-[14px] md:text-[16px] lg:text-[18px] underline font-medium">
                                    Quiz duration is not set
                                </p>
                            @else
                                <a href="{{ url('course/quiz/' . $slug . '/' . $lesson->slug . '/time-restricted') }}"
                                    class="text-[#102935] text-[14px] md:text-[16px] lg:text-[18px] underline font-medium">
                                    Start Now
                                </a>
                            @endif
                        @else
                            <p class="text-[#102935] text-[14px] md:text-[16px] lg:text-[18px] underline font-medium">
                                No quiz avaiable
                            </p>
                        @endif
                    </div>
                    <p class="text-[16px] md:text-[18px] lg:text-[20px] text-[#102935]">
                        <!--Flashcards are learning tools that consist of a card with a question on one side and the answer on-->
                        <!--the other. They are commonly used for memorization and reinforcement of information, such as-->
                        <!--vocabulary, concepts, or facts. Flashcards can be physical cards or digital apps, making them-->
                        <!--versatile for various study methods.-->
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection
