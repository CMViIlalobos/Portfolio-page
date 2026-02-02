<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxuryEstates | Find Your Dream Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-slate-800" x-data="realEstateApp()">

    <!-- Toast Notification -->
    <div class="fixed top-24 right-5 z-50 transform transition-all duration-300"
         x-show="toast.visible"
         x-transition:enter="translate-x-full opacity-0"
         x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="translate-x-full opacity-0"
         x-cloak>
        <div class="bg-gray-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3">
            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span x-text="toast.message" class="font-medium"></span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed w-full z-40 glass-nav border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2" @click.prevent="view = 'home'">
                        <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">LE</div>
                        <span class="text-2xl font-bold text-gray-900 tracking-tight">Luxury<span class="text-indigo-600">Estates</span></span>
                    </a>
                    <div class="hidden md:flex ml-12 space-x-8">
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition" @click.prevent="filterType('all')">Buy</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition" @click.prevent="filterType('rent')">Rent</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition">Sell</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition">Agents</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="hidden md:block text-gray-600 hover:text-indigo-600 font-medium">Log In</button>
                    <button @click="showAddListing = true" class="bg-indigo-600 text-white px-6 py-2.5 rounded-full font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Add Listing
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <div class="relative h-[85vh] flex items-center justify-center">
            <div class="absolute inset-0 z-0">
                <img src="https://image.pollinations.ai/prompt/luxury%20modern%20villa%20exterior%20pool%20sunset?nologo=true" alt="Hero Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/30 to-transparent"></div>
            </div>

            <div class="relative z-10 w-full max-w-5xl px-4 text-center mt-16">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight drop-shadow-lg">
                    Discover Your <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-white">Perfect Sanctuary</span>
                </h1>
                <p class="text-xl text-gray-200 mb-10 max-w-2xl mx-auto drop-shadow-md">
                    Explore the most exclusive portfolio of luxury properties in the world's most desirable locations.
                </p>

                <!-- Search Bar -->
                <div class="bg-white p-4 rounded-2xl shadow-2xl max-w-4xl mx-auto flex flex-col md:flex-row gap-4 items-center">
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 text-left px-2">Location</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-2 top-1/2 -translate-y-1/2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <input type="text" x-model="searchLocation" placeholder="City, Zip, Neighborhood" class="w-full pl-9 pr-4 py-2 border-b border-gray-200 focus:border-indigo-500 focus:outline-none text-gray-700 font-medium bg-transparent">
                        </div>
                    </div>
                    <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 text-left px-2">Property Type</label>
                        <select x-model="searchType" class="w-full px-2 py-2 border-b border-gray-200 focus:border-indigo-500 focus:outline-none text-gray-700 font-medium bg-transparent cursor-pointer">
                            <option value="">All Types</option>
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Villa">Villa</option>
                            <option value="Penthouse">Penthouse</option>
                        </select>
                    </div>
                    <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                    <div class="flex-1 w-full">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 text-left px-2">Max Price</label>
                        <select x-model="searchPrice" class="w-full px-2 py-2 border-b border-gray-200 focus:border-indigo-500 focus:outline-none text-gray-700 font-medium bg-transparent cursor-pointer">
                            <option value="">Any Price</option>
                            <option value="1000000">$1M</option>
                            <option value="5000000">$5M</option>
                            <option value="10000000">$10M+</option>
                        </select>
                    </div>
                    <button @click="performSearch" class="w-full md:w-auto bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Featured Properties -->
        <section id="properties" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm">Exclusive Listings</span>
                    <h2 class="text-4xl font-bold text-gray-900 mt-2">Featured Properties</h2>
                </div>
                <button @click="resetFilters" class="hidden md:flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">
                    View All Properties 
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="property in filteredProperties" :key="property.id">
                    <div class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer" @click="openProperty(property)">
                        <div class="relative h-72 overflow-hidden">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-900 z-10 uppercase tracking-wide" x-text="property.type"></span>
                            <button @click.stop="toggleFavorite(property)" class="absolute top-4 right-4 bg-black/20 hover:bg-red-500 text-white p-2 rounded-full backdrop-blur transition z-10">
                                <svg class="w-5 h-5" :class="{'fill-current text-red-500': property.isFavorite}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </button>
                            <img :src="property.image" :alt="property.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex justify-between items-center">
                                <span class="text-sm font-medium">Click to View Details</span>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-1" x-text="property.title"></h3>
                                    <p class="text-gray-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span x-text="property.location"></span>
                                    </p>
                                </div>
                                <p class="text-2xl font-bold text-indigo-600" x-text="property.priceDisplay"></p>
                            </div>
                            <div class="flex items-center gap-6 border-t border-gray-100 pt-4 text-gray-600 text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    <span x-text="property.beds + ' Beds'"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span x-text="property.baths + ' Baths'"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                    <span x-text="property.sqft + ' sqft'"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            
            <div x-show="filteredProperties.length === 0" class="text-center py-20" x-cloak>
                <h3 class="text-2xl font-bold text-gray-400">No properties found matching your criteria.</h3>
                <button @click="resetFilters" class="mt-4 text-indigo-600 font-semibold hover:underline">Clear Filters</button>
            </div>
        </section>

        <!-- Map Section -->
        <section class="bg-slate-900 text-white py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
                <div class="flex-1">
                    <span class="text-indigo-400 font-bold tracking-wider uppercase text-sm mb-2 block">Interactive Map</span>
                    <h2 class="text-4xl font-bold mb-6">Explore Properties on the Map</h2>
                    <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                        Use our advanced map search to find properties in your preferred neighborhoods. Filter by schools, amenities, and transit scores.
                    </p>
                    <button @click="showMapModal = true" class="bg-white text-slate-900 px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition shadow-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        Open Full Map
                    </button>
                </div>
                <div class="flex-1 w-full h-96 bg-slate-800 rounded-3xl overflow-hidden relative group cursor-pointer" @click="showMapModal = true">
                    <img src="https://image.pollinations.ai/prompt/google%20maps%20style%20dark%20mode%20city%20map%20interface?nologo=true" alt="Map Interface" class="w-full h-full object-cover opacity-60 group-hover:opacity-80 transition-opacity">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                        <div class="w-4 h-4 bg-indigo-500 rounded-full animate-ping absolute"></div>
                        <div class="w-4 h-4 bg-indigo-500 rounded-full relative border-2 border-white"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Platform Highlights (Static) -->
        <section class="py-24 bg-gray-50">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Platform Highlights</h2>
                <p class="text-xl text-gray-500">A high-performance real estate marketplace allowing agents to list properties and buyers to find their dream homes.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Highlight 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Interactive Map Search</h3>
                    <p class="text-gray-500">Integrated Google Maps API allowing users to search properties by drawing on the map and viewing local amenities.</p>
                </div>

                <!-- Highlight 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">360° Virtual Tours</h3>
                    <p class="text-gray-500">Immersive virtual tour support allowing potential buyers to walk through properties remotely from any device.</p>
                </div>

                <!-- Highlight 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Filtering</h3>
                    <p class="text-gray-500">Granular search filters for Price, Location, Amenities, Property Type, and more to find the exact match.</p>
                </div>

                <!-- Highlight 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Agent Dashboard</h3>
                    <p class="text-gray-500">Comprehensive dashboard for agents to manage listings, track leads, and view performance analytics.</p>
                </div>

                <!-- Highlight 5 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Alerts</h3>
                    <p class="text-gray-500">Users can save searches and get instant notifications when new properties matching their criteria are listed.</p>
                </div>

                <!-- Highlight 6 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">SEO Optimized</h3>
                    <p class="text-gray-500">Fully optimized property pages with meta tags, schema markup, and fast loading speeds for better search rankings.</p>
                </div>
            </div>
        </div>
        </section>
    </main>

    <!-- Property Details Modal -->
    <div x-show="selectedProperty" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="selectedProperty = null"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div x-show="selectedProperty">
                    <div class="relative h-96">
                        <img :src="selectedProperty?.image" class="w-full h-full object-cover">
                        <button @click="selectedProperty = null" class="absolute top-4 right-4 bg-black/50 hover:bg-black/70 text-white rounded-full p-2 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-bold px-2.5 py-0.5 rounded" x-text="selectedProperty?.type"></span>
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-0.5 rounded">Verified</span>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900" x-text="selectedProperty?.title"></h2>
                                <p class="text-gray-500 text-lg flex items-center gap-1 mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span x-text="selectedProperty?.location"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-indigo-600" x-text="selectedProperty?.priceDisplay"></p>
                                <p class="text-gray-400 text-sm">Est. Payment: $14,200/mo</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                            <div class="bg-gray-50 p-4 rounded-xl text-center">
                                <p class="text-gray-400 text-xs uppercase font-bold">Bedrooms</p>
                                <p class="text-xl font-bold text-gray-900" x-text="selectedProperty?.beds"></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl text-center">
                                <p class="text-gray-400 text-xs uppercase font-bold">Bathrooms</p>
                                <p class="text-xl font-bold text-gray-900" x-text="selectedProperty?.baths"></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl text-center">
                                <p class="text-gray-400 text-xs uppercase font-bold">Area</p>
                                <p class="text-xl font-bold text-gray-900" x-text="selectedProperty?.sqft + ' sqft'"></p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-xl text-center">
                                <p class="text-gray-400 text-xs uppercase font-bold">Year Built</p>
                                <p class="text-xl font-bold text-gray-900">2023</p>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Description</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Experience luxury living at its finest in this stunning architectural masterpiece. 
                                Featuring floor-to-ceiling glass walls, smart home integration, and an infinity pool with breathtaking views.
                                The open-concept layout seamlessly blends indoor and outdoor living, perfect for entertaining.
                                Master suite includes a spa-like bathroom and dual walk-in closets.
                            </p>
                        </div>

                        <div class="flex gap-4">
                            <button @click="showContactModal = true; selectedProperty = null" class="flex-1 bg-indigo-600 text-white py-4 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg">
                                Contact Agent
                            </button>
                            <button @click="toggleFavorite(selectedProperty)" class="px-6 border-2 border-gray-200 rounded-xl hover:border-indigo-600 hover:text-indigo-600 transition">
                                <svg class="w-6 h-6" :class="{'fill-current text-red-500': selectedProperty?.isFavorite}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div x-show="showContactModal" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="showContactModal = false"></div>
            <div class="inline-block bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full p-8 relative">
                 <button @click="showContactModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Contact Agent</h3>
                <p class="text-gray-500 mb-6">Fill out the form below to inquire about this property.</p>
                <form @submit.prevent="sendMessage">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="I am interested in this property..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div x-show="showMapModal" class="fixed inset-0 z-50 overflow-hidden" x-cloak>
        <div class="absolute inset-0 bg-slate-900">
             <button @click="showMapModal = false" class="absolute top-6 right-6 z-10 bg-white text-gray-900 px-4 py-2 rounded-lg font-bold shadow-lg hover:bg-gray-100">
                Close Map
            </button>
            <div class="w-full h-full flex items-center justify-center text-white">
                <div class="text-center">
                     <img src="https://image.pollinations.ai/prompt/google%20maps%20style%20dark%20mode%20city%20map%20interface?nologo=true" alt="Map Full" class="w-full h-full absolute inset-0 object-cover opacity-50">
                     <div class="relative z-10">
                        <h2 class="text-3xl font-bold mb-4">Interactive Map Demo</h2>
                        <p>In a real production app, this would integrate with Google Maps or Mapbox API.</p>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">LE</div>
                <span class="text-xl font-bold text-gray-900">Luxury<span class="text-indigo-600">Estates</span></span>
            </div>
            <p class="text-gray-500 text-sm">
                This is a demo project for <a href="{{ route('projects.show', 'real-estate-marketplace') }}" class="text-indigo-600 hover:underline">Carlos Miguel S. Villalobos Portfolio</a>.
            </p>
            <div class="flex gap-4">
                 <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600 transition">Back to Portfolio</a>
            </div>
        </div>
    </footer>

    <script>
        function realEstateApp() {
            return {
                searchLocation: '',
                searchType: '',
                searchPrice: '',
                selectedProperty: null,
                showContactModal: false,
                showMapModal: false,
                showAddListing: false,
                toast: { visible: false, message: '' },
                
                properties: [
                    {
                        id: 1,
                        title: 'The Glass Pavilion',
                        location: 'Beverly Hills, CA',
                        price: 4200000,
                        priceDisplay: '$4.2M',
                        type: 'House',
                        beds: 5,
                        baths: 6,
                        sqft: 4500,
                        image: 'https://image.pollinations.ai/prompt/modern%20glass%20house%20forest%20exterior?nologo=true',
                        isFavorite: false
                    },
                    {
                        id: 2,
                        title: 'Skyline Penthouse',
                        location: 'Manhattan, NY',
                        price: 8500000,
                        priceDisplay: '$8.5M',
                        type: 'Penthouse',
                        beds: 3,
                        baths: 3.5,
                        sqft: 3200,
                        image: 'https://image.pollinations.ai/prompt/modern%20penthouse%20city%20skyline%20view?nologo=true',
                        isFavorite: false
                    },
                    {
                        id: 3,
                        title: 'Oceanfront Villa',
                        location: 'Malibu, CA',
                        price: 35000, // Monthly rent
                        priceDisplay: '$35k/mo',
                        type: 'Villa',
                        beds: 4,
                        baths: 5,
                        sqft: 5200,
                        image: 'https://image.pollinations.ai/prompt/mediterranean%20villa%20ocean%20view?nologo=true',
                        isFavorite: false
                    },
                    {
                        id: 4,
                        title: 'Modern City Loft',
                        location: 'San Francisco, CA',
                        price: 1200000,
                        priceDisplay: '$1.2M',
                        type: 'Apartment',
                        beds: 2,
                        baths: 2,
                        sqft: 1800,
                        image: 'https://image.pollinations.ai/prompt/modern%20industrial%20loft%20interior?nologo=true',
                        isFavorite: false
                    },
                    {
                        id: 5,
                        title: 'Mountain Retreat',
                        location: 'Aspen, CO',
                        price: 5500000,
                        priceDisplay: '$5.5M',
                        type: 'Villa',
                        beds: 6,
                        baths: 5,
                        sqft: 6000,
                        image: 'https://image.pollinations.ai/prompt/luxury%20wooden%20cabin%20snow%20mountain?nologo=true',
                        isFavorite: false
                    },
                    {
                        id: 6,
                        title: 'Seaside Mansion',
                        location: 'Miami, FL',
                        price: 12500000,
                        priceDisplay: '$12.5M',
                        type: 'House',
                        beds: 8,
                        baths: 10,
                        sqft: 9500,
                        image: 'https://image.pollinations.ai/prompt/miami%20modern%20mansion%20palm%20trees?nologo=true',
                        isFavorite: false
                    }
                ],

                get filteredProperties() {
                    return this.properties.filter(p => {
                        const matchLoc = this.searchLocation === '' || p.location.toLowerCase().includes(this.searchLocation.toLowerCase());
                        const matchType = this.searchType === '' || p.type === this.searchType;
                        const matchPrice = this.searchPrice === '' || p.price <= parseInt(this.searchPrice);
                        return matchLoc && matchType && matchPrice;
                    });
                },

                performSearch() {
                    // In a real app, this would fetch data. 
                    // Here we just scroll to results and the computed property handles filtering.
                    document.getElementById('properties').scrollIntoView({ behavior: 'smooth' });
                    this.showToast('Search results updated');
                },

                resetFilters() {
                    this.searchLocation = '';
                    this.searchType = '';
                    this.searchPrice = '';
                    this.showToast('Filters cleared');
                },

                filterType(type) {
                   // Quick filter from nav
                   if(type === 'all') this.searchType = '';
                   else if (type === 'rent') this.searchType = 'Villa'; // Just mapping for demo
                   else this.searchType = 'House';
                   document.getElementById('properties').scrollIntoView({ behavior: 'smooth' });
                },

                openProperty(property) {
                    this.selectedProperty = property;
                },

                toggleFavorite(property) {
                    if (property) {
                        property.isFavorite = !property.isFavorite;
                        this.showToast(property.isFavorite ? 'Added to favorites' : 'Removed from favorites');
                    }
                },

                sendMessage() {
                    this.showContactModal = false;
                    this.showToast('Message sent successfully! An agent will contact you shortly.');
                },

                showToast(message) {
                    this.toast.message = message;
                    this.toast.visible = true;
                    setTimeout(() => {
                        this.toast.visible = false;
                    }, 3000);
                }
            }
        }
    </script>
</body>
</html>
