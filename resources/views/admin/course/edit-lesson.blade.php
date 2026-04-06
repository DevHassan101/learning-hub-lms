@section('title', 'Edit Lesson')
<x-app-layout>

    <div class="bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl min-h-full">
        <div class="p-6 border-b border-gray-200 overflow-x-auto relative">
            <a href="{{ route('course.show', ['course' => $lesson->course_id]) }}" class="sm:absolute top-[40px]">
                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" stroke="#6D51E7"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </a>
            <div class="w-full flex justify-center">
                <div class="w-full max-w-[450px]">
                    <h1 class="text-[30px] font-bold mb-5">
                        Details
                    </h1>
                    <form action="{{ route('course.lesson.update', ['lesson' => $lesson]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <textarea name="title" id="" cols="30" rows="3" placeholder="Title (required)"
                                class="border border-[#482EE3] bg-transparent rounded block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ $lesson->title }}</textarea>
                            @error('title')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="description" id="" cols="30" rows="6" placeholder="Description"
                                class="border border-[#482EE3] bg-transparent rounded block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ $lesson->description }}</textarea>
                            @error('description')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div id="video-drop-area" class="border border-[#4229E2] rounded mt-3 text-center">
                            <input type="file" id="video-input-file" name="video" hidden accept=".mp4" />
                            <div class="p-5 mt-5">
                                <div class="flex justify-center mb-3">
                                    <svg width="45" height="45" viewBox="0 0 54 54" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.0235 54H37.3837V26.8531H53.8076L27.2036 0.249062L0.599609 26.8531H17.0235V54Z"
                                            fill="#6D51E7" />
                                    </svg>

                                </div>
                                <button type="button" id="video-browse">Save A File To Upload</button>
                            </div>
                            <ul id="video-file-list" class="mt-4 text-sm text-left"></ul>
                        </div>
                        @error('video')
                            <span class="text-red-500">
                                {{ $message }}
                            </span>
                        @enderror

                        <h1 class="text-center mt-3">
                            OR
                        </h1>

                        <div class="my-3">
                            <textarea name="external_link" id="external-link" cols="30" rows="2" placeholder="External File Link"
                                class="border border-[#482EE3] bg-transparent rounded block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ $lesson->external_link }}</textarea>
                            @error('external_link')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mt-10 sm:flex">
                            <div class="mb-3">
                                <label class="text-[#102935] font-medium text-[20px]">Thumbnail</label>
                                <span class="text-[14px] block h-[50px]">
                                    Set a thumbnail that stands out <br> and draws viewer’s attention
                                </span>
                                <div id="thumbnail-drop-area"
                                    class="mt-3 text-center">
                                    <input type="file" id="thumbnail-input-file" name="thumbnail" hidden
                                        accept="image/*" />
                                    <div
                                        class="bg-transparent border border-dashed border-[#4229E2] text-center p-5 max-w-[200px]">
                                        <div class="flex justify-center">
                                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M35 17.5C35 16.5335 34.2165 15.75 33.25 15.75C32.2835 15.75 31.5 16.5335 31.5 17.5H35ZM17.5 3.5C18.4665 3.5 19.25 2.7165 19.25 1.75C19.25 0.783501 18.4665 0 17.5 0V3.5ZM30.625 31.5H4.375V35H30.625V31.5ZM3.5 30.625V4.375H0V30.625H3.5ZM31.5 17.5V30.625H35V17.5H31.5ZM4.375 3.5H17.5V0H4.375V3.5ZM4.375 31.5C3.89176 31.5 3.5 31.1083 3.5 30.625H0C0 33.0412 1.95875 35 4.375 35V31.5ZM30.625 35C33.0412 35 35 33.0412 35 30.625H31.5C31.5 31.1083 31.1083 31.5 30.625 31.5V35ZM3.5 4.375C3.5 3.89176 3.89175 3.5 4.375 3.5V0C1.95876 0 0 1.95875 0 4.375H3.5Z"
                                                    fill="#4229E2" />
                                                <path
                                                    d="M1.75 27.1246L11.1065 18.5479C11.759 17.9496 12.7557 17.933 13.4278 18.5092L24.5 27.9996"
                                                    stroke="#4229E2" stroke-width="3.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M21 23.6249L25.1768 19.4481C25.7925 18.8323 26.7675 18.763 27.4642 19.2856L33.25 23.6249"
                                                    stroke="#4229E2" stroke-width="3.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M28.875 12.25V1.75" stroke="#4229E2" stroke-width="3.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M24.5 6.125L28.875 1.75L33.25 6.125" stroke="#4229E2"
                                                    stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <button type="button" id="thumbnail-browse">Upload File</button>
                                    </div>
                                    <ul id="thumbnail-file-list" class="mt-4 text-sm text-left"></ul>
                                </div>
                                @error('thumbnail')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 sm:ml-5">
                                <label class="text-[#102935] font-medium text-[20px]">Attachments</label>
                                <span class="text-[14px] block h-[50px]">Attach your external files</span>
                                <div id="attachment-drop-area"
                                    class="mt-3 text-center">
                                    <input type="file" id="attachment-input-file" name="attachment" hidden
                                        accept=".pdf" />
                                    <div
                                        class="bg-transparent border border-dashed border-[#4229E2] text-center p-5 w-[200px]">
                                        <div class="flex justify-center">
                                            <svg width="35" height="35" viewBox="0 0 38 38" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.25988 19C1.17262 16.9127 -2.1993e-08 14.0818 0 11.1299C2.1993e-08 8.1781 1.17262 5.34715 3.25988 3.25988C5.34715 1.17262 8.1781 2.1993e-08 11.1299 0C14.0818 -2.1993e-08 16.9127 1.17262 19 3.25988L34.7401 19C35.7736 20.0335 36.5935 21.2605 37.1528 22.6108C37.7121 23.9612 38 25.4085 38 26.8701C38 28.3317 37.7121 29.779 37.1528 31.1293C36.5935 32.4796 35.7736 33.7066 34.7401 34.7401C33.7066 35.7736 32.4796 36.5935 31.1293 37.1528C29.779 37.7121 28.3317 38 26.8701 38C25.4085 38 23.9612 37.7121 22.6108 37.1528C21.2605 36.5935 20.0335 35.7736 19 34.7401L12.8184 28.5554C12.2868 28.0421 11.8628 27.4282 11.571 26.7493C11.2792 26.0705 11.1256 25.3403 11.119 24.6014C11.1124 23.8626 11.2531 23.1298 11.5327 22.4459C11.8124 21.7619 12.2255 21.1405 12.7479 20.6179C13.2702 20.0954 13.8915 19.682 14.5753 19.4021C15.2591 19.1222 15.9918 18.9812 16.7307 18.9875C17.4696 18.9938 18.1998 19.1471 18.8788 19.4386C19.5578 19.7301 20.1719 20.1539 20.6853 20.6853L27.9957 27.9925L25.7444 30.2438L18.4372 22.9334C18.2171 22.7058 17.9538 22.5242 17.6628 22.3994C17.3718 22.2745 17.0588 22.2089 16.7421 22.2063C16.4255 22.2037 16.1115 22.2642 15.8184 22.3842C15.5254 22.5043 15.2592 22.6815 15.0354 22.9055C14.8116 23.1295 14.6346 23.3959 14.5149 23.689C14.3951 23.9822 14.3349 24.2962 14.3378 24.6129C14.3407 24.9296 14.4066 25.2425 14.5318 25.5334C14.6569 25.8243 14.8387 26.0873 15.0666 26.3072L21.2481 32.492C22.7392 33.983 24.7614 34.8207 26.8701 34.8207C27.9141 34.8207 28.948 34.615 29.9126 34.2155C30.8772 33.8159 31.7537 33.2303 32.492 32.492C33.2303 31.7537 33.8159 30.8772 34.2155 29.9126C34.615 28.948 34.8207 27.9141 34.8207 26.8701C34.8207 25.826 34.615 24.7921 34.2155 23.8275C33.8159 22.8629 33.2303 21.9864 32.492 21.2481L16.7519 5.50802C16.0136 4.76974 15.1371 4.1841 14.1725 3.78454C13.2079 3.38499 12.174 3.17934 11.1299 3.17934C10.0859 3.17934 9.05199 3.38499 8.08738 3.78454C7.12277 4.1841 6.2463 4.76974 5.50802 5.50802C4.76974 6.2463 4.1841 7.12277 3.78454 8.08738C3.38499 9.05199 3.17934 10.0859 3.17934 11.1299C3.17934 12.174 3.38499 13.2079 3.78454 14.1725C4.1841 15.1371 4.76974 16.0136 5.50802 16.7519L6.63368 17.8743L4.38554 20.1257L3.25988 19Z"
                                                    fill="#6D51E7" />
                                            </svg>
                                        </div>
                                        <button type="button" id="attachment-browse">Upload File</button>
                                    </div>
                                    <ul id="attachment-file-list" class="mt-4 text-sm text-left"></ul>
                                </div>
                                @error('attachment')
                                    <span class="text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button
                            class="sm:mt-5 py-2 px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="absolute left-0 z-[100] top-0 bg-[#00000038] h-screen w-full flex justify-center items-center hidden"
        id="image-type-modal">
        <div class="w-[400px] bg-white rounded-md p-5 text-center">
            <center>
                <svg fill="#6956E7" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px"
                    viewBox="0 0 55.704 55.703" xml:space="preserve">
                    <g>
                        <path
                            d="M27.852,0C19.905,0,12.743,3.363,7.664,8.72C7.628,8.751,7.583,8.762,7.549,8.796C7.495,8.85,7.476,8.922,7.426,8.98
      C2.833,13.949,0,20.568,0,27.852c0,15.357,12.493,27.851,27.851,27.851c15.356,0,27.851-12.494,27.851-27.851
      C55.703,12.494,43.208,0,27.852,0z M4.489,27.851c0-5.315,1.805-10.207,4.806-14.138l32.691,32.694
      c-3.93,3.001-8.819,4.806-14.135,4.806C14.969,51.213,4.489,40.732,4.489,27.851z M45.282,43.352l-32.933-32.93
      c4.13-3.678,9.551-5.934,15.503-5.934c12.881,0,23.362,10.48,23.362,23.363C51.213,33.803,48.958,39.225,45.282,43.352z" />
                    </g>
                </svg>
            </center>
            <p class="text-red-500 text-[20px] text-bold mt-4" id="heading"></p>
            <span id="text"></span>
            <br>
            <button onclick="closeImageTypeModal()"
                class="py-2 px-7 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500 mt-3">
                Cancel
            </button>
        </div>
    </div>



    <script>
        function setupFileUpload(areaId, inputId, listId, browseBtnId, allowedTypes) {
            const dropArea = document.getElementById(areaId);
            const inputFile = document.getElementById(inputId);
            const fileList = document.getElementById(listId);
            const browseBtn = document.getElementById(browseBtnId);

            dropArea.addEventListener("dragover", e => {
                e.preventDefault();
                e.dataTransfer.dropEffect = "copy";
            });

            dropArea.addEventListener("drop", e => {
                e.preventDefault();
                handleFiles(e.dataTransfer.files);
            });

            browseBtn.addEventListener("click", () => inputFile.click());

            inputFile.addEventListener("change", e => {
                if (e.target.files.length) handleFiles(e.target.files);
            });

            function handleFiles(files) {
                const dataTransfer = new DataTransfer();
                const filteredFiles = Array.from(files).filter(file =>
                    allowedTypes.includes(file.name.split('.').pop().toLowerCase())
                );

                if (!filteredFiles.length) {
                    document.getElementById('image-type-modal').classList.remove('hidden');
                    document.getElementById('heading').innerText = "Invalid File Type";
                    document.getElementById('text').innerHTML = `<b>Allowed Types:</b> ${allowedTypes.join(", ")}`;
                    return;
                }

                filteredFiles.forEach(file => dataTransfer.items.add(file));
                inputFile.files = dataTransfer.files;

                fileList.innerHTML = filteredFiles.map(file => `<li>${file.name}</li>`).join('');
            }
        }

        setupFileUpload("video-drop-area", "video-input-file", "video-file-list", "video-browse", ["mp4"]);
        setupFileUpload("thumbnail-drop-area", "thumbnail-input-file", "thumbnail-file-list", "thumbnail-browse", ["jpg",
            "jpeg", "png"
        ]);
        setupFileUpload("attachment-drop-area", "attachment-input-file", "attachment-file-list", "attachment-browse", [
            "pdf"
        ]);

        function closeImageTypeModal() {
            document.getElementById('image-type-modal').classList.add('hidden');
        }

        
        const videoInput = document.getElementById('video-input-file');
        const externalLink = document.getElementById('external-link');
        const videoFileList = document.getElementById('video-file-list');
        videoInput.addEventListener('change', () => {
            if (videoInput.files.length > 0) {
                externalLink.value = '';
            }
        });

        externalLink.addEventListener('input', () => {
            if (externalLink.value.trim() !== '') {
                videoInput.value = '';
                videoFileList.innerHTML = '';
            }
        });
    </script>

</x-app-layout>
