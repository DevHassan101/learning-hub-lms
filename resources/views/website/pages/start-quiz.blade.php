@extends('website.app')
@section('title', 'Quiz')
@section('main')

<section class="min-h-screen py-10 px-5 lg:p-20 w-full bg-gray-50">

    <!-- Header Bar -->
    <div class="bg-white border-2 border-[#3bcbbe] rounded-2xl shadow-sm p-6 mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-[#102935]">Introduction to HTML and Web Structure Quiz</h1>
            <p class="text-sm text-gray-500 mt-1">Answer carefully. Progress is saved automatically.</p>
        </div>

        @if ($userQuiz->type == 'time restricted')
            <div class="flex items-center gap-3 bg-red-50 px-5 py-2 rounded-xl">
                <span class="text-sm font-semibold text-red-600">Time Remaining</span>
                <span id="counterDisplay" class="text-lg font-bold text-red-700"></span>
            </div>
        @endif
    </div>

    <!-- Progress Bar -->
    <div class="w-full mb-6">
        <div class="flex justify-between text-sm text-gray-600 mb-2">
            <span>Question <span id="question-count">1</span> of {{ count($quizQuestions) }}</span>
            <span id="progressPercent">0%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
            <div id="progressBar" class="h-2 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-full transition-all" style="width:0%"></div>
        </div>
    </div>

    <form action="{{ route('submit-quiz', ['quizId' => $userQuiz->user_quiz_id]) }}" id="quizForm" method="post" class="bg-white rounded-2xl border-2 border-[#3bcbbe] shadow-sm p-10">
        @csrf

        @foreach ($quizQuestions as $index => $question)
            <div class="question-card hidden " data-index="{{ $index }}">
                <h2 class="text-xl md:text-2xl font-semibold text-[#102935] mb-6">{{ $question->question }}</h2>

                <div class="space-y-4">
                    @foreach(['a','b','c','d'] as $opt)
                        @php $field = 'option_'.$opt; @endphp
                        <label class="flex items-center gap-4 p-4 border rounded-xl cursor-pointer border-[#3bcbbe] hover:border-[#13a599] transition">
                            <input type="radio" name="answer[{{ $question->id }}]" value="option_{{ $opt }}" class="h-5 w-5">
                            <span class="text-lg text-[#102935]">{{ $question->$field }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <input type="hidden" name="time_spent" id="timeSpent">

        <!-- Navigation Bar -->
        <div class="flex justify-between items-center mt-12 border-t pt-6">
            <button id="prevBtn" type="button"
                class="hidden px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-semibold">Previous</button>

            <div class="flex gap-4">
                <button id="nextBtn" type="button"
                    class="px-6 py-3 rounded-xl bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold hover:opacity-90">
                    Next
                </button>

                <button id="submitBtn" type="submit"
                    class="hidden px-8 py-3 rounded-xl bg-[#3bcbbe] text-white font-semibold hover:bg-[#1da99d]">
                    Submit Quiz
                </button>
            </div>
        </div>
    </form>
</section>

@push('script')
<script>
let cards = document.querySelectorAll('.question-card');
let currentIndex = 0;
let total = cards.length - 1;

function showQuestion(index){
    cards.forEach((c,i)=>c.classList.toggle('hidden', i!==index));
    document.getElementById('question-count').innerText = index + 1;

    let percent = Math.round(((index+1) / (total+1)) * 100);
    document.getElementById('progressBar').style.width = percent + '%';
    document.getElementById('progressPercent').innerText = percent + '%';

    document.getElementById('prevBtn').classList.toggle('hidden', index === 0);
    document.getElementById('nextBtn').classList.toggle('hidden', index === total);
    document.getElementById('submitBtn').classList.toggle('hidden', index !== total);
}

document.getElementById('prevBtn').onclick = () => showQuestion(--currentIndex);
document.getElementById('nextBtn').onclick = () => showQuestion(++currentIndex);

showQuestion(currentIndex);
</script>
@endpush

@endsection