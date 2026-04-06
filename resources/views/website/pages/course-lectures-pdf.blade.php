@extends('layouts.app2')
@section('main')
    <style>
        h2,
        p {
            margin-bottom: 20px;
            font-size: 30px
        }

        p {
            font-weight: 400
        }
        #pdf-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        canvas {
            display: block;
            margin: 0;
            padding: 0;
            height: auto !important;
            /*border-bottom: 2px solid black !important;*/
        }

    </style>
    <section class="py-10 px-5 lg:p-20 w-full">
        <a href="{{ url('courses/' . $lecture->course->slug) }}" class="float-right text-[#6451E7] text-[36px]">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_3096_1352)">
                    <path d="M31 3L7 27M7 3L31 27" stroke="#6451E7" stroke-width="5.53846" stroke-linecap="round"
                        stroke-linejoin="round" shape-rendering="crispEdges" />
                </g>
                <defs>
                    <filter id="filter0_d_3096_1352" x="0.230469" y="0.230713" width="37.5391" height="37.5386"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset dy="4" />
                        <feGaussianBlur stdDeviation="2" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3096_1352" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3096_1352" result="shape" />
                    </filter>
                </defs>
            </svg>

        </a>
        <h2 class="text-[36px] font-bold text-[#102935] capitalize">
            {{ $lecture->title }}
        </h2>
        <div id="pdf-container"></div>
    </section>
    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    @endpush

    @push('script')
    <script>
        var url = '{{ asset($lecture->attachments) }}';

        pdfjsLib.getDocument(url).promise.then(function (pdf) {
    var totalPages = pdf.numPages;
    var container = document.getElementById('pdf-container');

    for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
        pdf.getPage(pageNumber).then(function (page) {
            // Get screen width and adjust scale dynamically
            var viewportWidth = window.innerWidth * 0.9; // 90% of screen width
            var originalViewport = page.getViewport({ scale: 1 }); // Get original size
            var scale = viewportWidth / originalViewport.width; // Scale to fit screen
            var viewport = page.getViewport({ scale: scale });

            // Create a wrapper div for each page
            var pageWrapper = document.createElement('div');
            pageWrapper.style.position = 'relative';
            pageWrapper.style.display = 'block';
            pageWrapper.classList.add('border', 'border-black', 'mb-2');

            // Page number text
            var pageText = document.createElement('p');
            pageText.classList.add('text-center', 'font-bold', 'mb-1','text-sm');
            pageText.innerText = "Page " + pageNumber;

            var canvas = document.createElement('canvas');
            var context = canvas.getContext('2d');

            // Set canvas size dynamically for responsiveness
            var outputScale = window.devicePixelRatio || 1; // Adjust for high DPI screens
            canvas.width = Math.floor(viewport.width * outputScale);
            canvas.height = Math.floor(viewport.height * outputScale);
            canvas.style.width = Math.floor(viewport.width) + "px";
            canvas.style.height = Math.floor(viewport.height) + "px";

            context.scale(outputScale, outputScale); // Scale the context

            // Append elements properly
            pageWrapper.appendChild(canvas);
            pageWrapper.appendChild(pageText);
            container.appendChild(pageWrapper);

            // Render PDF page to canvas
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            page.render(renderContext);
        });
    }
});

    </script>


        <script>
            setTimeout(() => {
                $.ajax({
                    type: "POST",
                    url: "{{ route('user-lesson') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        lessonId: {{ $lecture->id }},
                        userCourseId: {{ $userCourse->id }}
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }, 200);
        </script>
    @endpush
@endsection
