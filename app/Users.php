<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  /*
   * Fillable Fields
   */
  protected $fillable = [
          'user_name', 'password'
  ];

  protected $table = 'users';

  public function Get($array)
  {
    return ($this::where($array)->get());
  }

  public function GetAll()
  {
    return ($this::all());
  }

  public function Exist($array)
  {
    return ($this::where($array)->get()->count());
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
