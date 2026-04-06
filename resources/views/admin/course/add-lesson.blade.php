@section('title', 'Add Lesson')
<x-app-layout>
    <div class="w-[80%] mx-auto px-4 py-6">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('course.show', ['course' => $course]) }}"
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909"
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors" stroke-width="1.63636"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Add New Lesson</h1>
                <p class="text-sm text-gray-600 mt-0.5">Create a new lesson for your course</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">Lesson Details</h2>
                <p class="text-sm text-gray-600 mt-1">Fill in the information below</p>
            </div>

            <div class="p-6">
                <form action="{{ route('course.lesson.store', ['course' => $course]) }}" method="post"
                    enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Title (Required)
                        </label>
                        <textarea name="title" cols="30" rows="3" placeholder="Enter lesson title"
                            class="resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('title') }}</textarea>
                        @error('title')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Description
                        </label>
                        <textarea name="description" cols="30" rows="6" placeholder="Enter lesson description"
                            class="resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Video Upload -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Video File
                        </label>
                        <div id="video-drop-area"
                            class="border-2 border-dashed border-[#3bcbbe]/40 rounded-xl bg-gray-50 hover:bg-[#3bcbbe]/5 transition-all cursor-pointer">
                            <input type="file" id="video-input-file" name="video" hidden accept=".mp4" />
                            <div class="p-8 text-center">
                                <div class="flex justify-center mb-1">
                                    <iconify-icon icon="ph:video" width="45" height="45"  style="color: #3bcbbe"></iconify-icon>
                                </div>
                                <button type="button" id="video-browse"
                                    class="text-sm font-semibold text-[#3bcbbe] hover:text-[#26beb1]">
                                    Click to upload video or drag and drop
                                </button>
                                <p class="text-xs text-gray-500 mt-2">MP4 format only</p>
                            </div>
                            <ul id="video-file-list" class="px-4 pb-4 text-sm text-gray-700"></ul>
                        </div>
                        @error('video')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- OR Divider -->
                    <div class="flex items-center gap-4">
                        <div class="flex-1 border-t border-gray-300"></div>
                        <span class="text-sm font-semibold text-gray-500">OR</span>
                        <div class="flex-1 border-t border-gray-300"></div>
                    </div>

                    <!-- External Link -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            External Video Link
                        </label>
                        <textarea name="external_link" id="external-link" cols="30" rows="2"
                            placeholder="Enter external video link (YouTube, Vimeo, etc.)"
                            class="resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('external_link') }}</textarea>
                        @error('external_link')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Thumbnail and Attachment in Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Thumbnail -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Thumbnail
                            </label>
                            <p class="text-xs text-gray-600 mb-3">Set a thumbnail that stands out and draws viewer's
                                attention. <strong>Allowed:</strong> JPG, JPEG, PNG</p>
                            <div id="thumbnail-drop-area"
                                class="border-2 border-dashed border-[#3bcbbe]/40 rounded-xl bg-gray-50 hover:bg-[#3bcbbe]/5 transition-all cursor-pointer">
                                <input type="file" id="thumbnail-input-file" name="thumbnail" hidden
                                    accept="image/*" />
                                <div class="p-6 text-center">
                                    <div class="flex justify-center mb-2">
                                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <button type="button" id="thumbnail-browse"
                                        class="text-sm font-semibold text-[#3bcbbe] hover:text-[#26beb1]">
                                        Upload Image
                                    </button>
                                </div>
                                <ul id="thumbnail-file-list" class="px-4 pb-4 text-sm text-gray-700"></ul>
                            </div>
                            @error('thumbnail')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Attachment -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                Attachments
                            </label>
                            <p class="text-xs text-gray-600 mb-7">Attach your external files. <strong>Allowed:</strong>
                                PDF</p>
                            <div id="attachment-drop-area"
                                class="border-2 border-dashed border-[#3bcbbe]/40 rounded-xl bg-gray-50 hover:bg-[#3bcbbe]/5 transition-all cursor-pointer">
                                <input type="file" id="attachment-input-file" name="attachment" hidden accept=".pdf" />
                                <div class="p-6 text-center">
                                    <div class="flex justify-center mb-2">
                                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                    </div>
                                    <button type="button" id="attachment-browse"
                                        class="text-sm font-semibold text-[#3bcbbe] hover:text-[#26beb1]">
                                        Upload File
                                    </button>
                                </div>
                                <ul id="attachment-file-list" class="px-4 pb-4 text-sm text-gray-700"></ul>
                            </div>
                            @error('attachment')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Divider & Buttons -->
                    <div class="border-t border-gray-200 pt-5 mt-6">
                        <div class="flex gap-3">
                            <a href="{{ route('course.show', ['course' => $course]) }}"
                                class="flex-1 py-3.5 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-sm font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-3.5 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Save Lesson
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="fixed inset-0 z-50 bg-black/40 flex justify-center items-center hidden" id="image-type-modal">
        <div class="bg-white rounded-2xl p-6 max-w-md mx-4 text-center shadow-2xl">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
            <p class="text-red-600 text-lg font-bold mb-2" id="heading"></p>
            <span class="text-gray-600 text-sm" id="text"></span>
            <button onclick="closeImageTypeModal()"
                class="mt-6 py-3 px-8 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200">
                Close
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
                dropArea.classList.add('border-[#3bcbbe]', 'bg-[#3bcbbe]/10');
            });

            dropArea.addEventListener("dragleave", e => {
                e.preventDefault();
                dropArea.classList.remove('border-[#3bcbbe]', 'bg-[#3bcbbe]/10');
            });

            dropArea.addEventListener("drop", e => {
                e.preventDefault();
                dropArea.classList.remove('border-[#3bcbbe]', 'bg-[#3bcbbe]/10');
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
                    document.getElementById('text').innerHTML =
                        `<b>Allowed Types:</b> ${allowedTypes.join(", ").toUpperCase()}`;
                    return;
                }

                filteredFiles.forEach(file => dataTransfer.items.add(file));
                inputFile.files = dataTransfer.files;

                fileList.innerHTML = filteredFiles.map(file =>
                    `<li class="flex items-center gap-2 text-[#3bcbbe] py-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>${file.name}</li>`
                ).join('');
                if (inputId == 'video-input-file') {
                    externalLink.value = '';
                }
            }
        }

        setupFileUpload("video-drop-area", "video-input-file", "video-file-list", "video-browse", ["mp4"]);
        setupFileUpload("thumbnail-drop-area", "thumbnail-input-file", "thumbnail-file-list", "thumbnail-browse", [
            "jpg",
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