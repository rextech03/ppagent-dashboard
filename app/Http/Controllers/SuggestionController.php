<?php

namespace App\Http\Controllers;

use App\Models\suggestion;
use App\Http\Requests\StoresuggestionRequest;
use App\Http\Requests\UpdatesuggestionRequest;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suggestions = Suggestion::latest()->paginate(5);
          
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
        Suggestion::create($request->validated());
           
        return redirect()->route('suggestions.index')
                         ->with('success', 'Suggestion sent successfully.');
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
