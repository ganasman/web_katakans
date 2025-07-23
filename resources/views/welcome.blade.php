<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GreenGardens</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .nav-link {
            @apply text-gray-700 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
        }
        .nav-link:hover {
            background-color: rgba(34, 197, 94, 0.1);
        }
        .btn-primary {
            @apply bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200;
        }
        .btn-outline {
            @apply border border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-6 py-2 rounded-lg font-medium transition-all duration-200;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header/Navigation -->
    <header class="bg-white shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center mr-2">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900">GreenGardens</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="nav-link font-semibold text-green-600">Home</a>
                        <a href="#" class="nav-link">About</a>
                        <a href="#" class="nav-link">Services</a>
                        <a href="#" class="nav-link">Products</a>
                        <a href="#" class="nav-link">Blog</a>
                        <a href="#" class="nav-link">Contact</a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-4">
                    <!-- Search Icon -->
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Currency -->
                    <span class="text-gray-600 text-sm">€</span>

                    <!-- Cart -->
                    <button class="text-gray-500 hover:text-gray-700 relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m2.5-5h5m-5 0v5"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>

                    <!-- Authentication -->
                    @auth
                        <div class="relative">
                            <button onclick="toggleDropdown()" class="btn-primary flex items-center space-x-2">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-outline">Login</a>
                    @endauth

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button onclick="toggleMobileMenu()" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobileMenu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#" class="nav-link block font-semibold text-green-600">Home</a>
                    <a href="#" class="nav-link block">About</a>
                    <a href="#" class="nav-link block">Services</a>
                    <a href="#" class="nav-link block">Products</a>
                    <a href="#" class="nav-link block">Blog</a>
                    <a href="#" class="nav-link block">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-green-50 to-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="space-y-8">
                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            We reflect our 
                            <span class="text-green-600">connection with the natural environment.</span>
                        </h1>
                        
                        <button class="btn-primary text-lg px-8 py-3">
                            Order now
                        </button>
                    </div>

                    <!-- Right Content - Decorative Elements -->
                    <div class="relative">
                        <div class="flex justify-center items-center space-x-8">
                            <!-- Large topiary ball -->
                            <div class="w-48 h-48 bg-green-400 rounded-full relative overflow-hidden shadow-lg">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-300 to-green-500"></div>
                                <!-- Texture pattern -->
                                <div class="absolute inset-0 opacity-30">
                                    <svg width="100%" height="100%" viewBox="0 0 100 100">
                                        <defs>
                                            <pattern id="leaves" patternUnits="userSpaceOnUse" width="10" height="10">
                                                <circle cx="2" cy="2" r="1" fill="rgba(255,255,255,0.3)"/>
                                                <circle cx="8" cy="8" r="1" fill="rgba(255,255,255,0.3)"/>
                                                <circle cx="5" cy="7" r="0.5" fill="rgba(255,255,255,0.2)"/>
                                            </pattern>
                                        </defs>
                                        <rect width="100%" height="100%" fill="url(#leaves)"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Medium topiary ball -->
                            <div class="w-32 h-32 bg-green-500 rounded-full relative overflow-hidden shadow-lg -mt-8">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600"></div>
                                <!-- Texture pattern -->
                                <div class="absolute inset-0 opacity-30">
                                    <svg width="100%" height="100%" viewBox="0 0 100 100">
                                        <rect width="100%" height="100%" fill="url(#leaves)"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JavaScript -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = event.target.closest('button');
            
            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleDropdown') === -1) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>