@extends('layouts.front')
@section('title', "Our Blogs ")

@section('meta')
@php
$schema = [
"page" => [
"description" => "Read the latest news, updates, and articles from Salt Bay, a luxury project by Bhaiya Group. Stay updated with our blogs and insights.",
"keywords" => "Salt Bay, Bhaiya Group, Blogs, News, Updates, Hospitality, Luxury Hotel",
"robots" => "index, follow, max-image-preview:large",
"canonical" => url()->current(),
],
"openGraph" => [
"type" => "website",
"title" => "Our Blogs | Salt Bay",
"description" => "Explore latest blogs and updates from Salt Bay luxury project by Bhaiya Group.",
"url" => url()->current(),
"site_name" => "Salt Bay",
"image" => asset('assets/images/blog-og.jpg'),
"locale" => "en_US",
],
"twitter" => [
"card" => "summary_large_image",
"title" => "Our Blogs | Salt Bay",
"description" => "Read the latest blogs and updates from Salt Bay luxury project by Bhaiya Group.",
"image" => asset('assets/images/blog-og.jpg'),
],
"breadcrumb" => [
"@context" => "https://schema.org",
"@type" => "BreadcrumbList",
"itemListElement" => [
["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
["@type" => "ListItem", "position" => 2, "name" => "Blogs", "item" => url()->current()],
],
],
"organization" => [
"@context" => "https://schema.org",
"@graph" => [
[
"@type" => "Organization",
"name" => "Salt Bay",
"url" => url('/'),
"logo" => asset('assets/images/logo.png'),
"sameAs" => [
"https://www.facebook.com/Saltbayhotel",
"https://www.youtube.com/@SaltbayHotel"
],
"founder" => [
"@type" => "Person",
"name" => 'Maroof Sattar Ali',
"jobTitle" => "Chairman",
],
"foundingDate" => "1972",
"address" => [
"@type" => "PostalAddress",
"streetAddress" => "Nabil House, House-09, Road-17, Block-D, Banani",
"addressLocality" => "Dhaka",
"addressCountry" => "BD"
]
]
]
]
];
@endphp

{{-- META TAGS --}}
<meta name="description" content="{{ $schema['page']['description'] }}">
<meta name="keywords" content="{{ $schema['page']['keywords'] }}">
<meta name="robots" content="{{ $schema['page']['robots'] }}">
<link rel="canonical" href="{{ $schema['page']['canonical'] }}">

{{-- OPEN GRAPH --}}
<meta property="og:type" content="{{ $schema['openGraph']['type'] }}">
<meta property="og:title" content="{{ $schema['openGraph']['title'] }}">
<meta property="og:description" content="{{ $schema['openGraph']['description'] }}">
<meta property="og:url" content="{{ $schema['openGraph']['url'] }}">
<meta property="og:site_name" content="{{ $schema['openGraph']['site_name'] }}">
<meta property="og:image" content="{{ $schema['openGraph']['image'] }}">
<meta property="og:locale" content="{{ $schema['openGraph']['locale'] }}">

{{-- TWITTER --}}
<meta name="twitter:card" content="{{ $schema['twitter']['card'] }}">
<meta name="twitter:title" content="{{ $schema['twitter']['title'] }}">
<meta name="twitter:description" content="{{ $schema['twitter']['description'] }}">
<meta name="twitter:image" content="{{ $schema['twitter']['image'] }}">

{{-- BREADCRUMB --}}
<script type="application/ld+json">
    {
        !!json_encode($schema['breadcrumb'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!
    }
</script>

{{-- ORGANIZATION SCHEMA --}}
<script type="application/ld+json">
    {
        !!json_encode($schema['organization'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!
    }
</script>
@endsection


@section('content')

<section class="relative w-full overflow-hidden cc">
    <div class="relative h-[60vh] md:h-[80vh] lg:h-[100vh] flex items-center justify-center px-4 md:px-8 animate-shrink-header bg-cover bg-center"
        style="background: url('/images/176820798293737.png') no-repeat center center; background-size: cover;">

        <div class="absolute right-0 bottom-0 lg:bottom-0 lg:top-auto
                    bg-white text-black
                    rounded-tl-[35px]
                    w-full max-w-[300px] sm:max-w-[400px] md:max-w-[500px] lg:max-w-[600px]
                    px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12
                    py-4 sm:py-6
                    flex flex-col justify-center items-center text-center shadow-2xl">
            <h1 class="text-xl sm:text-3xl md:text-3xl lg:text-5xl font-semibold animated-font">
                Our Blogs
            </h1>

            <p class="text-xs sm:text-sm md:text-base lg:text-lg mt-2 w-full text-gray-500">
                <span class="text-gray-400">Home / </span>Our Blogs
            </p>
        </div>
    </div>
</section>
<section>
    <div class="min-h-screen p-8">
        <div class="container  mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($blogs as $blog)
                <a href="{{route('web.blog.details',$blog->name)}}" data-page="blog">
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 group cursor-pointer">
                        <div class="relative h-64 overflow-hidden">
                            <img style="padding:10px;border-radius:15px" src="{{ asset($blog->img_path) }}"
                                alt="Hotel"
                                class="w-full h-full object-cover group-hover:scale-95 transition-transform duration-300">


                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2 leading-tight">
                                {{$blog->title}}
                            </h3>

                            {{-- Created Date --}}
                            <p class="text-sm text-gray-400 mb-3">
    {{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('d M Y') : '' }}
                            </p>
                            {{-- Short Description --}}
                            <p class="text-gray-600 text-sm mb-4">
                                {{$blog->short}}
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-500">By SALTBAY</span>

                                {{-- Read More Button --}}
                                <span class="px-4 py-2 text-sm font-medium text-white bg-black rounded-md 
                     group-hover:bg-gray-800 transition duration-300">
                                    Read More →
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection