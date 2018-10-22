<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 16:03:50
 * @Last Modified by:   fatoni
 * @Last Modified time: 2018-10-22 16:05:57
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['category_id', 'name', 'price', 'stock'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}