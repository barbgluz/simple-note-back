<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteTag extends Model
{
    protected $fillable = [
        'notes_id', 'tags_id'
    ];

    public function note()
    {
      return $this->hasOne('App\Note', 'id', 'note_id');
    }

    public function tag()
    {
      return $this->hasOne('App\Tag', 'id', 'tag_id');
    }
}
