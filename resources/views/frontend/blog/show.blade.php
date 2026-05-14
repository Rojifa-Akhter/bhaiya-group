@extends('layouts.front')

@section('title', $blog->meta_title ?? $blog->title . " | Salt Bay")

@section('meta')
@php
$schema = [
"page" => [
"description" => $blog->meta_description ?? Str::limit(strip_tags($blog->short ?? $blog->body), 150),
"keywords" => $blog->meta_keywords ?? "Salt Bay, Bhaiya Group, Blog, " . $blog->title,
"robots" => "index, follow, max-image-preview:large",
"canonical" => url()->current(),
],
"openGraph" => [
"type" => "website",
"title" => $blog->meta_title ?? $blog->title . " | Salt Bay",
"description" => $blog->meta_description ?? Str::limit(strip_tags($blog->short ?? $blog->body), 150),
"url" => url()->current(),
"site_name" => "Salt Bay",
"image" => asset($blog->img_path),
"locale" => "en_US",
],
"twitter" => [
"card" => "summary_large_image",
"title" => $blog->meta_title ?? $blog->title . " | Salt Bay",
"description" => $blog->meta_description ?? Str::limit(strip_tags($blog->short ?? $blog->body), 150),
"image" => asset($blog->img_path),
],
"breadcrumb" => [
"@context" => "https://schema.org",
"@type" => "BreadcrumbList",
"itemListElement" => [
["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
["@type" => "ListItem", "position" => 2, "name" => "Blogs", "item" => route('web.blog')],
["@type" => "ListItem", "position" => 3, "name" => $blog->title, "item" => url()->current()],
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

<script>
    fbq('track', 'ViewContent', {
        content_name: '{{ $blog->title }}',
        content_ids: ['{{ $blog->id }}'],
        content_type: 'blog'
    });
</script>

@endsection

@section('content')
<style>
    table {
        width: 100%;
    }

    table th,
    table td {
        border: 1px solid black !important;
        padding: 3px 5px;
    }

    ul {
        list-style: disc;
        padding-left: 20px;
    }

    ol {
        list-style: decimal;
        padding-left: 20px;
    }

    /* Default desktop styles (your current setup) */
    .blog-content h1 {
        font-size: 2.25rem;
        /* 36px */
        font-weight: 700;
        line-height: 1.2;
        margin-top: 1.2em;
        margin-bottom: 0.6em;
    }

    .blog-content h2 {
        font-size: 1.875rem;
        /* 30px */
        font-weight: 700;
        line-height: 1.25;
        margin-top: 1.2em;
        margin-bottom: 0.6em;
    }

    .blog-content h3 {
        font-size: 1.5rem;
        /* 24px */
        font-weight: 600;
        line-height: 1.3;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .blog-content h4 {
        font-size: 1.25rem;
        /* 20px */
        font-weight: 600;
        line-height: 1.35;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .blog-content h5 {
        font-size: 1.125rem;
        /* 18px */
        font-weight: 600;
        line-height: 1.4;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    .blog-content h6 {
        font-size: 1rem;
        /* 16px */
        font-weight: 600;
        line-height: 1.4;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }

    /* Mobile optimization for screens <= 768px */
    @media (max-width: 768px) {
        .blog-content h1 {
            font-size: 1.75rem;
            line-height: 1.25;
        }

        .blog-content h2 {
            font-size: 1.5rem;
            line-height: 1.3;
        }

        .blog-content h3 {
            font-size: 1.25rem;
            line-height: 1.35;
        }

        .blog-content h4 {
            font-size: 1.125rem;
            line-height: 1.4;
        }

        .blog-content h5 {
            font-size: 1rem;
            line-height: 1.45;
        }

        .blog-content h6 {
            font-size: 0.9375rem;
            line-height: 1.5;
        }
    }

    /* paragraph */
    .blog-content p {
        margin-bottom: 1em;
        line-height: 1.7;
    }

    /* list */
    .blog-content ul {
        list-style: disc;
        padding-left: 22px;
        margin-bottom: 1em;
    }

    .blog-content ol {
        list-style: decimal;
        padding-left: 22px;
        margin-bottom: 1em;
    }

    .blog-content li {
        margin-bottom: 4px;
    }

    /* links */
    .blog-content a {
        color: #2563eb;
        text-decoration: underline;
    }

    /* strong */
    .blog-content strong {
        font-weight: 700;
    }

    /* table */
    .blog-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }

    .blog-content table th,
    .blog-content table td {
        border: 1px solid #ccc;
        padding: 6px 8px;
    }

    /* image */

    .container {
        max-width: 80%;
    }

    @media(max-width:767px) {
        .container {
            max-width: 95%;
        }
    }

    /* blockquote */
    .blog-content blockquote {
        border-left: 4px solid #ddd;
        padding-left: 12px;
        color: #555;
        font-style: italic;
        margin: 1em 0;
    }
</style>

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
            <h3 class="text-xl sm:text-3xl md:text-3xl lg:text-5xl font-semibold animated-font">
                Our Blog
            </h3>

            <p class="text-xs sm:text-sm md:text-base lg:text-lg mt-2 w-full text-gray-500">
                <span class="text-gray-400">Home / </span> <a class="text-gray-400" href="{{route('web.blog')}}">blog / </a>{{$blog->title}}
            </p>
        </div>
    </div>
</section>

<section>
    <div class="blog-content min-h-screen p-4 md:p-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content Area -->
                <div class="lg:col-span-2">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                        {{$blog->title}}
                    </h1>

                    <!-- Featured Image -->
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset($blog->img_path) }}" alt="{{$blog->title}}" class="w-full h-auto">
                    </div>

                    <!-- Blog Content -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-8 space-y-4">
                        <p class="text-gray-600 leading-relaxed"><span class="w-2 h-2 bg-green-600 round rounded inline-block mr-1"></span> {{$blog->short}}</p>
                        <div class="text-gray-600 leading-relaxed">{!! $blog->body !!}</div>
                        <div class="text-gray-600 leading-relaxed">{!! $blog->body_2 !!}</div>
                        <div class="text-gray-600 leading-relaxed">{!! $blog->body_3 !!}</div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-4" style="margin-top: 150px;">
                        <div class="bg-gray-100 rounded-xl shadow-sm p-4 mb-6">
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-green-600 rounded"></div>
                                <h3 class="text-lg font-bold text-gray-800">Related Blogs</h3>
                            </div>

                            <div class="border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                                @forelse($blogs->where('id', '!=', $blog->id) as $item)
                                <a href="{{ route('web.blog.details', $item->name) }}"
                                    data-page="blog"
                                    class="flex gap-3 p-3 hover:bg-gray-50 transition-colors group"
                                    style="text-decoration: none;">

                                    <img src="{{ asset($item->img_path) }}"
                                        alt="{{ $item->title }}"
                                        class="w-24 h-20 object-cover rounded-lg flex-shrink-0 group-hover:opacity-90 transition-opacity">

                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-sm font-semibold text-gray-800 leading-snug line-clamp-3 group-hover:text-blue-600 transition-colors">
                                            {{ $item->title }}
                                        </h4>
                                    </div>
                                </a>
                                @if(!$loop->last)
                                <div class="border-t border-gray-100 mx-3"></div>
                                @endif

                                @empty
                                <div class="flex flex-col items-center justify-center py-6 text-center">
                                    <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">No Related Blogs</p>
                                    <p class="text-xs text-gray-400 mt-1">Check back later for more content</p>
                                </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection