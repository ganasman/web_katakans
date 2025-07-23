<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katak Studio</title>
    
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
        .search-container {
            position: relative;
        }
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
            max-height: 200px;
            overflow-y: auto;
            z-index: 50;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .search-result-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            border-bottom: 1px solid #f3f4f6;
        }
        .search-result-item:hover {
            background-color: #f9fafb;
        }
        .search-result-item:last-child {
            border-bottom: none;
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
                        <div class="w-12 h-12 flex items-center justify-center mr-2">
                            <img src="Images/logo_kodok1.png" alt="Logo Katak Studio">
                        </div>
                        <span class="text-xl font-bold text-gray-900">Katak Studio</span>
                    </div>
                </div>

                <!-- Search Bar (Desktop) -->
                <div class="hidden lg:block flex-1 max-w-lg mx-8">
                    <div class="search-container">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="searchInput"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500" 
                                placeholder="Search products, services..."
                                oninput="handleSearch(this.value)"
                                onfocus="showSearchResults()"
                            >
                        </div>
                        <!-- Search Results Dropdown -->
                        <div id="searchResults" class="search-results hidden">
                            <div class="search-result-item">
                                <div class="font-medium text-gray-900">Garden Design Services</div>
                                <div class="text-sm text-gray-500">Professional landscape design</div>
                            </div>
                            <div class="search-result-item">
                                <div class="font-medium text-gray-900">Topiary Plants</div>
                                <div class="text-sm text-gray-500">Custom shaped garden plants</div>
                            </div>
                            <div class="search-result-item">
                                <div class="font-medium text-gray-900">Garden Maintenance</div>
                                <div class="text-sm text-gray-500">Regular garden care services</div>
                            </div>
                            <div class="search-result-item">
                                <div class="font-medium text-gray-900">Indoor Plants</div>
                                <div class="text-sm text-gray-500">Beautiful plants for your home</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="nav-link font-semibold text-green-600">Home</a>
                        <a href="#" class="nav-link">About</a>
                        <a href="#" class="nav-link">Portfolio</a>
                        <a href="#" class="nav-link">Products</a>
                        <a href="#" class="nav-link">Blog</a>
                        <a href="#" class="nav-link">Contact</a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-4">
                    <!-- Search Icon for Mobile -->
                    <button onclick="toggleMobileSearch()" class="lg:hidden text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Authentication Buttons -->
                    <div class="flex items-center space-x-2">
                        <!-- User is logged in (simulate with hidden class) -->
                        <div id="loggedInSection" class="relative hidden">
                            <button onclick="toggleDropdown()" class="btn-primary flex items-center space-x-2">
                                <span>John Doe</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <button onclick="logout()" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </div>
                        </div>

                        <!-- Guest Section (Default visible) -->
                        <div id="guestSection" class="flex items-center space-x-2">
                            <a href="#" onclick="showLoginForm()" class="btn-outline">Login</a>
                            <a href="#" onclick="showSignupForm()" class="btn-primary">Sign Up</a>
                        </div>
                    </div>

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

            <!-- Mobile Search Bar -->
            <div id="mobileSearch" class="hidden lg:hidden px-4 pb-4">
                <div class="search-container">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="mobileSearchInput"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500" 
                            placeholder="Search products, services..."
                            oninput="handleSearch(this.value)"
                        >
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobileMenu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#" class="nav-link block font-semibold text-green-600">Home</a>
                    <a href="#" class="nav-link block">About</a>
                    <a href="#" class="nav-link block">Portfolio</a>
                    <a href="#" class="nav-link block">Products</a>
                    <a href="#" class="nav-link block">Blog</a>
                    <a href="#" class="nav-link block">Contact</a>
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        <div class="flex items-center px-3 space-x-3">
                            <button onclick="showLoginForm()" class="btn-outline w-full">Login</button>
                            <button onclick="showSignupForm()" class="btn-primary w-full">Sign Up</button>
                        </div>
                    </div>
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

    <!-- Login Modal -->
    <div id="loginModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Login to Katak Studio</h3>
                    <button onclick="closeModal('loginModal')" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form onsubmit="handleLogin(event)">
                    <div class="mb-4">
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="loginEmail" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="loginPassword" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="btn-primary w-full">Login</button>
                    </div>
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Don't have an account? 
                        <a href="#" onclick="showSignupForm(); closeModal('loginModal')" class="text-green-600 hover:text-green-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div id="signupModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Join Katak Studio</h3>
                    <button onclick="closeModal('signupModal')" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form onsubmit="handleSignup(event)">
                    <div class="mb-4">
                        <label for="signupName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="signupName" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="signupEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="signupEmail" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="signupPassword" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="signupPassword" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="btn-primary w-full">Sign Up</button>
                    </div>
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="#" onclick="showLoginForm(); closeModal('signupModal')" class="text-green-600 hover:text-green-500">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Search functionality
        function handleSearch(query) {
            console.log('Searching for:', query);
            // Here you would typically make an API call to search your database
            // For now, we'll just show/hide the dropdown based on whether there's a query
            const searchResults = document.getElementById('searchResults');
            if (query.length > 0) {
                searchResults.classList.remove('hidden');
            } else {
                searchResults.classList.add('hidden');
            }
        }

        function showSearchResults() {
            const searchInput = document.getElementById('searchInput');
            const searchResults = document.getElementById('searchResults');
            if (searchInput.value.length > 0) {
                searchResults.classList.remove('hidden');
            }
        }

        function toggleMobileSearch() {
            const mobileSearch = document.getElementById('mobileSearch');
            mobileSearch.classList.toggle('hidden');
        }

        // User authentication functions
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        function showLoginForm() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function showSignupForm() {
            document.getElementById('signupModal').classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function handleLogin(event) {
            event.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            // Simulate login process
            console.log('Login attempt:', { email, password });
            
            // For demo purposes, simulate successful login
            setTimeout(() => {
                alert('Login successful!');
                closeModal('loginModal');
                // Switch to logged in state
                document.getElementById('guestSection').classList.add('hidden');
                document.getElementById('loggedInSection').classList.remove('hidden');
            }, 1000);
        }

        function handleSignup(event) {
            event.preventDefault();
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            
            // Simulate signup process
            console.log('Signup attempt:', { name, email, password });
            
            // For demo purposes, simulate successful signup
            setTimeout(() => {
                alert('Account created successfully!');
                closeModal('signupModal');
                // Switch to logged in state
                document.getElementById('guestSection').classList.add('hidden');
                document.getElementById('loggedInSection').classList.remove('hidden');
            }, 1000);
        }

        function logout() {
            // Simulate logout
            document.getElementById('loggedInSection').classList.add('hidden');
            document.getElementById('guestSection').classList.remove('hidden');
            document.getElementById('userDropdown').classList.add('hidden');
            alert('Logged out successfully!');
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const searchResults = document.getElementById('searchResults');
            const button = event.target.closest('button');
            
            // Close user dropdown
            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleDropdown') === -1) {
                dropdown.classList.add('hidden');
            }

            // Close search results
            if (!event.target.closest('.search-container')) {
                searchResults.classList.add('hidden');
            }
        });

        // Close modals when clicking outside
        window.onclick = function(event) {
            const loginModal = document.getElementById('loginModal');
            const signupModal = document.getElementById('signupModal');
            
            if (event.target === loginModal) {
                closeModal('loginModal');
            }
            if (event.target === signupModal) {
                closeModal('signupModal');
            }
        }
    </script>
</body>
</html>