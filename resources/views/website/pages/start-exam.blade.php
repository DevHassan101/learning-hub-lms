@extends('website.app')
@section('title', 'Exam')
@section('main')

<section class="min-h-screen py-10 px-5 lg:p-20 w-full bg-gray-50">

    <!-- Header Bar -->
    <div class="bg-white border-2 border-[#3bcbbe] rounded-2xl shadow-sm p-6 mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-[#102935]">Introduction to HTML and Web Structure Exam</h1>
            <p class="text-sm text-gray-500 mt-1">Final assessment · Do not refresh or leave the page</p>
        </div>
    </div>

    <!-- Progress Section -->
    <div class="w-full mb-6">
        <div class="flex justify-between text-sm text-gray-600 mb-2">
            <span>Question <span id="question-count">1</span> of {{ count($examQuestions) }}</span>
            <span id="progressPercent">0%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
            <div id="progressBar" class="h-2 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-full transition-all" style="width:0%"></div>
        </div>
    </div>

    <!-- Exam Card -->
    <form action="{{ route('submit-exam', ['examId' => $examId]) }}" id="examForm" method="post"
        class="bg-white border-2 border-[#3bcbbe] rounded-2xl shadow-sm p-10">
        @csrf

        @foreach ($examQuestions as $index => $question)
            <div class="question-card hidden" data-index="{{ $index }}">
                <h2 class="text-xl md:text-2xl font-semibold text-[#102935] mb-8">
                    {{ $question->question }}
                </h2>

                <div class="space-y-4">
                    @foreach(['a','b','c','d'] as $opt)
                        @php $field = 'option_'.$opt; @endphp
                        <label
                            class="flex items-center gap-4 p-4 border rounded-xl cursor-pointer border-[#3bcbbe] hover:border-[#13a599] transition">
                            <input type="radio" name="answer[{{ $question->id }}]" value="option_{{ $opt }}"
                                class="h-5 w-5">
                            <span class="text-lg text-[#102935]">{{ $question->$field }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Navigation Footer -->
        <div class="flex justify-between items-center mt-12 border-t pt-6">
            <button id="prevBtn" type="button"
                class="hidden px-8 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-semibold">Previous</button>

            <div class="flex gap-4">
                <button id="nextBtn" type="button"
                    class="px-8 py-3 rounded-xl bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold hover:opacity-90">
                    Next
                </button>

                <button id="submitBtn" type="submit"
                    class="hidden px-8 py-3 rounded-xl bg-[#3bcbbe] text-white font-semibold hover:bg-[#1da99d]">
                    Submit Exam
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
let form = document.getElementById('examForm');
let isFormSubmitted = false;

function showQuestion(index) {
    cards.forEach((c, i) => c.classList.toggle('hidden', i !== index));
    document.getElementById('question-count').innerText = index + 1;

    let percent = Math.round(((index + 1) / (total + 1)) * 100);
    document.getElementById('progressBar').style.width = percent + '%';
    document.getElementById('progressPercent').innerText = percent + '%';

    document.getElementById('prevBtn').classList.toggle('hidden', index === 0);
    document.getElementById('nextBtn').classList.toggle('hidden', index === total);
    document.getElementById('submitBtn').classList.toggle('hidden', index !== total);
}

// Navigation

document.getElementById('prevBtn').onclick = () => showQuestion(--currentIndex);
document.getElementById('nextBtn').onclick = () => showQuestion(++currentIndex);

// Initial load
showQuestion(currentIndex);

// Safety: auto-submit if leaving
window.addEventListener("beforeunload", function(e) {
    if (!isFormSubmitted) {
        e.preventDefault();
        e.returnValue = "";
        form.submit();
        isFormSubmitted = true;
    }
});

form.addEventListener("submit", function() {
    isFormSubmitted = true;
});
</script>
@endpush

@endsection