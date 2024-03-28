<x-app-layout>
    <div class="container mx-auto py-8 dark:text-gray-200">
        <h1 class="text-3xl font-semibold mb-4">Prenota Corso</h1>
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $course->name }}</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">{{ $course->description }}</p>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="sm:flex sm:justify-between sm:items-center">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 sm:w-1/4">Tipo di Formazione</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2">{{ $course->type_of_training }}</dd>
                    </div>
                </dl>
            </div>
        </div>
       
        <div class="mt-8">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nome del corso:</label>
                    <input type="text" id="course" name="course_name" value="{{ $course->name }}" readonly class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="mt-4">
                    <label for="time" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Seleziona appuntamento:</label>
                    <input type="datetime-local" id="time" name="time" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600">
                </div>
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-600 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">Prenota</button>
            </form>
        </div>
    </div>
</x-app-layout>
