<?php
$no = 1;
?>

@extends('layout.dashboard')

@section('content')
<div class="my-5">
  <a class="btn btn-sm btn-primary float-end" href="{{route('artist.create')}}">Tambah</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Artis</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($artists as $artist)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$artist->artist_name}}</td>
        <td class="d-flex">
          <a href="{{route('artist.edit', $artist)}}" class="btn btn-sm btn-warning me-1">Edit</a>
          <form action="{{route('artist.destroy', $artist)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="3" class="text-center">Data kosong.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection