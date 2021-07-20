<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $artists = Artist::all();
    return view('artist.index', compact('artists'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('artist.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'artist_name' => 'required'
    ], [
      'artist_name.required' => 'Nama artis harus diisi'
    ]);

    Artist::create($validatedData);
    return redirect(route('artist.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $artist = Artist::findOrFail($id);
    return view('artist.edit', compact('artist'));
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
    $validatedData = $request->validate([
      'artist_name' => 'required'
    ], [
      'artist_name.required' => 'Nama artis harus diisi'
    ]);

    $artist = Artist::findOrFail($id);
    $artist->update($validatedData);
    return redirect(route('artist.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $artist = Artist::findOrFail($id);
    $artist->delete();
    return redirect(route('artist.index'));
  }
}
