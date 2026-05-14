@extends('layouts.front')

@section('content')
    <section class="bg-indigo-50 overflow-x-hidden">
        <!-- 1. Hero Section -->
        <div class="relative h-[400px] md:h-[500px] lg:h-[580px] w-full flex items-center justify-center overflow-hidden">
            <img src="{{ asset($hero->img_path ?? 'assets/images/landing-hero.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover" alt="Hero Background" />

            <div class="absolute inset-0 bg-black/60"></div>

            <div class="relative z-10 text-center px-4 max-w-7xl mx-auto">
                <h1 class="text-white text-3xl md:text-5xl lg:text-[56px] font-bold leading-[1.2] tracking-tight">
                    {{ $hero->title ?? 'Default Title If Not Found' }}
                </h1>
            </div>
        </div>

        <!-- 2. Floating Tabs Box -->
        <div class="container mx-auto px-4 md:px-10 -mt-16 md:-mt-24 relative z-20">
            <div
                class="bg-white rounded-2xl shadow-[0_20px_60px_rgba(0,0,0,0.1)] p-4 sm:p-6 md:p-10 border border-gray-50 max-w-6xl mx-auto">
                <h3 class="text-[#0a1d4a] text-lg md:text-[24px] font-bold text-center mb-8 md:mb-12">
                    What Project Are You Looking For?
                </h3>

                <!-- Tabs Layout -->
                <div
                    class="flex flex-col sm:flex-row flex-wrap justify-center items-center gap-6 md:gap-16 border-b border-gray-200">
                    <!-- Tab 1 (Active) -->
                    @foreach ($tabs as $index => $tab)
                        <a href="{{ $tab->video_path ?? '#' }}"
                            class="flex items-center gap-4 pb-8 px-4 cursor-pointer w-full sm:w-auto justify-center transition hover:opacity-100">
                            <div
                                class="w-18 h-18 bg-white border border-gray-100 rounded-md flex items-center justify-center p-1.5 flex-shrink-0">
                                <img src="{{ asset($tab->img_path ?? '') }}" alt="{{ $tab->title }}"
                                    class="w-full h-full object-contain" />
                            </div>
                            <div class="leading-tight">
                                <h4 class="text-sm font-semibold text-[#5E5E5E]">
                                    {!! $tab->title !!}
                                </h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- 3. Statistics Cards -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-10 py-12 md:py-20">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 lg:gap-8">
                @foreach ($stats as $stat)
                    <div
                        class="bg-white p-4 md:p-6 rounded-xl shadow-[0_5px_20px_rgba(0,0,0,0.03)] border border-gray-50 flex items-center gap-3 md:gap-5 transition-transform hover:scale-105 duration-300">
                        <div class="text-[#1e2d6b] text-2xl md:text-4xl">
                            <i class="{{ $stat->name }}"></i>
                        </div>

                        <div>
                            <h5 class="text-lg md:text-2xl font-black text-[#174BD4] leading-none">
                                {{ $stat->short }}
                            </h5>
                            <p class="text-[#5E5E5E] text-xs md:text-sm font-bold uppercase mt-1 tracking-tight">
                                {{ $stat->title }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- LIVE PROJECTS SECTION -->
    <section class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-6 md:px-10">
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row justify-between items-start gap-8 mb-16">
                <div class="max-w-xl">
                    <span class="text-[#2C4798] text-xs md:text-sm font-medium uppercase tracking-widest">
                        {{ $liveHeader->title ?? 'Moments at the' }}
                    </span>
                    <h2 class="text-3xl md:text[32px] font-semibold text-[#111111] mt-3">
                        {{ $liveHeader->name ?? 'Watch Our Live Projects' }}
                    </h2>
                </div>

                <div class="max-w-xl lg:text-right flex flex-col lg:items-end">
                    <p class="text-[#424242] text-sm md:text-base leading-relaxed mb-6">
                        {{ $liveHeader->short ?? 'Watch Our Live Projects' }}
                    </p>
                    <!-- View All Button -->
                    <a href="#"
                        class="inline-flex items-center gap-3 px-8 py-2.5 border-2 border-[#2c4294] text-[#2c4294] rounded-lg font-bold hover:bg-[#2c4294] hover:text-white transition-all duration-300 group">
                        View All
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                @foreach ($liveProjects as $project)
                    <div
                        class="bg-white rounded-[2.5rem] overflow-hidden shadow-[0_15px_50px_-15px_rgba(0,0,0,0.1)] border border-gray-100 group hover:shadow-2xl transition-all duration-500">
                        <!-- Video Thumbnail Area -->
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="{{ asset($project->img_path) }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="{{ $project->title }}" />

                            <!-- Live Badge -->
                            <div
                                class="absolute top-5 left-5 bg-red-600 text-white px-4 py-1.5 rounded-full flex items-center gap-2 shadow-lg z-10">
                                <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                <span class="text-[10px] font-bold uppercase tracking-widest">Live</span>
                            </div>

                            <!-- Play Button Overlay -->
                            <div
                                class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                                <div
                                    class="w-16 h-16 md:w-20 md:h-20 bg-white/80 rounded-full flex items-center justify-center shadow-2xl backdrop-blur-sm group-hover:scale-110 group-hover:bg-white transition-all duration-500">
                                    <i class="fa-solid fa-play text-[#2C4798] text-2xl md:text-3xl ml-1"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-8">
                            <h3 class="text-xl md:text-2xl font-bold text-[#111111] mb-3">{{ $project->title }}</h3>
                            <div class="flex items-center gap-2 text-[#5E5E5E] text-sm md:text-base mb-6">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $project->name }}</span> <!-- location -->
                            </div>
                            <!-- Separator -->
                            <div class="h-[1px] w-full bg-gray-100 mb-6"></div>
                            <!-- Stats -->
                            <div class="flex items-center gap-2 text-[#5E5E5E] text-base font-bold">
                                <i class="fa-regular fa-eye text-base"></i>
                                <span>{{ $project->short }} Watching</span> <!-- view -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- PROJECTS GRID SECTION -->
    <section class="bg-gray-50 py-16 md:py-24">
        <div class="container mx-auto px-6 md:px-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-[#2C4798] text-sm font-semibold uppercase tracking-widest mb-3 block">STALL</span>
                <h2 class="text-3xl md:text-[32px] font-semibold text-[#111111] mb-10">
                    Select the preferred project
                </h2>

                <!-- Filter Tabs (Exact as Image) -->
                <div class="flex justify-center">
                    <div class="flex gap-8 md:gap-12 border-b-2 border-gray-400">
                        <button
                            class="pb-3 text-gray-500 font-bold text-sm md:text-base border-b-2 border-transparent hover:text-gray-900 transition">
                            All
                        </button>
                        <button class="pb-3 text-gray-500 font-bold text-sm md:text-base border-b-2 border-[#2c4294]">
                            Flat
                        </button>
                        <button
                            class="pb-3 text-gray-500 font-bold text-sm md:text-base border-b-2 border-transparent hover:text-gray-900 transition">
                            Hotel & Resort
                        </button>
                        <button
                            class="pb-3 text-gray-500 font-bold text-sm md:text-base border-b-2 border-transparent hover:text-gray-900 transition">
                            Hospital
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                @forelse($projects as $project)
                    <div
                        class="bg-white rounded-4xl overflow-hidden shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 group transition-all duration-300 hover:shadow-xl">
                        <!-- Image Area -->
                        <div class="relative aspect-[16/11] overflow-hidden">
                            <img src="{{ asset($project->img_path ?? '') }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                alt="{{ $project->title }}" />
                        </div>

                        <!-- Content Area -->
                        <div class="p-8">
                            <!-- Date Badge -->
                            <span
                                class="inline-block bg-gray-50 text-gray-400 px-3 py-1 rounded text-xs md:text-base border border-gray-200 mb-4">
                                {{ $project->name ?? 'April 25, 2024' }}
                            </span>

                            <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-5 leading-tight">
                                {{ $project->title }}
                            </h3>

                            <div class="space-y-3 mb-8">
                                <div class="flex items-center gap-3 text-gray-500 text-sm md:text-base">
                                    <i class="fa-solid fa-location-dot text-[#2c4294]"></i>
                                    <span>{{ $project->short }}</span>
                                </div>
                                <div class="flex items-center gap-1 text-gray-500 text-sm md:text-base">
                                    <i class="fa-solid fa-vector-square text-[#2c4294]"></i>{!! $project->body !!}
                                </div>
                            </div>

                            <!-- Footer Link -->
                            <div class="flex justify-end pt-2">
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-[#2c4294] font-bold text-sm md:text-base group/link">
                                    See Details
                                    <i
                                        class="fa-solid fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-400 py-10">No projects found.</p>
                @endforelse

            </div>
        </div>
    </section>
    <!-- GALLERY SECTION -->
    <section class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-6 md:px-10">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-16">
                <!-- Left Heading Area -->
                <div class="max-w-xl">
                    <p class="text-[#2C4798] text-sm font-medium uppercase tracking-widest mb-2">
                        {{ $galleryHeader->name ?? '' }}
                    </p>
                    <h2 class="text-3xl md:text-4xl lg:text-[32px] font-semibold text-gray-900 leading-tight">
                        {{ $galleryHeader->title ?? '' }}
                    </h2>
                </div>

                <!-- Right Paragraph & Button Area -->
                <div class="max-w-xl lg:text-right">
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-6">
                        {{ $galleryHeader->short ?? '' }}
                    </p>
                    <div class="flex lg:justify-end">
                        <a href="#"
                            class="inline-flex items-center gap-2 px-6 py-2 border-2 border-[#2C4294] text-[#2C4294] rounded-lg font-bold text-base hover:bg-[#2C4294] hover:text-white transition-all duration-300 group">
                            View All
                            <i
                                class="fa-solid fa-arrow-right text-[12px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Image Grid (ইমেজের মতো হুবহু ৩ কলাম) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($galleryImages as $image)
                    <!-- Image Card -->
                    <div class="relative overflow-hidden group cursor-pointer aspect-square lg:aspect-[4/3]">
                        <img src="{{ asset($image->img_path) }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            alt="Gallery Image" />

                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all"></div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-400">No images found in gallery.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- VIDEO TOUR SECTION -->
    <section class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-6 md:px-10">
            <!-- Section Header -->
            <div class="mb-12">
                <span class="text-[#2c4294] text-sm font-medium uppercase tracking-widest block mb-3">
                    {{ $videoHeader->title ?? 'Experience it in motion' }}
                </span>
                <h2 class="text-3xl md:text-[32px] font-semibold text-gray-900 mb-4">
                    {{ $videoHeader->name ?? '' }}
                </h2>
                <p class="text-gray-600 text-base md:text-lg">
                    {{ $videoHeader->short ?? 'Experience it in motion' }}
                </p>
            </div>

            <!-- Layout Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                @if (isset($mainVideo))
                    <div class="lg:col-span-8 relative group cursor-pointer overflow-hidden shadow-2xl">
                        <img src="{{ asset($mainVideo->img_path ?? '') }}"
                            class="w-full h-[440px] object-cover transition-transform duration-700 group-hover:scale-105"
                            alt="Main Video" />

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/25 group-hover:bg-black/40 transition-all duration-500">
                        </div>

                        <!-- Big Center Play Button -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-20 h-20 md:w-24 md:h-24 bg-white/90 rounded-full flex items-center justify-center shadow-[0_0_50px_rgba(0,0,0,0.3)] transition-all group-hover:scale-110 group-hover:bg-white">
                                <i class="fa-solid fa-play text-brand-blue text-2xl md:text-4xl ml-1.5"></i>
                            </div>
                        </div>

                        <!-- Content Overlay (Bottom Left) -->
                        <div class="absolute bottom-8 md:bottom-12 left-8 md:left-12 text-white">
                            <span
                                class="inline-block bg-brand-blue px-5 py-2 rounded-lg text-[11px] font-bold uppercase tracking-widest mb-5 shadow-lg">
                                {{ $mainVideo->title }} <!-- e.g. Hotel Overview -->
                            </span>
                            <h3 class="text-2xl md:text-3xl font-extrabold mb-4 leading-tight">
                                {{ $mainVideo->name }} <!-- e.g. Welcome to Salt Bay Hotel -->
                            </h3>
                            <div class="flex items-center gap-3 text-sm font-bold opacity-90">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span>{{ $mainVideo->short }}</span> <!-- e.g. 5.30 -->
                            </div>
                        </div>
                    </div>
                @endif

                <!-- RIGHT SIDE: VIDEO LIST -->
                <div class="lg:col-span-4 flex flex-col gap-5">
                    @foreach ($videoList as $video)
                        <div
                            class="bg-[#f2f6ff] p-4 md:p-5 flex items-center gap-5 group cursor-pointer hover:bg-indigo-100 transition-all duration-300 border border-indigo-50/50">
                            <!-- Mini Thumbnail -->
                            <div
                                class="relative w-32 h-24 md:w-36 md:h-28 flex-shrink-0 overflow-hidden shadow-sm">
                                <img src="{{ asset($video->img_path ?? '') }}"
                                    class="w-full h-full object-cover transition-transform group-hover:scale-110" />
                                <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-play text-brand-blue text-[10px] ml-0.5"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Info -->
                            <div class="space-y-1">
                                <span
                                    class="text-brand-blue text-[10px] font-bold uppercase tracking-widest block">{{ $video->title }}</span>
                                <h4
                                    class="text-[#111111] font-bold text-base md:text-lg leading-tight group-hover:text-brand-blue transition-colors">
                                    {{ $video->name }}
                                </h4>
                                <div class="flex items-center gap-2 text-gray-500 text-xs font-bold pt-1">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                    <span>{{ $video->short }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- EXPLORE BLOG SECTION -->
    <section class="bg-[#f8faff] py-16 md:py-24">
        <div class="container mx-auto px-6 md:px-10">
            <!-- Section Header (Same as Image) -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8 mb-16">
                <div class="max-w-xl">
                    <span class="text-[#2c4294] text-xs md:text-sm font-medium uppercase tracking-widest block mb-3">
                        From our journal
                    </span>
                    <h2 class="text-xl md:text-[32px] font-semibold text-gray-900 leading-tight">
                        Explore Our Blog
                    </h2>
                </div>

                <div class="max-w-md lg:text-right flex flex-col lg:items-end">
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-6">
                        Immerse yourself in the sights and sounds of our resort. Take a
                        virtual tour
                    </p>
                    <!-- Explore More Button (Outline Style) -->
                    <a href="#"
                        class="inline-flex items-center gap-3 px-8 py-2.5 border border-[#2c4294] text-[#2c4294] rounded-lg font-bold hover:bg-[#2c4294] hover:text-white transition-all duration-300 group">
                        Explore More
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                <div
                    class="bg-white rounded-4xl overflow-hidden shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 group transition-all duration-300">
                    <!-- Image Area -->
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            alt="Blog Image" />
                    </div>

                    <!-- Card Content Body -->
                    <div class="p-8 pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <span class="bg-[#f3f4f6] text-gray-500 px-4 py-1.5 rounded-full text-sm font-medium">
                                April 25, 2024
                            </span>
                            <div class="flex items-center gap-2 text-gray-500 text-sm font-semibold">
                                <i class="fa-regular fa-clock text-sm"></i>
                                <span>5.30</span>
                            </div>
                        </div>

                        <h3
                            class="text-xl font-medium text-gray-900 mb-6 leading-tight group-hover:text-[#2c4294] transition">
                            Concord Aurora Heights
                        </h3>

                        <a href="#"
                            class="inline-flex items-center gap-2 text-[#2c4294] font-bold text-sm md:text-base group/link">
                            Explore Article
                            <i
                                class="fa-solid fa-arrow-right text-[12px] group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Card Footer (Author Info Section) -->
                    <div class="px-8 py-6 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="./assets/images/person (1).png"
                                class="w-14 h-14 rounded-full object-cover shadow-sm group-hover:grayscale-0 transition-all duration-500"
                                alt="Author" />
                            <div class="leading-tight">
                                <h5 class="text-sm md:text-xl font-medium text-gray-900">Williamson</h5>
                                <p class="text-sm font-medium text-gray-500">
                                    Managing Director
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600 text-sm font-semibold">
                            <i class="fa-regular fa-calendar-days text-sm"></i>
                            <span>May, 24, 2026</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 (Same to same) -->
                <div
                    class="bg-white rounded-4xl overflow-hidden shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 group transition-all duration-300">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                    </div>
                    <div class="p-8 pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <span class="bg-[#f3f4f6] text-gray-500 px-4 py-1.5 rounded-full text-sm font-medium">
                                April 25, 2024
                            </span>
                            <div class="flex items-center gap-2 text-gray-500 text-sm font-semibold">
                                <i class="fa-regular fa-clock text-sm"></i>
                                <span>5.30</span>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-medium text-gray-900 mb-6 leading-tight group-hover:text-[#2c4294] transition">
                            Concord Aurora Heights
                        </h3>
                        <a href="#"
                            class="inline-flex items-center gap-2 text-[#2c4294] font-bold text-sm md:text-base group/link">Explore
                            Article
                            <i
                                class="fa-solid fa-arrow-right text-[12px] group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                    <div class="px-8 py-6 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="./assets//images/person (2).png"
                                class="w-14 h-14 rounded-full object-cover shadow-sm group-hover:grayscale-0 transition-all duration-500"
                                alt="Author" />
                            <div class="leading-tight">
                                <h5 class="text-sm md:text-xl font-medium text-gray-900">Williamson</h5>
                                <p class="text-sm font-medium text-gray-500">
                                    Managing Director
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600 text-sm font-semibold">
                            <i class="fa-regular fa-calendar-days text-sm"></i>
                            <span>May, 24, 2026</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 (Same to same) -->
                <div
                    class="bg-white rounded-4xl overflow-hidden shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 group transition-all duration-300">
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1571011299480-13a66557b44a?q=80&w=2070&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                    </div>
                    <div class="p-8 pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <span class="bg-[#f3f4f6] text-gray-500 px-4 py-1.5 rounded-full text-sm font-medium">
                                April 25, 2024
                            </span>
                            <div class="flex items-center gap-2 text-gray-500 text-sm font-semibold">
                                <i class="fa-regular fa-clock text-sm"></i>
                                <span>5.30</span>
                            </div>
                        </div>
                        <h3
                            class="text-xl font-medium text-gray-900 mb-6 leading-tight group-hover:text-[#2c4294] transition">
                            Concord Aurora Heights
                        </h3>
                        <a href="#"
                            class="inline-flex items-center gap-2 text-[#2c4294] font-bold text-sm md:text-base group/link">Explore
                            Article
                            <i
                                class="fa-solid fa-arrow-right text-[12px] group-hover/link:translate-x-1 transition-transform"></i></a>
                    </div>
                    <div class="px-8 py-6 border-t border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?u=a"
                                class="w-14 h-14 rounded-full object-cover shadow-sm grayscale group-hover:grayscale-0 transition-all duration-500"
                                alt="Author" />
                            <div class="leading-tight">
                                <h5 class="text-sm md:text-xl font-medium text-gray-900">Williamson</h5>
                                <p class="text-sm font-medium text-gray-500">
                                    Managing Director
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600 text-sm font-semibold">
                            <i class="fa-regular fa-calendar-days text-sm"></i>
                            <span>May, 24, 2026</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
