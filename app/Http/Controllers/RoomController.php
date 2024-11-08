<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Http\Requests\StoreroomRequest;
use App\Http\Requests\UpdateroomRequest;

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
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreroomRequest $request)
    {
        //
        Room::create($request->validated());
           
        return redirect()->route('rooms.index')
                         ->with('success', 'Room sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(room $room)
    {
        //
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        //
        dd($room->user_room);
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
