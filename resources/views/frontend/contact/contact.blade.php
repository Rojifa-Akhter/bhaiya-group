@extends('layouts.front')
@section('title', "Contact Us | Salt Bay | Bhaiya Hotels")

@section('meta')
@php
$schema = [
    "page" => [
        "description" => "Get in touch with Salt Bay, a luxury project by Bhaiya Hotels under Bhaiya Group. Contact us for inquiries, investment opportunities, and support.",
        "keywords" => "Salt Bay, Bhaiya Hotels, Bhaiya Group, Contact, Inquiries, Investment, Support",
        "robots" => "index, follow, max-image-preview:large",
        "canonical" => url()->current(),
    ],
    "openGraph" => [
        "type" => "website",
        "title" => "Contact Us | Salt Bay",
        "description" => "Reach out to Salt Bay for project inquiries, investment opportunities, or customer support.",
        "url" => url()->current(),
        "site_name" => "Salt Bay",
        "image" => asset('assets/images/contact-og.jpg'),
        "locale" => "en_US",
    ],
    "twitter" => [
        "card" => "summary_large_image",
        "title" => "Contact Us | Salt Bay",
        "description" => "Reach out to Salt Bay for project inquiries, investment opportunities, or customer support.",
        "image" => asset('assets/images/contact-og.jpg'),
    ],
    "breadcrumb" => [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Home",
                "item" => url('/')
            ],
            [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "Contact Us",
                "item" => url()->current()
            ],
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
                "parentOrganization" => [
                    "@type" => "Organization",
                    "name" => "Bhaiya Hotels",
                    "parentOrganization" => [
                        "@type" => "Organization",
                        "name" => "Bhaiya Group"
                    ]
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
{!! json_encode($schema['breadcrumb'], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

{{-- ORGANIZATION SCHEMA --}}
<script type="application/ld+json">
{!! json_encode($schema['organization'], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>


    

 


@endsection
@section('content')
    {{-- CONTACT HERO --}}
    @include('frontend.contact.heroContact')
<style>
    body{
        background:black
    }
</style>
   <section class="  ">
        <div class="overlay2"></div>
        <div class="container mx-auto px-4 py-12 lg:py-20 relative ">
            <div class=" ">
                <div class="grid lg:grid-cols-3 gap-0 container  mx-auto">

                    <div class="lg:col-span-1 p-6 lg:p-8 border-r border-[#1e1e1f]">
                        <!-- Contact Items -->
                        <div class="space-y-6 mb-8">
                            <!-- Project Location -->
                            <div class="flex items-start gap-4">
                                <div class="bg-[#141313] text-[#ece2d6] rounded-xl p-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt  text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1 text-[#ece2d6]">Project Location</h3>
                                    <p class="text-gray-400 text-sm  opacity-90">
                                        Marine Drive Road, Inani Beach, Cox's bazar 
                                    </p>
                                </div>
                            </div>

                            <!-- Head Office -->
                            <div class="flex items-start gap-4">
                                <div class="bg-[#141313] text-[#ece2d6] rounded-xl p-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt  text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1 text-[#ece2d6]">Head Office</h3>
                                    <p class="text-gray-400 text-sm  opacity-90">
                                        Sandwip Baban, 28/A-3<br>
                                        Toyenbee Circular Road <br>
                                        Motijheel C/A, Dhaka <br>
                                        Tel: +88 02 9551750
                                    </p>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="flex items-start gap-4">
                                <div class="bg-[#141313] text-[#ece2d6] rounded-xl p-4 flex-shrink-0">
                                    <i class="fas fa-phone  text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1 text-[#ece2d6]">Phone Number</h3>
                                    <p class="text-gray-400 text-sm  opacity-90">
                                      <a href="tel:{{ $setting->extra }}" 
   onclick="fbq('track', 'Contact', {content_name: 'Phone Click'});">
   {{ $setting->extra }}
</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-4">
                                <div class="bg-[#141313] text-[#ece2d6] rounded-xl p-4 flex-shrink-0">
                                    <i class="fas fa-envelope text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg mb-1 text-[#ece2d6]">Email us</h3>
                                    <p class="text-gray-400 text-sm  opacity-90">
                                        <a href="mailto:{{ $setting->location }}" 
   onclick="fbq('track', 'Contact', {content_name: 'Email Click'});">
   {{ $setting->location }}
</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Need Help Section -->
                        <div class="bg-[#141313] rounded-2xl p-4 mt-8">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="bg-gray-100 rounded-full p-3">
                                    <i class="fas fa-headset text-gray-700 text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold  text-[#ece2d6] text-lg">Need help?</h3>
                                    <p class="text-sm text-gray-400">Call our team</p>
                                </div>
                            </div>
                            <p class=" text-[#ece2d6] font-bold text-xl mb-4">              <a href="tel:{{ $setting->extra }}" 
   onclick="fbq('track', 'Contact', {content_name: 'Phone Click'});">
   {{ $setting->extra }}
</a></p>
                            <p class="text-xs text-gray-400">Saturday - Friday</p>
                            <p class="text-xs text-gray-400">09:00 AM - 10:00 PM</p>
                        </div>
                    </div>

                    <!-- Right Side - Contact Form -->
                    <div class="lg:col-span-2 p-8 lg:p-12">
                        <div class="mb-8 text-center">
                            <p class="font-serif italic text-lg mb-2 text-white">{{ $contactForm->title ?? 'Contact Us' }}</p>
                            <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-[#ece2d6]">{{ $contactForm->name ?? 'Get In Touch' }}</h1>
                            <p class="text-gray-400">{{ $contactForm->short ?? 'We are at your disposal 7 days a week!' }}</p>
                        </div>

                        {{-- Success Message --}}
                        @if(session('success'))
                            <div id="alert-message" class="bg-green-600/20 border border-green-600 text-green-500 p-4 rounded-lg mb-6 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="font-medium">{{ session('success') }}</span>
                                </div>
                                <button type="button" onclick="this.parentElement.style.display='none'" class="text-green-500 hover:text-white text-xl">
                                    &times;
                                </button>
                            </div>
                            <script>
    fbq('track', 'Lead', {
        content_name: 'Contact Form Submission',
        content_category: 'Lead',
        value: 1.00,
        currency: 'USD',
        // Send the visitor info
        lead_name: '{{ session("lead_name") ?? "" }}',
        lead_email: '{{ session("lead_email") ?? "" }}',
        lead_phone: '{{ session("lead_phone") ?? "" }}'
    });
</script>
                        @endif

                        {{-- Validation Error Message --}}
                        @if($errors->any())
                            <div class="bg-red-600/20 border border-red-600 text-red-500 p-4 rounded-lg mb-6">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5 text-white">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-4">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name *" required
                                    class="w-full px-4 py-3 rounded-lg focus:outline-none bg-black border border-gray-800 focus:border-[#ece2d6]">

                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required
                                    class="w-full px-4 py-3 rounded-lg focus:outline-none bg-black border border-gray-800 focus:border-[#ece2d6]">
                            </div>

                            <div>
                                <div class="flex gap-2">
                                    <select name="code" class="px-4 py-3 rounded-lg bg-black border border-gray-800 text-white focus:outline-none focus:border-[#ece2d6]">
                                        <option value="+880" {{ old('code') == '+880' ? 'selected' : '' }}>🇧🇩 +880</option>
                                        <option value="+1" {{ old('code') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                                        <option value="+44" {{ old('code') == '+44' ? 'selected' : '' }}>🇬🇧 +44</option>
                                    </select>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="1700 000000 *" required
                                        class="w-full px-4 py-3 rounded-lg focus:outline-none bg-black border border-gray-800 focus:border-[#ece2d6]">
                                </div>
                            </div>

                            <textarea name="message" placeholder="Type your Message" rows="6" required
                                class="w-full px-4 py-3 rounded-lg focus:outline-none bg-black border border-gray-800 focus:border-[#ece2d6]">{{ old('message') }}</textarea>

                            <button type="submit"
                                class="bg-white text-black font-semibold py-3 px-10 rounded-lg transition duration-300 hover:bg-[#ece2d6] shadow-lg active:scale-95">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Map Section -->
        <div class=" h-96  ">
            <iframe
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118926.80054701147!2d91.9280314934174!3d21.33224422157448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30addb007e8766c3%3A0x271da740a4221add!2sSalt%20Bay!5e0!3m2!1sen!2sbd!4v1774868134172!5m2!1sen!2sbd"
                width="100%"
                height="100%"
                style="border:0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>

   </section>
@endsection
