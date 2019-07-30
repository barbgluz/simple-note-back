<?php

use Illuminate\Database\Seeder;

class NotesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\NoteTag::class, 120)->create();
    }
}
