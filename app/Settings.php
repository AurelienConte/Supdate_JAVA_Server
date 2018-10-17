<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /*
    * Fillable Fields
    */
    protected $fillable = [
            'maintenance'
    ];

    protected $table = 'settings';

  public function Get()
  {
    return ($this::all()->first());
  }

  public function Store($array)
  {
    if($this::create($array))
      return true;
    return false;
  }

  public function Set($fields)
  {
    if($this::all()->first() == null)
      return $this->Store($fields);
    else
      return ($this::all()->first()->update($fields));
  }

  public function Remove($array)
  {
    if($this::destroy($array))
      return true;
    return false;
  }

  public function RemoveOBJ($array)
  {
    $this::where($array)->delete();
  }
}
