<?php

namespace App\Http\Controllers;

use App\Models\suggestion;
use App\Http\Requests\StoresuggestionRequest;
use App\Http\Requests\UpdatesuggestionRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->email == 'admin@gmail.com') {
            # code...
            $suggestions = Suggestion::latest()->paginate(5);
           
        }else {
            # code...
            $suggestions = Suggestion::where('email', '=', Auth::user()->email)->paginate(5);
        }
        // $suggestions = Suggestion::latest()->paginate(5);
          
        return view('suggestions.index', compact('suggestions'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suggestions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresuggestionRequest $request)
    {

         // validate data
         $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'room_no' => 'required',
            'suggestion' => 'required',
            'file' => 'mimes:png,jpg,jpeg,gif|max:2024'
        ]);

       
        //
        $function = new FunctionController;
 
        $imgArray = [];
        if ($request->file("images") != null) {
        foreach ($request->file("images") as $img) {
            $lo = 'uploads/';
            $filename = $function->fileStore($img, $lo);
            // print($filename);
            array_push($imgArray, $filename);
        }
    }
       

        $event = new Suggestion;
       
        $event->photos = json_encode($imgArray);
        $event->name = $request->name;
      
        $event->email = $request->email;
        $event->room_no = $request->room_no;
        $event->suggestion = $request->suggestion;

        if ($event->save()) {
            
        return  redirect()->route('suggestions.index')
                         ->with('success', 'Suggestion sent successfully.');
        }
        return redirect()->refresh()
                         ->with('success', 'Suggestion could not be sent successfully.');
    


    

    }

    /**
     * Display the specified resource.
     */
    public function show(suggestion $suggestion)
    {
        //
        

        return view('suggestions.show', compact('suggestion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(suggestion $suggestion)
    {
        //
        return view('suggestions.edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesuggestionRequest $request, suggestion $suggestion)
    {
        //
        $suggestion->update($request->validated());
          
        return redirect()->route('suggestions.index')
                        ->with('success', 'Suggestion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(suggestion $suggestion)
    {
        //
        $suggestion->delete();
           
        return redirect()->route('suggestions.index')
                        ->with('success', 'Suggestions deleted successfully');
    }
}
