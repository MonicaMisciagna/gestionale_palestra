<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 text-gray-300">
        <div>
        
            <h2 class="text-2xl font-semibold mb-4">Utenti Admin</h2>
            <div x-data="{ open: false }" class="border border-gray-300 dark:border-gray-700 shadow-md rounded-md mb-4">
                <button @click="open = !open" class="text-lg font-semibold mb-2 px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none rounded-t-md">Mostra Utenti Admin</button>
                <div x-show="open" class="px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-b-md">
                    <ul>
                        @foreach ($users->where('role', 'admin') as $user)
                            <li>{{ $user->name }} - {{ $user->email }}</li>
                            <form action="{{ route('change_role', ['user' => $user->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="role" value="user">
                                <button type="submit" class="text-blue-600 hover:text-blue-800 focus:outline-none">Cambia in User</button>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>

          
            <h2 class="text-2xl font-semibold mb-4">Utenti User</h2>
            <div x-data="{ open: false }" class="border border-gray-300 dark:border-gray-700 shadow-md rounded-md mb-4">
                <button @click="open = !open" class="text-lg font-semibold mb-2 px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none rounded-t-md">Mostra Utenti User</button>
                <div x-show="open" class="px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-b-md">
                    <ul>
                        @foreach ($users->where('role', 'user') as $user)
                            <li>{{ $user->name }} - {{ $user->email }}</li>
                            <form action="{{ route('change_role', ['user' => $user->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="role" value="admin">
                                <button type="submit" class="text-blue-600 hover:text-blue-800 focus:outline-none">Cambia in Admin</button>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-semibold my-4">Corsi</h2>
        <ul>
            @foreach ($courses as $course)
                <li>{{ $course->name }} - {{ $course->description }}</li>
            @endforeach
        </ul>

       
        <h2 class="text-2xl font-semibold my-4">Prenotazioni</h2>
<div>
    
    <div x-data="{ open: false }" class="border border-gray-300 dark:border-gray-700 shadow-md rounded-md mb-4">
        <button @click="open = !open" class="accordion-header text-lg font-semibold px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none rounded-t-md">Booking Pending</button>
        <div x-show="open" class="accordion-content px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-b-md">
            @foreach($bookings as $booking)
                @if($booking->status === 'pending')
                    <div class="booking-info">
                        <p>Booking ID: {{ $booking->id }}</p>
                        <p>User: {{ $booking->user->name }}</p>
                        
                        <form action="{{ route('change_status', ['booking' => $booking->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="confirmed" class="text-green-600 hover:text-green-800 focus:outline-none">Conferma</button>
                            <button type="submit" name="status" value="rejected" class="text-red-600 hover:text-red-800 focus:outline-none">Rifiuta</button>
                        </form>

                       
                        <form action="{{ route('bookings.destroy', ['booking' => $booking->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Cancella prenotazione</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <div x-data="{ open: false }" class="border border-gray-300 dark:border-gray-700 shadow-md rounded-md mb-4">
        <button @click="open = !open" class="accordion-header text-lg font-semibold px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none rounded-t-md">Booking Confermati</button>
        <div x-show="open" class="accordion-content px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-b-md">
            @foreach($bookings as $booking)
                @if($booking->status === 'confirmed')
                    <div class="booking-info">
                        <p>Booking ID: {{ $booking->id }}</p>
                        <p>User: {{ $booking->user->name }}</p>
                        
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <div x-data="{ open: false }" class="border border-gray-300 dark:border-gray-700 shadow-md rounded-md mb-4">
        <button @click="open = !open" class="accordion-header text-lg font-semibold px-4 py-2 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none rounded-t-md">Booking Rifiutati</button>
        <div x-show="open" class="accordion-content px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-b-md">
            @foreach($bookings as $booking)
                @if($booking->status === 'rejected')
                    <div class="booking-info">
                        <p>Booking ID: {{ $booking->id }}</p>
                        <p>User: {{ $booking->user->name }}</p>
                       
                @endif
            @endforeach
        </div>
    </div>
</div>
    </div>
</x-app-layout>
