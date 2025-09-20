                                            Name</label>
                                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                                {{ $student->parent_name ?? 'N/A' }}</p>
                                            </div>

                                            <div>
                                                <label
                                                    class="block text-sm font-medium text-gray-500 dark:text-gray-400">Parent
                                                    Phone</label>
                                                <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                                    {{ $student->parent_phone ?? 'N/A' }}</p>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>

                                            <!-- Grades Section -->
                                            <div class="mt-8">
                                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                                    Academic Grades</h3>

                                                @if ($student->grades->count() > 0)
                                                    <div class="overflow-x-auto rounded-lg shadow">
                                                        <table
                                                            class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                            <thead class="bg-gray-50 dark:bg-gray-700">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                                        Course</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                                        Grade</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                                        Marks</th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                                        Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody
                                                                class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                                                @foreach ($student->grades as $grade)
                                                                    <tr>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                                            {{ $grade->course->name }}</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                                            {{ $grade->grade }}</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                                            {{ $grade->marks ?? 'N/A' }}</td>
                                                                        <td
                                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                                            {{ $grade->date->format('F j, Y') }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                                        <i class="fas fa-clipboard-list text-4xl mb-4"></i>
                                                        <p>No grades recorded for this student yet.</p>
                                                    </div>
                                                @endif
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>

                                            <!-- Fullscreen Image Modal -->
                                            <div id="fullscreenModal"
                                                class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center p-4">
                                                <div class="relative max-w-6xl max-h-full">
                                                    <img id="fullscreenImage" src="" alt="Fullscreen image"
                                                        class="max-w-full max-h-full object-contain">
                                                    <button onclick="closeFullscreenImage()"
                                                        class="absolute top-4 right-4 text-white text-3xl bg-black bg-opacity-50 rounded-full w-10 h-10 flex items-center justify-center hover:bg-opacity-75 transition-all">
                                                        &times;
                                                    </button>
                                                </div>
                                            </div>

                                            <script>
                                                function openFullscreenImage(imageSrc) {
                                                    document.getElementById('fullscreenImage').src = imageSrc;
                                                    document.getElementById('fullscreenModal').classList.remove('hidden');
                                                    document.body.classList.add('overflow-hidden');
                                                }

                                                function closeFullscreenImage() {
                                                    document.getElementById('fullscreenModal').classList.add('hidden');
                                                    document.body.classList.remove('overflow-hidden');
                                                }

                                                // Close modal when clicking outside the image
                                                document.getElementById('fullscreenModal').addEventListener('click', function(e) {
                                                    if (e.target === this) {
                                                        closeFullscreenImage();
                                                    }
                                                });

                                                // Close modal with Escape key
                                                document.addEventListener('keydown', function(e) {
                                                    if (e.key === 'Escape') {
                                                        closeFullscreenImage();
                                                    }
                                                });
                                            </script>
                                        @endsection
