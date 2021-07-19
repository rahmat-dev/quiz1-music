<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
  use HasFactory;

  protected $primaryKey = 'artist_id';
  protected $fillable = ['artist_name'];

  public function get_album()
  {
    return $this->hasMany(Album::class, 'artist_id', 'artist_id');
  }

  public function get_track()
  {
    return $this->hasMany(Track::class, 'artist_id', 'artist_id');
  }
}
