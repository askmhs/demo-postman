<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 15:56:16
 * @Last Modified by:   fatoni
 * @Last Modified time: 2018-10-22 16:05:37
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name'];

	public function products()
	{
		return $this->hasMany('App\Product');
	}
}