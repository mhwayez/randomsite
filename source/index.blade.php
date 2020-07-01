@extends('_layouts.master')

@section('body')
<section class="container mx-auto ">
    <div class="grid gap-4  sm:grid-cols-2 lg:grid-cols-3  mb-10  lg:mb-24 w-full">
        @foreach($page->topics as $topic)
        <div class="bg-white max-w-sm rounded overflow-hidden shadow mx-3 my-2 ">
            <div class="px-6 pt-4">
                <a href="/docs/{{$topic['file-name']}}" class="font-bold text-xl mb-2 text-gray-800">{{$topic['title']}}</a>
                <p class="text-gray-700 text-base h-24 overflow-hidden">
                {{$topic['description']}}{{$topic['description']}}
                </p>
            </div>
            <div class="px-6 pb-4 text-right">
                <a href="/docs/{{$topic['file-name']}}"><span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-800 mr-2 ">#{{$topic['topic-name']}}</span></a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
