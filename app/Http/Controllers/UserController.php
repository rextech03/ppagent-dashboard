<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use App\Models\room;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(5);
          
        return view('users.index', compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'room_no' => ['required'],
            'phone_no' => ['required'],
            'rent_start_date' => ['required'],
            'rent_end_date' => ['required'],
            'about' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'room_no' => $request['room_no'],
            'phone_no' => $request['phone_no'],
            'rent_start_date' => $request['rent_start_date'],
            'rent_end_date' => $request['rent_end_date'],
            'about' => $request['about'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
        return view('users.show', compact('user'));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function profile()
    {
        //
        $rooms = room::all();
        $user = User::where('id', Auth::id())->first();
        // return dd($rooms);
        return view('profile', compact('user', 'rooms'));
    }

    public function updateProfile(Request $request)
    {
        //
        
        // $request->validate([
        //    'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255'],
        //     'room_no' => ['required'],
        //     // 'phone_no' => ['required'],
        //     // 'rent_start_date' => ['required'],
        //     // 'rent_end_date' => ['required'],
        //     'about' => ['required'],
        //     // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        //   ]);
          
          $user_id = Auth::id();
        //   $post = User::find($user_id);
        
        //   $post->update($request->all());
        $roomdata = room::where('room_no', $request->room_no)->first();;
        $data = User::find($user_id);
        $data->room_no = $request->room_no;
        $data->dues = $roomdata->dues;
        $data->rent = $roomdata->price;
        $data->about = $request->about;

        $roomdata->occupant = $user_id;

        $data->save();

        $roomdata->save();

            
          return redirect()->route('profile')
            ->with('success', 'profile updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'room_no' => ['required'],
            // 'phone_no' => ['required'],
            // 'rent_start_date' => ['required'],
            // 'rent_end_date' => ['required'],
            // 'about' => ['required'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
          $post = User::find($id);
          $post->update($request->all());
          return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
        $user->delete();
           
        return redirect()->route('users.index')
                        ->with('success', 'user account deleted successfully');
    }
}
