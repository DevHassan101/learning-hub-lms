@section('title', 'Edit Blog')
<x-app-layout>

    <div class="bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl min-h-full">
        <div class="p-6 border-b border-gray-200 overflow-x-auto relative">
            <a href="{{ route('blog.index') }}" class="sm:absolute top-[40px]">
                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" stroke="#6D51E7"
                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </a>
            <div class="w-full flex justify-center">
                <div class="w-full max-w-[650px]">
                    <h1 class="text-[36px] font-bold mb-5">
                        Edit Blog
                    </h1>
                    <form action="{{ route('blog.update', ['blog' => $blog]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title">
                                Title
                            </label>
                            <input type="title" placeholder="title" name="title" value="{{ old('title', $blog->title) }}"
                                class="border border-[#482EE3] bg-transparent rounded-lg block w-full mt-1 p-2 focus:ring-[#482EE3] focus:outline-[#482EE3]">
                            @error('title')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="title">
                                Banner
                            </label>
                            <input type="file" placeholder="banner" name="banner" value="{{ old('banner') }}"
                                class="border border-[#482EE3] bg-transparent rounded-lg block w-full mt-1 p-2 focus:ring-[#482EE3] focus:outline-[#482EE3]">
                            @error('banner')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full col-span-2">
                            <label for="description">
                                Description
                            </label>
                            <textarea name="description" id="" cols="30" rows="8" placeholder="Write Description"
                                class="mt-1 resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2 focus:ring-[#482EE3]">{{ old('description', $blog->description) }}</textarea>
                            @error('description')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full col-span-2">
                            <label for="content">
                                Content
                            </label>
                            <textarea name="content" id="" cols="30" rows="8" placeholder="Write content"
                                class="tinymce mt-1 resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2 focus:ring-[#482EE3]">{{ $blog->content }}</textarea>
                            @error('content')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button
                            class="mt-5 w-full py-2 px-4 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <script src="https://cdn.tiny.cloud/1/7bz70b4x7735t7ovw4a2o9p4roiiqv65vn12c7ccbcskb83l/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector: '.tinymce',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
    @endpush
</x-app-layout>
