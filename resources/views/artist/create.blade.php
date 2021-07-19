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
  <form method="POST" action="{{route('artist.store')}}">
    @csrf
    <div class="mb-3">
      <label for="artist_name" class="form-label">Nama Artis</label>
      <input type="text" class="form-control" id="artist_name" name="artist_name" value="{{old('artist_name')}}">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>
@endsection