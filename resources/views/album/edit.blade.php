@extends('layout.dashboard')

@section('content')
<div class="my-5">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="POST" action="{{route('album.update', $album)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="artist_id" class="form-label">Nama Artis</label>
      <select class="form-select" aria-label="Default select example" id="artist_id" name="artist_id">
        <option selected value="">- Pilih Artis -</option>
        @foreach ($artists as $artist)
        <option {{$album->artist_id == $artist->artist_id ? 'selected' : null}} value="{{$artist->artist_id}}">
          {{$artist->artist_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="album_name" class="form-label">Nama Album</label>
      <input type="text" class="form-control" id="album_name" name="album_name" value="{{$album->album_name}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn-secondary" href="{{route('album.index')}}">Batal</a>
  </form>
</div>
@endsection