<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tracks = Track::all();
    return view('track.index', compact('tracks'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $artists = Artist::all();
    $albums = Album::all();
    return view('track.create', compact(['artists', 'albums']));
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
      'track_name' => 'required',
      'artist_id' => 'required',
      'album_id' => 'required',
      'time' => 'required'
    ], [
      'track_name.required' => 'Judul lagu harus diisi',
      'artist_id.required' => 'Mohon pilih artis',
      'album_id.required' => 'Mohon pilih album',
      'time.required' => 'Durasi harus diisi'
    ]);

    Track::create($validatedData);
    return redirect(route('track.index'));
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
    $track = Track::findOrFail($id);
    $artists = Artist::all();
    $albums = Album::all();
    return view('track.edit', compact(['track', 'artists', 'albums']));
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
      'track_name' => 'required',
      'artist_id' => 'required',
      'album_id' => 'required',
      'time' => 'required'
    ], [
      'track_name.required' => 'Judul lagu harus diisi',
      'artist_id.required' => 'Mohon pilih artis',
      'album_id.required' => 'Mohon pilih album',
      'time.required' => 'Durasi harus diisi'
    ]);

    $track = Track::findOrFail($id);
    $track->update($validatedData);
    return redirect(route('track.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $track = Track::findOrFail($id);
    $track->delete();
    return redirect(route('track.index'));
  }
}
