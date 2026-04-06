@section('title', 'CMS')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex items-center gap-4">
            <a href="{{ url('/cms') }}" 
                class="group flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-[#26beb1]">
                    {{ __('CMS - Manage Fields') }}
                </h2>
                <p class="text-sm font-medium text-gray-600 mt-0.5">{{ $pageName }}</p>
            </div>
        </div>
    </x-slot>

    <div class="w-[90%] mx-auto mt-10">
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Page Content Fields</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Update the content fields below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('update-content', ['id' => $dynamicContentId]) }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @method('PUT')
                    @csrf
                    
                    @forelse ($dynamicContentFields as $dynamicContentField)
                        @if ($dynamicContentField->type == 'image')
                            <!-- Image Field -->
                            <div class="pb-6 border-b border-gray-200">
                                <label for="{{ $dynamicContentField->title }}" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5m-1-1l2-2c.928-.893 2.072-.893 3 0l3 3M3 21h18M14 8h.01M3 10V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                                    {{ $dynamicContentField->title }}
                                </label>
                                <input type="file" name="{{ $dynamicContentField->title }}" id="{{ $dynamicContentField->title }}" accept="image/*"
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm text-gray-700 shadow-sm hover:border-[#3bcbbe]/50 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#3bcbbe]/10 file:text-[#3bcbbe] hover:file:bg-[#3bcbbe]/20">
                                @error($dynamicContentField->title)
                                    <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        @elseif ($dynamicContentField->type == 'text')
                            <!-- Text Field -->
                            <div class="pb-6 border-b border-gray-200">
                                <label for="{{ $dynamicContentField->title }}" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h10M4 17h6"/></svg>
                                    {{ $dynamicContentField->title }}
                                </label>
                                <input type="text" name="{{ $dynamicContentField->title }}" id="{{ $dynamicContentField->title }}" value="{{ $dynamicContentField->content }}" required
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">
                                @error($dynamicContentField->title)
                                    <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        @else
                            <!-- Textarea/Rich Text Field -->
                            <div class="pb-6 border-b border-gray-200">
                                <label for="{{ $dynamicContentField->title }}" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2"/></svg>
                                    {{ $dynamicContentField->title }}
                                </label>
                                <textarea name="{{ $dynamicContentField->title }}" id="{{ $dynamicContentField->title }}" rows="10" required
                                    class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ $dynamicContentField->content }}</textarea>
                                @error($dynamicContentField->title)
                                    <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        @endif
                    @empty
                        <div class="py-12">
                            <div class="flex flex-col justify-center items-center">
                                <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500 font-medium text-lg">No fields found</p>
                                <p class="text-gray-400 text-sm mt-1">This page has no content fields</p>
                            </div>
                        </div>
                    @endforelse

                    <!-- Submit Button -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex gap-3">
                            <a href="{{ url('/cms') }}"
                                class="flex-1 py-4 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-md font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Update Content
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.tiny.cloud/1/7bz70b4x7735t7ovw4a2o9p4roiiqv65vn12c7ccbcskb83l/tinymce/8/tinymce.min.js"
            referrerpolicy="origin" crossorigin="anonymous"></script>

        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                menubar: false,
                height: 400,
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }',
                skin: 'oxide',
                statusbar: true,
            });
        </script>
    @endpush
</x-app-layout>