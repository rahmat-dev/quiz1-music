<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $albums = Album::all();
    return view('album.index', compact('albums'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $artists = Artist::all();
    return view('album.create', compact('artists'));
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
      'artist_id' => 'required',
      'album_name' => 'required'
    ], [
      'artist_id.required' => 'Mohon pilih artis',
      'album_name.required' => 'Nama album harus diisi'
    ]);

    Album::create($validatedData);
    return redirect(route('album.index'));
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
    $artists = Artist::all();
    $album = Album::findOrFail($id);
    return view('album.edit', compact(['album', 'artists']));
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
      'artist_id' => 'required',
      'album_name' => 'required'
    ], [
      'artist_id.required' => 'Mohon pilih artis',
      'album_name.required' => 'Nama album harus diisi'
    ]);

    $album = Album::findOrFail($id);
    $album->update($validatedData);
    return redirect(route('album.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $album = Album::findOrFail($id);
    $album->delete();
    return redirect(route('album.index'));
  }
}
