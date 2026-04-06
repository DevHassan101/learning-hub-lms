@section('title', 'Add Testimonial')
<x-app-layout>

    <div class="w-[80%] mx-auto">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('testimonial.index') }}" 
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Add New Testimonial</h1>
                <p class="text-md font-medium text-gray-600 mt-0.5">Create a new testimonial</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Testimonial Details</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Fill in the details below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Student Name -->
                    <div>
                        <label for="name" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.523 21.99H4.488c-1.503 0-2.663-1.134-2.466-2.624l.114-.869c.207-1.2 1.305-1.955 2.497-2.214L11.928 15h.144l7.295 1.283c1.212.28 2.29.993 2.497 2.214l.114.88c.197 1.49-.963 2.623-2.466 2.623zM17 7A5 5 0 1 1 7 7a5 5 0 0 1 10 0"/></svg>
                            Student Name
                        </label>
                        <input type="text" id="name" placeholder="Enter student name" name="name" value="{{ old('name') }}"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">
                        @error('name')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3l-4 4z"/></svg>
                            Message
                        </label>
                        <textarea name="message" id="message" rows="8" placeholder="Enter testimonial message"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex gap-3">
                            <a href="{{ route('testimonial.index') }}"
                                class="flex-1 py-4 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-md font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Add Testimonial
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>