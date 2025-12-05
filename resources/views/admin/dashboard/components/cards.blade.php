<div>
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Task management</h1>

    <!-- Статистика задач -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Всего задач -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium opacity-80">All tasks</p>
                    <p class="text-3xl font-bold mt-2">24</p>
                </div>
                <svg class="w-10 h-10 opacity-50" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>

        <!-- В работе -->
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium opacity-80">In progress</p>
                    <p class="text-3xl font-bold mt-2">8</p>
                </div>
                <svg class="w-10 h-10 opacity-50" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Завершенные -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium opacity-80">Completed</p>
                    <p class="text-3xl font-bold mt-2">12</p>
                </div>
                <svg class="w-10 h-10 opacity-50" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <!-- Просроченные -->
        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium opacity-80">Expired</p>
                    <p class="text-3xl font-bold mt-2">4</p>
                </div>
                <svg class="w-10 h-10 opacity-50" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
