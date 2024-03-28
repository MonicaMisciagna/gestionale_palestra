<x-app-layout>
   
    <div class="container mx-auto py-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                @if ($bookings->isEmpty())
                    <p class="text-gray-600 dark:text-gray-300">Non hai ancora effettuato nessuna prenotazione.</p>
                @else
                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach ($bookings as $booking)
                            <li class="py-4">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $booking->course->name }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $booking->time }}</p>
                                    </div>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 focus:outline-none">Cancella</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $bookings->links() }} 
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
