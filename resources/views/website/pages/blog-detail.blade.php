@extends('website.app')
@section('title', 'Blogs | ' . $blog->title)
@section('main')
    <section class="py-10 px-5 lg:p-20 w-full">
        <div class="w-full">
            <img src="{{ asset($blog->banner) }}" class="w-full" alt="" srcset="">
            <h1 class="underline text-[45px] font-bold my-5">
                {{ $blog->title }}
            </h1>
            <div class="prose max-w-none blog-content">
                {!! $blog->content !!}
            </div>
        </div>
    </section>
@endsection
