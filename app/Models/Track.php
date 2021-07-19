<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
  use HasFactory;

  protected $primaryKey = 'track_id';
  protected $fillable = ['track_name', 'time', 'artist_id', 'album_id'];

  public function get_artist()
  {
    return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
  }

  public function get_album()
  {
    return $this->belongsTo(Album::class, 'album_id', 'album_id');
  }
}
