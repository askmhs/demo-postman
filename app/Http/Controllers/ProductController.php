<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 16:19:09
 * @Last Modified by:   Muhammad Harits Syaifulloh
 * @Last Modified time: 2018-11-10 08:47:21
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
	// protected $parameter;

	// public function category(Request $request)
	// {
	// 	$this->parameter = $request->all();
		
	// 	return response()->json(Category::limit($this->limit())->offset($this->offset())
	// 		->when( $this->checkVariable('name'), function($query){
	// 			$query->where('name', 'LIKE', '%'.$this->parameter['name'].'%');
	// 		})
	// 		->get()->toArray());
	// }

	// public function product(Request $request)
	// {
	// 	$this->parameter = $request->all();
	// 	$data = Product::with('category')->limit($this->limit())->offset($this->offset())
	// 		->when( $this->checkVariable('name') , function($query){
	// 			$query->where('name', 'LIKE', '%'.$this->parameter['name'].'%');
	// 		})
	// 		->when( $this->checkVariable('category') , function($query){
	// 			$query->whereHas('category', function($query){
	// 				$query->where('name', 'LIKE', '%'.$this->parameter['category'].'%');
	// 			});
	// 		})
	// 		->get();
	// 	$dataArr = [];
	// 	foreach ($data as $item) {
	// 		array_push($dataArr, [
	// 			'id' => $item->id,
	// 			'name' => $item->name,
	// 			'category' => $item->category->name,
	// 			'price' => $item->price,
	// 			'stock' => $item->stock,
	// 		]);
	// 	}
	// 	return response()->json($dataArr);
	// }

	// private function limit()
	// {
	// 	return ( $this->checkVariable('limit') ) ? $this->parameter['limit'] : 10;
	// }

	// private function offset()
	// {
	// 	return ( $this->checkVariable('offset') ) ? $this->parameter['offset'] : 0;
	// }

	// private function checkVariable($variable)
	// {
	// 	return (isset($this->parameter[$variable]) AND ! empty($this->parameter[$variable]));
	// }
}