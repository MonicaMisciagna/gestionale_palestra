<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-semibold mb-4">Dettagli Corso</h1>
                    <div class="bg-white dark:bg-gray-900 shadow overflow-hidden sm:rounded-lg">
                        <img src="{{ $course->url_image }}" alt="{{ $course->name }}" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">{{ $course->name }}</h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">{{ $course->description }}</p>
                            <dl class="mt-4 divide-y divide-gray-200">
                                <div class="sm:flex sm:justify-between sm:items-center">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 sm:w-1/4">Tipo di allenamento</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 sm:mt-0 sm:col-span-2">{{ $course->type_of_training }}</dd>
                                </div>
                            </dl>
                            <div class="mt-6">
                                <a href="{{ route('bookings.create', ['course_id' => $course->id]) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-800">Prenota Corso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
