<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Folder extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  /**
   * Get the user who created this folder.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the notes assigned to this folder.
   */
  public function notes(): BelongsToMany
  {
    return $this->belongsToMany(Note::class);
  }
}
