@section('title', 'Notification Management')
<x-app-layout>

    <div class="w-[80%] mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-[#3bcbbe]">Notification Management</h1>
            <p class="text-md font-medium text-gray-600 mt-0.5">Send notifications to users</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-8 py-6">
                <h2 class="text-lg font-semibold text-gray-900">Send Notification</h2>
                <p class="text-sm font-medium text-gray-600 mt-1">Fill in the details below</p>
            </div>

            <div class="p-8">
                <form action="{{ route('notification.store') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Title -->
                    <div>
                        <label for="title" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9"/></svg>
                            Title
                        </label>
                        <textarea name="title" id="title" rows="2" placeholder="Enter notification title"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ old('title') }}</textarea>
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
                        <textarea name="description" id="description" rows="6" placeholder="Enter notification description"
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50 resize-none">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="border-t border-gray-200 pt-6">
                        <button type="submit"
                            class="w-full py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Send Notification
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-2xl p-6">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-md font-semibold text-blue-900 mb-1">Notification Information</h3>
                    <p class="text-sm text-blue-700">This notification will be sent to all registered users immediately after submission.</p>
                </div>
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
        function closeImageTypeModal() {
            document.getElementById('image-type-modal').classList.add('hidden');
        }
    </script>
</x-app-layout>