@section('title', 'Add Program')
<x-app-layout>

    <div class="w-[80%] mx-auto">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('program.index') }}"
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909"
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors" stroke-width="1.63636"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Add New Department</h1>
                <p class="text-md font-medium text-gray-600 mt-0.5">Create a new department</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Department Details</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Fill in the details below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('program.store') }}" method="post" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label for="title" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24">
                                <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 7h16M4 12h10M4 17h6" />
                            </svg>
                            Title
                        </label>
                        <input type="text" id="title" placeholder="Enter program title" name="title"
                            value="{{ old('title') }}"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">
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

                    <!-- Banner Upload -->
                    <div>
                        <label class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24">
                                <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5m-1-1l2-2c.928-.893 2.072-.893 3 0l3 3M3 21h18M14 8h.01M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>
                            Banner Image
                        </label>

                        <div id="banner-drop-area" class="rounded-xl">
                            <input type="file" id="banner-input-file" name="banner" hidden accept="image/*" />
                            <div
                                class="bg-gray-50 border-2 border-dashed border-gray-300 hover:border-[#3bcbbe] rounded-xl text-center p-8 transition-all duration-200 cursor-pointer">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <button type="button" id="banner-browse"
                                    class="py-2.5 px-6 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-lg text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200">
                                    Upload Banner
                                </button>
                                <p class="text-xs text-gray-500 mt-3">JPG, PNG up to 5MB</p>
                            </div>
                            @error('banner')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                            <ul id="banner-file-list" class="mt-4 text-sm text-gray-700"></ul>
                        </div>
                    </div>

                    <!-- Pricing Table -->
                    <div>
                        <div class="mb-4">
                            <h3 class="text-md font-semibold text-gray-700 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                </svg>
                                Subscription Pricing
                            </h3>
                            <p class="text-sm text-red-600 mt-2 flex items-start gap-2">
                                <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span><b>Note:</b> Set the price to $0 to exclude this plan.</span>
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-[#3bcbbe]/10">
                                    <tr class="border-b border-[#3bcbbe]/20">
                                        <th class="text-sm font-semibold text-gray-700 text-left px-6 py-4">
                                            Subscription</th>
                                        <th class="text-sm font-semibold text-gray-700 text-center px-6 py-4">Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 hover:bg-white/50 transition-colors">
                                        <td class="text-md text-gray-800 font-medium text-left px-6 py-4">Monthly</td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center">
                                                <input type="text" name="monthly_price"
                                                    class="price-input text-center bg-white border border-gray-300 rounded-lg w-[100px] h-10 px-2 focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] outline-none text-md font-semibold text-gray-700"
                                                    value="$10" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 hover:bg-white/50 transition-colors">
                                        <td class="text-md text-gray-800 font-medium text-left px-6 py-4">Quarterly
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center">
                                                <input type="text" name="quarterly_price"
                                                    class="price-input text-center bg-white border border-gray-300 rounded-lg w-[100px] h-10 px-2 focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] outline-none text-md font-semibold text-gray-700"
                                                    value="$20" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 hover:bg-white/50 transition-colors">
                                        <td class="text-md text-gray-800 font-medium text-left px-6 py-4">Annually</td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center">
                                                <input type="text" name="annually_price"
                                                    class="price-input text-center bg-white border border-gray-300 rounded-lg w-[100px] h-10 px-2 focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] outline-none text-md font-semibold text-gray-700"
                                                    value="$30" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-white/50 transition-colors">
                                        <td class="text-md text-gray-800 font-medium text-left px-6 py-4">All Time</td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-center">
                                                <input type="text" name="alltime_price"
                                                    class="price-input text-center bg-white border border-gray-300 rounded-lg w-[100px] h-10 px-2 focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] outline-none text-md font-semibold text-gray-700"
                                                    value="$100" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex gap-3">
                            <a href="{{ route('program.index') }}"
                                class="flex-1 py-4 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-md font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Department
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
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
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

    @push('script')
        <script>
            $('.price-input').on("keyup", function() {
                let input = $(this).val();
                let numericInput = input.replace(/[^0-9]/g, '');
                $(this).val("$" + numericInput);
            });

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

                    fileList.innerHTML = filteredFiles.map(file =>
                        `<li class="flex items-center gap-2 text-green-600 font-medium">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            ${file.name}
                        </li>`
                    ).join('');
                }
            }

            setupFileUpload("banner-drop-area", "banner-input-file", "banner-file-list", "banner-browse", ["jpg", "jpeg",
                "png"
            ]);

            function closeImageTypeModal() {
                document.getElementById('image-type-modal').classList.add('hidden');
            }
        </script>
    @endpush
</x-app-layout>

<div id="description-modal" class="hidden fixed inset-0 z-50 bg-black/40 flex justify-center items-center">
    <div class="bg-white rounded-2xl w-[90%] sm:max-w-lg p-6 relative shadow-xl max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button type="button" onclick="closeModal()"
            class="close-modal absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Modal Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#3bcbbe]">Monthly Subscription</h1>
            <div class="w-16 h-1 bg-gradient-to-r from-[#21bbae] to-[#3bcbbe] mx-auto mt-2 rounded-full"></div>
        </div>

        <!-- Add Point Form -->
        <form action="" method="post" class="mb-6">
            <div class="flex gap-3">
                <input type="text" placeholder="Enter subscription feature"
                    class="flex-1 bg-gray-50 border border-gray-300 rounded-xl px-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm">
                <button type="submit"
                    class="py-3 px-6 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 whitespace-nowrap">
                    Add
                </button>
            </div>
        </form>

        <!-- Features List -->
        <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                Features Included
            </h3>
            <ul class="space-y-3 list-none">
                <li class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-200">
                    <svg class="w-5 h-5 text-[#3bcbbe] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm text-gray-700">
                        It is a long established fact that a reader will be.
                    </span>
                </li>
                <li class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-200">
                    <svg class="w-5 h-5 text-[#3bcbbe] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm text-gray-700">
                        It is a long established fact that a reader will be.
                    </span>
                </li>
                <li class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-200">
                    <svg class="w-5 h-5 text-[#3bcbbe] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm text-gray-700">
                        It is a long established fact that a reader will be.
                    </span>
                </li>
                <li class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-200">
                    <svg class="w-5 h-5 text-[#3bcbbe] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm text-gray-700">
                        It is a long established fact that a reader will be.
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
