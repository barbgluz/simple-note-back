<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesHasTagsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'note_tags';

    /**
     * Run the migrations.
     * @table notes_has_tags
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('notes_id')->unsigned()->nullable();
            $table->integer('tags_id')->unsigned()->nullable();
            $table->timestamps();

            $table->index('notes_id');

            $table->index('tags_id');


            $table->foreign('notes_id')
                ->references('id')->on('notes')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->foreign('tags_id')
                ->references('id')->on('tags')
                ->onDelete('set null')
                ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
