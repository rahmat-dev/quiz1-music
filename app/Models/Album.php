<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  use HasFactory;

  protected $primaryKey = 'album_id';
  protected $fillable = ['album_name', 'artist_id'];

  public function get_artist()
  {
    return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
  }

  public function get_track()
  {
    return $this->hasMany(Track::class, 'album_id', 'album_id');
  }
}
