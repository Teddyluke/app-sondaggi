<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Questionnaire extends Model
{

  protected $guarded = [];

  //  mi ritorna il path di quel determinato questionario
  public function path()
  {
    return url('/questionnaires/' . $this->id);
  }

  // mi ritorna il public path da poter passare agli utenti
  public function publicPath()
  {
    return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
  }



  //  relazioni
  public function user()
  {

    return $this->belongsTo(User::class);

  }

  public function questions()
  {

    return $this->hasMany(Question::class);

  }

  public function surveys()
  {
    return $this->hasMany(Survey::class);
  }

}
