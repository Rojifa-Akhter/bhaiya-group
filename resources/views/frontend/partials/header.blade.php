<header class="bg-white sticky top-0 z-50">
    <div class="container mx-auto px-4 md:px-10 h-24 flex items-center justify-between">
        <!-- Logo Section -->
        <div class="flex-shrink-0">
            <a href="/" class="flex flex-col items-center">
                <img src="{{asset('./frontend/images/logo.png')}}" alt="logo" class="h-14 md:h-18" />
            </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <nav class="hidden lg:flex items-center space-x-10">
            <!-- Home link matches your color now via .nav-link CSS -->
            <a href="#" class="nav-link active-link">Home</a>
            <div class="relative group cursor-pointer">
                <button class="nav-link flex items-center gap-1 cursor-pointer">
                    Destination
                    <i class="fa-solid fa-chevron-down text-[10px] mt-1"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white shadow-xl rounded-lg p-4 w-48 border border-gray-100">
                    <a href="#" class="block py-2 hover:text-brand-blue">Sajek Valley</a>
                    <a href="#" class="block py-2 hover:text-brand-blue">Cox's Bazar</a>
                </div>
            </div>
            <a href="#" class="nav-link">About Us</a>
            <a href="#" class="nav-link">Blogs</a>
            <a href="#" class="nav-link">Hotels</a>
        </nav>

        <!-- Right Side Button -->
        <div class="flex items-center gap-4">
            <a href="#"
                class="hidden md:flex bg-brand-blue text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition">
                Get In Touch
            </a>
            <button id="menu-toggle" class="lg:hidden text-gray-800 text-2xl">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
        </div>
    </div>

    <!-- MOBILE DRAWER -->
    <div id="mobile-drawer" class="fixed inset-0 z-[60] lg:hidden translate-x-full transition-transform duration-300">
        <div id="drawer-overlay" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
        <div class="absolute right-0 top-0 h-full w-[280px] bg-white p-8 shadow-2xl flex flex-col">
            <div class="flex justify-between items-center mb-10">
                <span class="font-bold text-xl text-brand-blue">Menu</span>
                <button id="close-drawer" class="text-gray-500 text-2xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="flex flex-col space-y-6 cursor-pointer">
                <a href="#" class="nav-link active-link text-lg">Home</a>
                <a href="#" class="nav-link text-lg border-b border-gray-50 pb-2 cursor-pointer">Destination</a>
                <a href="#" class="nav-link text-lg border-b border-gray-50 pb-2">About Us</a>
                <a href="#" class="nav-link text-lg border-b border-gray-50 pb-2">Blogs</a>
                <a href="#" class="nav-link text-lg border-b border-gray-50 pb-2">Hotels</a>
                <div class="pt-6">
                    <a href="#"
                        class="w-full inline-block text-center bg-brand-blue text-white py-3 rounded-lg font-bold">Get
                        In Touch</a>
                </div>
            </div>
        </div>
    </div>
</header>
