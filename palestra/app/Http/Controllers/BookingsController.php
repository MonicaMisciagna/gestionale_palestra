<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingsRequest;
use App\Http\Requests\UpdateBookingsRequest;
use App\Models\Bookings;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $course = Courses::findOrFail($id);
        return view('create_booking', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingsRequest $request)
    { $validatedData = $request->validated();
         $booking = new Bookings(); 
         $booking->user_id = auth()->id();
         $booking->course_id = $request->course_id;
         $booking->time = $request->time;
         $booking->save();
      return redirect()->route('dashboard')->with('success', 'Prenotazione creata con successo.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Bookings $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookings $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingsRequest $request, Bookings $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $booking)
    {  
         $booking->delete();
       return redirect()->route('user.bookings')->with('success', 'Prenotazione cancellata con successo.');
    }
    public function userBookings()
{
    $user = auth()->user();
    $bookings = $user->bookings()->orderBy('created_at', 'desc')->paginate(10); 
    return view('user_bookings', compact('bookings'));
}
public function changeStatus(Request $request, Bookings $booking)
{
    $validatedData = $request->validate([
        'status' => ['required', Rule::in(['confirmed', 'rejected'])],
    ]);

    $booking->status = $validatedData['status'];
    $booking->save();

    return redirect()->back()->with('success', 'Stato della prenotazione aggiornato con successo.');
}
public function changeRole(Request $request, User $user)
{
    $validatedData = $request->validate([
        'role' => ['required', Rule::in(['admin', 'user'])],
    ]);

    $user->role = $validatedData['role'];
    $user->save();

    return redirect()->back()->with('success', 'Ruolo utente aggiornato con successo.');
}

}
