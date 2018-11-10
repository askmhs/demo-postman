<?php

/**
 * @Author: Muhammad Harits Syaifulloh
 * @Date:   2018-11-10 08:38:14
 * @Last Modified by:   Muhammad Harits Syaifulloh
 * @Last Modified time: 2018-11-10 08:52:40
 */

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
	
	public function index()
	{
		return response()->json([
			"success" => true,
			"message" => "List category",
			"data" => Category::paginate(10)
		]);
	}

	public function show($id)
	{
		try {
			return response()->json([
				"success" => true,
				"message" => "Detail category",
				"data" => Category::findOrFail($id)
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
			$created = Category::create($request->all());
			return response()->json([
				"success" => true,
				"message" => "List category",
				"data" => Category::find($created->id)
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
			$category = Category::find($id);
			$category->update($request->all());
			return response()->json([
				"success" => true,
				"message" => "List category",
				"data" => Category::find($id)
			]);
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

	}
}