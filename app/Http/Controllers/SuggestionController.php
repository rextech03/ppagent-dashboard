<?php

namespace App\Http\Controllers;

use App\Models\suggestion;
use App\Http\Requests\StoresuggestionRequest;
use App\Http\Requests\UpdatesuggestionRequest;

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
        //
        $function = new FunctionController;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        'email' => 'required',
        'room_no' => 'required',
        'suggestion' => 'required',
        'photos' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 'status' => 422]);
        }

        $imgArray = [];
        if($request->file("photos") != null){
            foreach ($request->file("photos") as $img) {

                $lo = 'uploads/';
                $filename = $function->fileStore($img, $lo);
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
            toast('saved successfully', 'success');
            return redirect()->back();
        }
        toast('Suggestion could not be saved', 'error');
        return redirect()->back();
    
        // $request->validate([
        //     'photos' => 'required|mimes:jpg,png,pdf|max:2048',
        // ]);
    
        // $file = $request->file('photos');
        // $path = $file->store('uploads', 'public');
    
        // $request->file->move(public_path('uploads'), $path);
        // Additional logic (e.g., storing file information in the database)
    
        // return "File uploaded successfully!";
        // Suggestion::create($request->validated());
           
        // return redirect()->route('suggestions.index')
        //                  ->with('success', 'Suggestion sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(suggestion $suggestion)
    {
        //
        // $url = Storage::url("uploads/{$filename}");

        // return view('file.show', ['url' => $url]);

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
