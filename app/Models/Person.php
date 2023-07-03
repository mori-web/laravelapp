<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopePerson;

class Person extends Model
{
  use HasFactory;

  // グローバルスコープ
  //これはこのPersonモデルのレコード取得に、すべてこのスコープが適応されるようになる
  //bootはモデルの初期化専用メソッドで自動的に実行される
  // protected static function boot()
  // {
  //   parent::boot();
  //   // static::addGlobalScope('age', function(Builder $builder) {
  //   //   $builder->where('age', '>', 30);
  //   // });
  //   static::addGlobalScope(new ScopePerson);
  // }


  // public function getData()
  // {
  //   return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
  // }

  // /*------------------------------------------------------------
  //   検索スコープ
  //   ------------------------------------------------------------*/

  // // 名前の検索
  // public function scopeNameEqual($query, $str)
  // {
  //   return $query->where('name', $str);
  // }

  // // 年齢が〇〇以上
  // public function scopeAgeGreateThan($query, $n)
  // {
  //   return $query->where('age', '>=', $n);
  // }

  // // 年齢が〇〇以下
  // public function scopeAgeLessThan($query, $n)
  // {
  //   return $query->where('age', '<=', $n);
  // }

  /*------------------------------------------------------------
    CRUD
    ------------------------------------------------------------*/
  protected $guarded = array('id');

  public static $rules = array(
    'name' => 'required',
    'mail' => 'email',
    'age' => 'integer|min:0|max:150',
  );

  public function getData()
  {
    return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
  }
}
