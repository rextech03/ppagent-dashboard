<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\User;

class HostelLocationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $locations = Location::all();
    return view('locations.index', compact('locations'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'hostel_location' => 'required|max:255',
      'supervisor' => 'required|max:255',
    ]);
    Location::create($request->all());
    return redirect()->route('locations.index')
      ->with('success', 'Location created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'hostel_location' => 'required|max:255',
      
    ]);
    $location = Location::find($id);
    $location->update($request->all());
    return redirect()->route('locations.index')
      ->with('success', 'Locations updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $location = Location::find($id);
    $location->delete();
    return redirect()->route('locations.index')
      ->with('success', 'Location deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    return view('locations.create', compact('users'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $location = Location::find($id);

    $supervisor = $location->location_supervisor;
    return view('locations.show', compact('location', 'supervisor'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $location = Location::find($id);
    $users = User::all();
    return view('locations.edit', compact('location', 'users'));
  }
}