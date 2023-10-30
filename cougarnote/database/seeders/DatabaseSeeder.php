<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $users = User::factory()
      ->count(2)
      ->hasFolders(2)
      ->hasNotes(5)
      ->create();
    Folder::all()->each(function (Folder $folder) {
      Note::factory()
        ->count(3)
        ->state(['user_id' => $folder->user_id, 'folder_id' => $folder->id])->create();
    });
  }
}
