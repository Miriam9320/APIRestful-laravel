<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;
use App\Category;
use App\Transaction;

class Product extends Model
{
    const PRODUCTO_DISPONIBLE = 'disponible';
	const PRODUCTO_NO_DISPONIBLE = 'no disponible';

  protected $fillable = [
  	'name',
  	'description',
  	'quantity',
  	'status',
  	'image',
  	'seller_id',
  ];

  public function estaDisponible(){
  	return $this->status == Product::PRODUCTO_DISPONIBLE;
  }

  public function seller(){
    return $this->belongsToMany(Seller::class);
  }

  public function transactions(){
    return $this->hasMany(Transaction::class);
  }

  public function categories(){
    return $this->belongsToMany(Category::class);
  }
}
