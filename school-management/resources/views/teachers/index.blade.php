<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Teachers') }}
            </h2>
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-300 transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i> Add Teacher
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Search and Filter Section -->
                    <div class="flex flex-col md:flex-row justify-between mb-6 space-y-4 md:space-y-0">
                        <div class="relative">
                            <input type="text" placeholder="Search teachers..." class="pl-10 pr-4 py-2 border rounded-lg w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        
                        <div class="flex space-x-2">
                            <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option>All Subjects</option>
                                <option>Mathematics</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                <option>English</option>
                            </select>
                            
                            <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option>All Departments</option>
                                <option>Science</option>
                                <option>Arts</option>
                                <option>Commerce</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Teachers Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Teacher Card 1 -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-on-scroll">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-16 h-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Dr. James Wilson">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Dr. James Wilson</h3>
                                        <p class="text-gray-600 dark:text-gray-300">Mathematics</p>
                                        <div class="flex items-center mt-1">
                                            <span class="text-yellow-500">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-gray-600 dark:text-gray-300 text-sm ml-1">4.8 (120 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Classes</span>
                                        <span>Class 9, 10, 11</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Department</span>
                                        <span>Science</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                        <span>Email</span>
                                        <span class="text-blue-600 dark:text-blue-400">j.wilson@school.edu</span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex justify-between">
                                    <button class="px-4 py-2 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="px-4 py-2 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Teacher Card 2 -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-on-scroll">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-16 h-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Dr. Sarah Johnson">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Dr. Sarah Johnson</h3>
                                        <p class="text-gray-600 dark:text-gray-300">Physics</p>
                                        <div class="flex items-center mt-1">
                                            <span class="text-yellow-500">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-gray-600 dark:text-gray-300 text-sm ml-1">4.9 (98 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Classes</span>
                                        <span>Class 11, 12</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Department</span>
                                        <span>Science</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                        <span>Email</span>
                                        <span class="text-blue-600 dark:text-blue-400">s.johnson@school.edu</span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex justify-between">
                                    <button class="px-4 py-2 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="px-4 py-2 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Teacher Card 3 -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-on-scroll">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-16 h-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Mr. Robert Chen">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mr. Robert Chen</h3>
                                        <p class="text-gray-600 dark:text-gray-300">Chemistry</p>
                                        <div class="flex items-center mt-1">
                                            <span class="text-yellow-500">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-gray-600 dark:text-gray-300 text-sm ml-1">4.7 (85 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Classes</span>
                                        <span>Class 9, 10</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Department</span>
                                        <span>Science</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                        <span>Email</span>
                                        <span class="text-blue-600 dark:text-blue-400">r.chen@school.edu</span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex justify-between">
                                    <button class="px-4 py-2 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="px-4 py-2 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Teacher Card 4 -->
                        <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-on-scroll">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-16 h-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="Ms. Emily Davis">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ms. Emily Davis</h3>
                                        <p class="text-gray-600 dark:text-gray-300">English</p>
                                        <div class="flex items-center mt-1">
                                            <span class="text-yellow-500">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="text-gray-600 dark:text-gray-300 text-sm ml-1">4.6 (112 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Classes</span>
                                        <span>Class 8, 9, 10</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                        <span>Department</span>
                                        <span>Arts</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300">
                                        <span>Email</span>
                                        <span class="text-blue-600 dark:text-blue-400">e.davis@school.edu</span>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex justify-between">
                                    <button class="px-4 py-2 bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-200">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </button>
                                    <button class="px-4 py-2 bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition duration-200">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </button>
                                    <button class="px-4 py-2 bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition duration-200">
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-8 flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">18</span> results
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                                Previous
                            </button>
                            <button class="px-3 py-1 rounded-md bg-green-600 text-white hover:bg-green-700 transition duration-200">
                                1
                            </button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                                2
                            </button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                                3
                            </button>
                            <button class="px-3 py-1 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>