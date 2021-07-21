<?php
$no = 1;
?>

@extends('layout.dashboard')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-end" href="{{route('played.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Artis</th>
        <th>Nama Album</th>
        <th>Judul Lagu</th>
        <th>Diputar Terakhir</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($playeds as $played)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$played->get_artist->artist_name}}</td>
        <td>{{$played->get_album->album_name}}</td>
        <td>{{$played->get_track->track_name}}</td>
        <td>{{$played->played}}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">Data kosong.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection