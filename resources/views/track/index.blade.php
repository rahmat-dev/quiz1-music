<?php
$no = 1;
?>

@extends('layout.dashboard')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-end" href="{{route('track.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Lagu</th>
        <th>Nama Artis</th>
        <th>Nama Album</th>
        <th>Durasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tracks as $track)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$track->track_name}}</td>
        <td>{{$track->get_artist->artist_name}}</td>
        <td>{{$track->get_album->album_name}}</td>
        <td>{{$track->time}}</td>
        <td class="d-flex">
          <a href="{{route('track.edit', $track)}}" class="btn btn-sm btn-warning me-1">Edit</a>
          <form action="{{route('track.destroy', $track)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center">Data kosong.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection