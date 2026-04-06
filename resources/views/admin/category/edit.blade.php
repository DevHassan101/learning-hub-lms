@section('title', 'Edit Program')
<x-app-layout>

    <div class="w-[80%] mx-auto">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('program.index') }}" 
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Edit Department</h1>
                <p class="text-md font-medium text-gray-600 mt-0.5">Update department information</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Department Details</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Update the details below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('program.update', ['program' => $program]) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Title -->
                    <div>
                        <label for="title" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h10M4 17h6"/></svg>
                            Title
                        </label>
                        <input type="text" id="title" placeholder="Enter program title" name="title" value="{{ $program->title }}"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">
                        @error('title')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Banner Upload -->
                    <div>
                        <label class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5m-1-1l2-2c.928-.893 2.072-.893 3 0l3 3M3 21h18M14 8h.01M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                            Banner Image
                        </label>

                        <div id="banner-drop-area" class="rounded-xl">
                            <input type="file" id="banner-input-file" name="banner" hidden accept="image/*" />
                            <div class="bg-gray-50 border-2 border-dashed border-gray-300 hover:border-[#3bcbbe] rounded-xl text-center p-8 transition-all duration-200 cursor-pointer">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <button type="button" id="banner-browse" class="py-2.5 px-6 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-lg text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200">
                                    Upload Banner
                                </button>
                                <p class="text-xs text-gray-500 mt-3">JPG, PNG up to 5MB</p>
                            </div>
                            @error('banner')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                Subscription Pricing
                            </h3>
                        </div>

                        <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-[#3bcbbe]/10">
                                    <tr class="border-b border-[#3bcbbe]/20">
                                        <th class="text-sm font-semibold text-gray-700 text-left px-6 py-4">Subscription</th>
                                        <th class="text-sm font-semibold text-gray-700 text-center px-6 py-4">Price</th>
                                        <th class="text-sm font-semibold text-gray-700 text-center px-6 py-4">Features</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($program->plans as $plan)
                                        <tr class="border-b border-gray-200 hover:bg-white/50 transition-colors">
                                            <td class="text-md text-gray-800 font-medium text-left px-6 py-4">{{ $plan->name }}</td>
                                            <td class="px-6 py-4">
                                                <div class="flex justify-center">
                                                    <input type="text" name="prices[{{ $plan->id }}]"
                                                        class="price-input text-center bg-white border border-gray-300 rounded-lg w-[100px] h-10 px-2 focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] outline-none text-md font-semibold text-gray-700"
                                                        value="${{ $plan->price }}" />
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex justify-center">
                                                    <button type="button" data-name="{{ $plan->name }}"
                                                        data-points="{{ $plan->points }}" data-id="{{ $plan->id }}"
                                                        class="add-description w-9 h-9 rounded-xl bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] flex items-center justify-center hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-110"
                                                        title="Manage Features">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Update Department
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('.add-description').click(function(e) {
                e.preventDefault();
                $('#description-modal').removeClass("hidden");
                let planName = $(this).data("name");
                $('#plan-name').text(planName);
                let planPoints = $(this).data("points");
                let planId = $(this).data("id");
                $('#plan-id').val(planId);
                $('#point-id').val(null);
                getPoints(planId)
            });

            $('.close-modal').click(function(e) {
                e.preventDefault();
                $('#description-modal').addClass('hidden');
            });

            function closeModal() {
                $('#description-modal').addClass('hidden');
            }

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
                        alert("Invalid file type. Allowed types: " + allowedTypes.join(", "));
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

            setupFileUpload("banner-drop-area", "banner-input-file", "banner-file-list", "banner-browse", ["jpg", "jpeg", "png"]);

            function planPointStore(event) {
                event.preventDefault();

                let form = event.target;
                let fd = new FormData(form);
                let planId = fd.get('plan_id')
                $.ajax({
                    type: "POST",
                    url: "{{ route('plan-point.store') }}",
                    data: fd,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.error) {
                            Toast.fire({
                                icon: "error",
                                title: response.message
                            });
                            return;
                        }
                        getPoints(planId)
                        Toast.fire({
                            icon: "success",
                            title: response.message
                        });
                        $("#point").val(null);
                        $("#point-id").val(null);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }

            function getPoints(planId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get-points') }}",
                    data: {
                        planId: planId
                    },
                    success: function(response) {
                        if (response.error) {
                            console.error(response.message);
                            return;
                        }
                        $('#decription-points').empty();
                        let points = response.points;
                        points.forEach(point => {
                            $('#decription-points').append(`
                                <li class="flex items-center justify-between bg-white p-3 rounded-lg border border-gray-200">
                                    <div class="flex items-start gap-3 flex-1">
                                        <svg class="w-5 h-5 text-[#3bcbbe] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-sm text-gray-700 flex-1">
                                            ${point.point}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2 ml-3">
                                        <button type="button" onclick="editPoint(${point.id}, '${point.point}')" class="w-8 h-8 rounded-lg bg-purple-100 hover:bg-purple-200 flex items-center justify-center transition-all" title="Edit">
                                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button type="button" onclick="deletePoint(${point.id})" class="w-8 h-8 rounded-lg bg-red-100 hover:bg-red-200 flex items-center justify-center transition-all" title="Delete">
                                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </li>`);
                        });
                    }
                });
            }

            function editPoint(id, text) {
                $('#point-id').val(id);
                $('#point').val(text);
            }

            function deletePoint(id) {
                $('#object').text("point");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let url = "{{ url('point') }}" + "/" + id;
                $("#delete-form").attr('action', url);
                $('#description-modal').addClass('hidden');
            }
        </script>
    @endpush
</x-app-layout>

<!-- Description Modal -->
<div id="description-modal"
    class="hidden fixed inset-0 z-50 bg-black/40 flex justify-center items-center">
    <div class="bg-white rounded-2xl w-[90%] sm:max-w-lg p-6 relative shadow-xl max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button type="button" onclick="closeModal()"
            class="close-modal absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Modal Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-[#3bcbbe]">
                <span id="plan-name">Monthly</span> Subscription
            </h1>
            <div class="w-16 h-1 bg-gradient-to-r from-[#21bbae] to-[#3bcbbe] mx-auto mt-2 rounded-full"></div>
        </div>

        <!-- Add/Edit Point Form -->
        <form onsubmit="planPointStore(event)" method="post" class="mb-6" id="description-form">
            @csrf
            <input type="hidden" name="plan_id" id="plan-id">
            <input type="hidden" name="point_id" id="point-id">
            <div class="flex gap-3">
                <input type="text" required name="point" id="point" placeholder="Enter subscription feature"
                    class="flex-1 bg-gray-50 border border-gray-300 rounded-xl px-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm">
                <button type="submit"
                    class="py-3 px-6 bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 whitespace-nowrap">
                    Save
                </button>
            </div>
        </form>

        <!-- Features List -->
        <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                Features Included
            </h3>
            <ul class="space-y-3 list-none" id="decription-points">
                <!-- Dynamic content will be inserted here -->
            </ul>
        </div>
    </div>
</div>