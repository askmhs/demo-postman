<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 16:19:09
 * @Last Modified by:   Muhammad Harits Syaifulloh
 * @Last Modified time: 2018-11-10 10:06:48
 */
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

	public function index()
	{
		return response()->json([
			"success" => true,
			"message" => "List product",
			"data" => Product::paginate(10)
		]);
	}

	public function show($id)
	{
		try {
			return response()->json([
				"success" => true,
				"message" => "Detail product",
				"data" => Product::findOrFail($id)
			]);
		} catch (ModelNotFoundException $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "The data you're looking for couldn't be found!",
				"data" => null
			], 404);
		} catch (\Exception $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "An error occurred while getting data!",
				"data" => null
			], 500);
		}
	}

	public function store(Request $request)
	{
		try {
			$created = Product::create($request->all());
			return response()->json([
				"success" => true,
				"message" => "Successfully create new product",
				"data" => Product::find($created->id)
			]);
		} catch (\Exception $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "An error occurred while creating data!",
				"data" => null
			], 500);
		}
	}

	public function update($id, Request $request)
	{
		try {
			$product = Product::findOrFail($id);
			$product->update($request->all());
			return response()->json([
				"success" => true,
				"message" => "Successfully update product",
				"data" => Category::find($id)
			]);
		} catch (ModelNotFoundException $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "The data you're looking for couldn't be found!",
				"data" => null
			], 404);
		} catch (\Exception $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "An error occurred while updating data!",
				"data" => null
			], 500);
		}
	}

	public function destroy($id)
	{
		try {
			$product = Product::findOrFail($id);
			$product->delete();
			return response()->json([
				"success" => true,
				"message" => "Successfully remove data",
				"data" => null
			]);
		} catch (ModelNotFoundException $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "The data you're looking for couldn't be found!",
				"data" => null
			], 404);
		} catch (\Exception $exception) {
			return response()->json([
				"success" => false,
				"message" =>  "An error occurred while removing data!",
				"data" => null
			], 500);
		}
	}
}