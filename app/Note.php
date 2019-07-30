<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title', 'description', 'notebooks_id'
    ];

    public function notebook()
    {
      return $this->belongsTo('App\Notebook');
    }
}
