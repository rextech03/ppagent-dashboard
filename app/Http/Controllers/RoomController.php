<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\User;
use App\Models\Location;
use App\Http\Requests\StoreroomRequest;
use App\Http\Requests\UpdateroomRequest;
use Illuminate\Http\Request;

use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::latest()->paginate(5);
       
        

        return view('rooms.index', compact('rooms'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locations = Location::all();
        return view('rooms.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        // 'location' => ['required', 'string', 'max:255'],
        // 'room_no' => ['required', 'string', 'max:255'], 
        // 'price' => ['required', 'string', 'max:255'], 
        // 'description' => ['required', 'string', 'max:255'], 
        // 'occupant' => ['required', 'string', 'max:255'], 
        // 'dues' => ['required', 'string', 'max:255'], 
        // ]);
        
        
         $room_location = $request['location'] . ' ' .'Room' . ' ' . $request['room_no'];
        //  dd($room_location);
        Room::create([
           
        'location' => $request['location'],
        'room_no'  => $room_location,
        'price' => $request['price'],
        'description' => $request['description'],
        'occupant' => 1,
        'dues'=> $request['dues'],
        ]);
          
        return redirect()->route('rooms.index')
                         ->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(room $room)
    {
        //
        // $room = Room::find(1);
        $room_owner = $room->occupant;
        $room_occupant = User::find($room->occupant);
        // dd($room_occupant->phone_no);
        return view('rooms.show', compact('room', 'room_occupant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        //
        // dd($room->user_room);
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroomRequest $request, room $room)
    {
        //
        $room->update($request->validated());
          
        return redirect()->route('rooms.index')
                        ->with('success', 'room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room)
    {
        //
        $room->delete();
           
        return redirect()->route('rooms.index')
                        ->with('success', 'room deleted successfully');
    }
}
