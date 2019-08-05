<?php

use Illuminate\Database\Seeder;

class NotebooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Notebook::class, 150)->create();
    }
}
