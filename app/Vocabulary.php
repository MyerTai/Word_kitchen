<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    //

    protected $table = 'vocabularies';

    protected $primaryKey = 'vocab_id';

    public $timestamps = false;
}
