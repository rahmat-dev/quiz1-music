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
  <form method="POST" action="{{route('track.store')}}">
    @csrf
    <div class="mb-3">
      <label for="track_name" class="form-label">Judul Lagu</label>
      <input type="text" class="form-control" id="track_name" name="track_name" value="{{old('track_name')}}">
    </div>
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
      <label for="time" class="form-label">Durasi</label>
      <input type="text" class="form-control" id="time" name="time" value="{{old('time')}}">
      <div id="timeHelp" class="form-text">Misal 2 menit 53 detik, mohon input 2.53</div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>
@endsection