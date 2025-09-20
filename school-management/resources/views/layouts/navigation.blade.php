<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center shadow-md">
                            <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
                        </div>
                        <span class="font-bold text-2xl text-white hidden md:block">SchoolMS</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ml-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="inline-flex items-center px-4 py-3 text-sm font-medium rounded-lg transition duration-300 ease-in-out text-white hover:bg-white/20 {{ request()->routeIs('dashboard') ? 'bg-white/20' : '' }}">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <!-- Students Dropdown -->
                    <div class="relative" x-data="{ studentOpen: false }" @mouseenter="studentOpen = true" @mouseleave="studentOpen = false">
                        <button 
                            class="inline-flex items-center px-4 py-3 text-sm font-medium rounded-lg transition duration-300 ease-in-out text-white hover:bg-white/20">
                            <i class="fas fa-user-graduate mr-2"></i>
                            {{ __('Students') }}
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="studentOpen" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-56 rounded-xl shadow-xl py-2 bg-white ring-1 ring-black ring-opacity-5"
                            x-cloak>
                            <a href="{{ route('students.create') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-user-plus mr-3 text-blue-500"></i>
                                    {{ __('Add Student') }}
                                </div>
                            </a>
                            <a href="{{ route('students.index') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-3 text-blue-500"></i>
                                    {{ __('All Students') }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Teachers Dropdown -->
                    <div class="relative" x-data="{ teacherOpen: false }" @mouseenter="teacherOpen = true" @mouseleave="teacherOpen = false">
                        <button 
                            class="inline-flex items-center px-4 py-3 text-sm font-medium rounded-lg transition duration-300 ease-in-out text-white hover:bg-white/20">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            {{ __('Teachers') }}
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="teacherOpen" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-56 rounded-xl shadow-xl py-2 bg-white ring-1 ring-black ring-opacity-5"
                            x-cloak>
                            <a href="{{ route('teachers.create') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-green-50 hover:text-green-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-user-plus mr-3 text-green-500"></i>
                                    {{ __('Add Teacher') }}
                                </div>
                            </a>
                            <a href="{{ route('teachers.index') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-green-50 hover:text-green-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-list mr-3 text-green-500"></i>
                                    {{ __('All Teachers') }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Courses Dropdown -->
                    <div class="relative" x-data="{ courseOpen: false }" @mouseenter="courseOpen = true" @mouseleave="courseOpen = false">
                        <button 
                            class="inline-flex items-center px-4 py-3 text-sm font-medium rounded-lg transition duration-300 ease-in-out text-white hover:bg-white/20">
                            <i class="fas fa-book mr-2"></i>
                            {{ __('Courses') }}
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="courseOpen" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-56 rounded-xl shadow-xl py-2 bg-white ring-1 ring-black ring-opacity-5"
                            x-cloak>
                            <a href="{{ route('courses.create') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-book-medical mr-3 text-purple-500"></i>
                                    {{ __('Add Course') }}
                                </div>
                            </a>
                            <a href="{{ route('courses.index') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-book-open mr-3 text-purple-500"></i>
                                    {{ __('All Courses') }}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Grades Dropdown -->
                    <div class="relative" x-data="{ gradeOpen: false }" @mouseenter="gradeOpen = true" @mouseleave="gradeOpen = false">
                        <button 
                            class="inline-flex items-center px-4 py-3 text-sm font-medium rounded-lg transition duration-300 ease-in-out text-white hover:bg-white/20">
                            <i class="fas fa-chart-line mr-2"></i>
                            {{ __('Grades') }}
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="gradeOpen" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-56 rounded-xl shadow-xl py-2 bg-white ring-1 ring-black ring-opacity-5"
                            x-cloak>
                            <a href="{{ route('grades.create') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-plus-circle mr-3 text-yellow-500"></i>
                                    {{ __('Add Grade') }}
                                </div>
                            </a>
                            <a href="{{ route('grades.index') }}" 
                               class="block px-5 py-3 text-sm leading-5 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700 transition duration-150 ease-in-out rounded-lg mx-2">
                                <div class="flex items-center">
                                    <i class="fas fa-list-alt mr-3 text-yellow-500"></i>
                                    {{ __('All Grades') }}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown and Logout Button -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <!-- User Profile Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-3 border border-transparent text-sm leading-4 font-medium rounded-lg text-white bg-white/20 hover:bg-white/30 focus:outline-none transition ease-in-out duration-150">
                                <div class="h-8 w-8 rounded-full bg-white flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div class="hidden md:block">{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                <i class="fas fa-user-cog mr-2"></i>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex items-center text-red-600 hover:text-red-700">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}"
                            class="text-white hover:text-gray-200 text-sm font-medium px-4 py-2 rounded-lg hover:bg-white/20 transition duration-300">
                            {{ __('Log in') }}
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-white text-blue-600 hover:bg-gray-100 px-4 py-2 rounded-lg text-sm font-medium transition duration-300">
                                {{ __('Register') }}
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-white/20 focus:outline-none focus:bg-white/20 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-blue-500/10">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center">
                <i class="fas fa-tachometer-alt mr-3"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <div class="pl-4">
                <div class="font-medium text-base text-white pt-3 pb-1 flex items-center">
                    <i class="fas fa-user-graduate mr-2"></i>
                    {{ __('Students') }}
                </div>
                <x-responsive-nav-link :href="route('students.create')" :active="request()->routeIs('students.create')" class="pl-10 flex items-center">
                    <i class="fas fa-user-plus mr-3"></i>
                    {{ __('Add Student') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')" class="pl-10 flex items-center">
                    <i class="fas fa-users mr-3"></i>
                    {{ __('All Students') }}
                </x-responsive-nav-link>
            </div>

            <div class="pl-4">
                <div class="font-medium text-base text-white pt-3 pb-1 flex items-center">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>
                    {{ __('Teachers') }}
                </div>
                <x-responsive-nav-link :href="route('teachers.create')" :active="request()->routeIs('teachers.create')" class="pl-10 flex items-center">
                    <i class="fas fa-user-plus mr-3"></i>
                    {{ __('Add Teacher') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('teachers.index')" :active="request()->routeIs('teachers.index')" class="pl-10 flex items-center">
                    <i class="fas fa-list mr-3"></i>
                    {{ __('All Teachers') }}
                </x-responsive-nav-link>
            </div>

            <div class="pl-4">
                <div class="font-medium text-base text-white pt-3 pb-1 flex items-center">
                    <i class="fas fa-book mr-2"></i>
                    {{ __('Courses') }}
                </div>
                <x-responsive-nav-link :href="route('courses.create')" :active="request()->routeIs('courses.create')" class="pl-10 flex items-center">
                    <i class="fas fa-book-medical mr-3"></i>
                    {{ __('Add Course') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.index')" class="pl-10 flex items-center">
                    <i class="fas fa-book-open mr-3"></i>
                    {{ __('All Courses') }}
                </x-responsive-nav-link>
            </div>

            <div class="pl-4">
                <div class="font-medium text-base text-white pt-3 pb-1 flex items-center">
                    <i class="fas fa-chart-line mr-2"></i>
                    {{ __('Grades') }}
                </div>
                <x-responsive-nav-link :href="route('grades.create')" :active="request()->routeIs('grades.create')" class="pl-10 flex items-center">
                    <i class="fas fa-plus-circle mr-3"></i>
                    {{ __('Add Grade') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('grades.index')" :active="request()->routeIs('grades.index')" class="pl-10 flex items-center">
                    <i class="fas fa-list-alt mr-3"></i>
                    {{ __('All Grades') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/20 bg-blue-600">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-white flex items-center">
                        <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            {{ Auth::user()->name }}
                            <div class="font-medium text-sm text-white/80">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 px-4">
                    <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
                        <i class="fas fa-user-cog mr-3"></i>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="flex items-center text-red-300 hover:text-red-100">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 py-2">
                    <a href="{{ route('login') }}"
                        class="block w-full text-left px-4 py-3 text-base font-medium text-white hover:text-white hover:bg-white/20 rounded-lg">
                        <i class="fas fa-sign-in-alt mr-3"></i>
                        {{ __('Log in') }}
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-full text-left px-4 py-3 text-base font-medium text-white hover:text-white hover:bg-white/20 rounded-lg mt-2">
                            <i class="fas fa-user-plus mr-3"></i>
                            {{ __('Register') }}
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>