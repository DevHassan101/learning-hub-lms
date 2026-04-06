@section('title', 'Edit Course')
<x-app-layout>

    <div class="w-[80%] mx-auto">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('course.index') }}" 
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Edit Course</h1>
                <p class="text-md font-medium text-gray-600 mt-0.5">Update course information</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Course Details</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Update the details below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('course.update', ['course' => $course]) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Category -->
                    <div>
                        <label for="category_id" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h3m13 0h-3m-5 10H9m12 0h-3M7 7a3 3 0 1 1-6 0a3 3 0 0 1 6 0m16 10a3 3 0 1 1-6 0a3 3 0 0 1 6 0m-10-5a3 3 0 1 1-6 0a3 3 0 0 1 6 0"/></svg>
                            Category
                        </label>
                        <select name="category_id" id="category_id"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md text-gray-700 shadow-sm hover:border-[#3bcbbe]/50">
                            <option value="">Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($course->category_id == $category->id)>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h10M4 17h6"/></svg>
                            Title
                        </label>
                        <textarea name="title" id="title" rows="3" placeholder="Enter course title"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ $course->title }}</textarea>
                        @error('title')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12M8 12h12M8 17h12M3 7h.01M3 12h.01M3 17h.01"/></svg>
                            Description
                        </label>
                        <textarea name="description" id="description" rows="6" placeholder="Enter course description"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ $course->description }}</textarea>
                        @error('description')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Thumbnail Upload -->
                    <div>
                        <label class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5m-1-1l2-2c.928-.893 2.072-.893 3 0l3 3M3 21h18M14 8h.01M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                            Thumbnail
                        </label>
                        <p class="text-sm text-gray-600 mb-3">Set a thumbnail that stands out and draws viewer's attention</p>

                        <div id="drop-area" class="rounded-xl">
                            <input type="file" id="input-file" name="file" hidden accept=".png, .jpg, .jpeg" />
                            <div class="bg-gray-50 border-2 border-dashed border-gray-300 hover:border-[#3bcbbe] rounded-xl text-center p-8 transition-all duration-200 cursor-pointer">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <button type="button" id="browse" class="py-2.5 px-6 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-lg text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200">
                                    Upload File
                                </button>
                                <p class="text-xs text-gray-500 mt-3">PNG, JPG, JPEG up to 5MB</p>
                            </div>
                            @error('file')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                            <ul id="file-list" class="mt-4 text-sm text-gray-700"></ul>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex gap-3">
                            <a href="{{ route('course.index') }}"
                                class="flex-1 py-4 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-md font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Update Course
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="fixed inset-0 z-50 bg-black/40 flex justify-center items-center hidden" id="image-type-modal">
        <div class="w-[400px] bg-white rounded-2xl p-6 text-center shadow-xl">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <p class="text-red-600 text-xl font-bold mb-2" id="heading"></p>
            <span class="text-gray-600 text-sm" id="text"></span>
            <button onclick="closeImageTypeModal()"
                class="mt-6 py-3 px-8 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200">
                Close
            </button>
        </div>
    </div>

    <script>
        const dropArea = document.getElementById("drop-area");
        const inputFile = document.getElementById("input-file");
        const fileList = document.getElementById("file-list");
        const browseBtn = document.getElementById("browse");
        const validFileTypes = [".png", ".jpg", ".jpeg"];

        dropArea.addEventListener("dragover", e => {
            e.preventDefault();
            e.dataTransfer.dropEffect = "copy";
        });
        dropArea.addEventListener("drop", e => {
            e.preventDefault();
            handleFiles(e.dataTransfer.files);
        });

        browseBtn.addEventListener("click", () => {
            inputFile.click();
        });

        inputFile.addEventListener("change", e => {
            if (e.target.files.length === 0) {
                fileList.innerHTML = "";
            } else {
                handleFiles(e.target.files);
            }
        });

        function handleFiles(f) {
            const v = Array.from(f).filter(i => {
                const fileExtension = i.name.split('.').pop().toLowerCase();
                return validFileTypes.includes(`.${fileExtension}`);
            });

            if (!v.length) {
                document.getElementById('image-type-modal').classList.remove('hidden');
                document.getElementById('heading').innerText = "Invalid File Types";
                document.getElementById('text').innerHTML =
                    `<b>Allowed Types: </b><span id="allowed-types">${validFileTypes.join(", ")}</span>`;
                return;
            }

            if (f.length === 0) {
                document.getElementById('file-list').innerHTML = "";
            } else {
                const d = new DataTransfer();
                v.forEach(i => d.items.add(i));
                inputFile.files = d.files;
                updateFileListDisplay(inputFile.files);
            }
        }

        function updateFileListDisplay(f) {
            fileList.innerHTML = "";
            Array.from(f).forEach(i => {
                const li = document.createElement("li");
                li.textContent = i.name;
                li.className = "flex items-center gap-2 text-green-600 font-medium";
                li.innerHTML = `
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    ${i.name}
                `;
                fileList.appendChild(li);
            });
        }

        function closeImageTypeModal() {
            document.getElementById('image-type-modal').classList.add('hidden');
        }
    </script>
</x-app-layout>