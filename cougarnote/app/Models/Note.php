<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Note extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'body'];

  /**
   * Get the user who created this note.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the folder for this note.
   */
  public function folder(): HasOne
  {
    return $this->hasOne(Folder::class);
  }
}
