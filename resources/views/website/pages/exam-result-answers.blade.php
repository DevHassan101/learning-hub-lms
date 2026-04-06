@extends('website.app')
@section('title', 'Exam Answers')
@section('main')
    <section class="courses h-[85vh] flex items-center justify-center">
        <h1 class="text-white text-[48px] font-bold">
            Exam Answers
        </h1>
    </section>

    <section class="min-h-[283px] py-10 px-5 lg:p-20 w-full mb-20">
        <h2 class="text-[22px] sm:text-[30px] md:text-[36px] text-[#102935] font-bold mb-3">
            Introduction to HTML and Web Structure Exam Resuls
        </h2>
        <h3 class="text-[25px] sm:text-[30px] md:text-[36px] text-[#102935] mb-3">
            Score: {{ $correctAnswers }} of {{ count($examQuestions) }}
        </h3>
        <h3 class="text-[25px] sm:text-[30px] md:text-[36px] text-[#102935] mb-3">
            {{ $percentage }}% Correct
        </h3>
        <hr class="border-[#4127E2] my-2">
        @foreach ($examQuestions as $index => $examQuestion)
            <div class="mt-2">
                <h3 class="text-[25px] sm:text-[30px] md:text-[36px] text-[#102935] mb-3">
                    Question {{ $index + 1 }}
                </h3>
                <p class="text-[20px] sm:text-[25px] md:text-[32px] text-[#102935] mb-3">
                    {{ $examQuestion->question }}
                </p>
                <div>
                    <div
                        class="text-[20px] sm:text-[25px] md:text-[32px] text-[#102935] {{ $examQuestion->answer == $examQuestion->userAnswer && $examQuestion->userAnswer == 'option_a' ? 'bg-[#CDEEDB]' : ($examQuestion->userAnswer == 'option_a' ? 'bg-[#F7D7DA]' : 'bg-[#D9D9D9]') }}  flex items-center py-2 px-5 mb-5">
                        <input type="radio" disabled class="mr-5 h-5 w-5 ring-0 focus:ring-0 focus:border-none"
                            {{ 'option_a' == $examQuestion->userAnswer ? 'checked' : '' }}>
                        <span class="flex justify-between items-center w-full">
                            <span>
                                {{ $examQuestion->option_a }}
                            </span>
                            <span class="text-[#B5B5B5] text-[16px] sm:text-[25px] md:text-[32px]">
                                {{ $examQuestion->userAnswer == 'option_a' ? 'Your Answer' : ($examQuestion->answer == 'option_a' ? 'Correct Answer' : '') }}
                            </span>
                        </span>
                    </div>
                    <div
                        class="text-[20px] sm:text-[25px] md:text-[32px] text-[#102935] {{ $examQuestion->answer == $examQuestion->userAnswer && $examQuestion->userAnswer == 'option_b' ? 'bg-[#CDEEDB]' : ($examQuestion->userAnswer == 'option_b' ? 'bg-[#F7D7DA]' : 'bg-[#D9D9D9]') }}  flex items-center py-2 px-5 mb-5">
                        <input type="radio" disabled class="mr-5 h-5 w-5 ring-0 focus:ring-0 focus:border-none"
                            {{ 'option_b' == $examQuestion->userAnswer ? 'checked' : '' }}>
                        <span class="flex justify-between items-center w-full">
                            <span>
                                {{ $examQuestion->option_b }}
                            </span>
                            <span class="text-[#B5B5B5] text-[16px] sm:text-[25px] md:text-[32px]">
                                {{ $examQuestion->userAnswer == 'option_b' ? 'Your Answer' : ($examQuestion->answer == 'option_b' ? 'Correct Answer' : '') }}
                            </span>
                        </span>
                    </div>
                    <div
                        class="text-[20px] sm:text-[25px] md:text-[32px] text-[#102935] {{ $examQuestion->answer == $examQuestion->userAnswer && $examQuestion->userAnswer == 'option_c' ? 'bg-[#CDEEDB]' : ($examQuestion->userAnswer == 'option_c' ? 'bg-[#F7D7DA]' : 'bg-[#D9D9D9]') }}   flex items-center py-2 px-5 mb-5">
                        <input type="radio" disabled class="mr-5 h-5 w-5 ring-0 focus:ring-0 focus:border-none"
                            {{ 'option_c' == $examQuestion->userAnswer ? 'checked' : '' }}>
                        <span class="flex justify-between items-center w-full">
                            <span>
                                {{ $examQuestion->option_c }}
                            </span>
                            <span class="text-[#B5B5B5] text-[16px] sm:text-[25px] md:text-[32px]">
                                {{ $examQuestion->userAnswer == 'option_c' ? 'Your Answer' : ($examQuestion->answer == 'option_c' ? 'Correct Answer' : '') }}
                            </span>
                        </span>
                    </div>
                    <div
                        class="text-[20px] sm:text-[25px] md:text-[32px] text-[#102935] {{ $examQuestion->answer == $examQuestion->userAnswer && $examQuestion->userAnswer == 'option_d' ? 'bg-[#CDEEDB]' : ($examQuestion->userAnswer == 'option_d' ? 'bg-[#F7D7DA]' : 'bg-[#D9D9D9]') }} flex items-center py-2 px-5 mb-5">
                        <input type="radio" disabled class="mr-5 h-5 w-5 ring-0 focus:ring-0 focus:border-none"
                            {{ 'option_d' == $examQuestion->userAnswer ? 'checked' : '' }}>
                        <span class="flex justify-between items-center w-full">
                            <span>
                                {{ $examQuestion->option_d }}
                            </span>
                            <span class="text-[#B5B5B5] text-[16px] sm:text-[25px] md:text-[32px]">
                                {{ $examQuestion->userAnswer == 'option_d' ? 'Your Answer' : ($examQuestion->answer == 'option_d' ? 'Correct Answer' : '') }}
                            </span>
                        </span>
                    </div>
                </div>
                @if ($examQuestion->description)
                    <button data-question="{{ $examQuestion->question }}"
                        data-description="{{ $examQuestion->description }}"
                        class="read-explanation text-[#102935] text-[20px] sm:text-[25px] md:text-[32px] font-bold underline">
                        Read Explanation</button>
                @endif
            </div>
        @endforeach

    </section>

    <section class="explanation-modal hidden" id="explanation-modal">
        <div class="modal-content border border-[#472EE3] py-14">
            <button class="close-btn text-[#472EE3] font-bold text-[22px]" onclick="cancelReadExplanation()">✕</button>
            <h2 class="text-[20px] font-bold text-[#102935]">Explanation</h2>
            <p class="text-[16px] font-medium text-[#102935] my-5" id="explanation-question">

            </p>
            <p class="text-[18px] text-[#102935]" id="explanation-description">

            </p>
        </div>
    </section>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".read-explanation").forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();

                    let question = this.dataset.question;
                    let description = this.dataset.description;

                    document.getElementById("explanation-modal").classList.remove("hidden");
                    document.getElementById("explanation-question").textContent = question;
                    document.getElementById("explanation-description").textContent = description;
                });
            });
        });


        // function readExplanation() {
        //     document.getElementById('explanation-modal').classList.remove('hidden');
        //     document.getElementById('').innerText = ''
        // }

        function cancelReadExplanation() {
            document.getElementById('explanation-modal').classList.add('hidden');
            // document.getElementById('').innerText = ''
        }
    </script>
@endsection
