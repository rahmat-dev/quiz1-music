<?php
$no = 1;
?>

@extends('layout.dashboard')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-end" href="{{route('album.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Artis</th>
        <th>Nama Album</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($albums as $album)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$album->get_artist->artist_name}}</td>
        <td>{{$album->album_name}}</td>
        <td class="d-flex">
          <a href="{{route('album.edit', $album)}}" class="btn btn-sm btn-warning me-1">Edit</a>
          <form action="{{route('album.destroy', $album)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="text-center">Data kosong.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection