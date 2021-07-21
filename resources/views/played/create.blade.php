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
  <form method="POST" action="{{route('played.store')}}">
    @csrf
    <div class="mb-3">
      <label for="artist_id" class="form-label">Nama Artis</label>
      <select class="form-select" aria-label="Default select example" id="artist_id" name="artist_id">
        <option selected value="">- Pilih Artis -</option>
        @foreach ($artists as $artist)
        <option {{old('artist_id') == $artist->artist_id ? 'selected' : null}} value="{{$artist->artist_id}}">
          {{$artist->artist_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="album_id" class="form-label">Nama Album</label>
      <select class="form-select" aria-label="Default select example" id="album_id" name="album_id">
        <option selected value="">- Pilih Album -</option>
        @foreach ($albums as $album)
        <option {{old('album_id') == $album->album_id ? 'selected' : null}} value="{{$album->album_id}}">
          {{$album->album_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="track_id" class="form-label">Judul Lagu</label>
      <select class="form-select" aria-label="Default select example" id="track_id" name="track_id">
        <option selected value="">- Pilih Judul Lagu -</option>
        @foreach ($tracks as $track)
        <option {{old('track_id') == $track->track_id ? 'selected' : null}} value="{{$track->track_id}}">
          {{$track->track_name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>
@endsection