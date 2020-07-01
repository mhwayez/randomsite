@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container max-w-8xl mx-auto px-6 md:px-8 lg:px-6  py-0">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="w-1/5 hidden lg:block">
            <div class="h-40 bg-gray-200 mb-3"></div>
            
            @php 
                $nav = $page->loadNavigations($page)
            @endphp
       
            @include('_nav.menu', ['items' => $nav])
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words pb-16 lg:px-5" v-pre>
            @yield('content')
        </div>
        <section class="lg:w-1/5">
            <div class="h-40 bg-gray-200 mb-3">
            
            </div>
        </section>
        <section class="lg:w-1/5 lg:hidden">
            <div class="h-40 bg-gray-200 mb-3">
            
            </div>
        </section>
    </div>
</section>
@endsection
