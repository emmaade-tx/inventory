<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Category;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	/**
     * Create a product.
     *
     * @return Response
     */
    public function postProduct(Request $request)
    {
    	$this->validate($request, [
    		'user_id'  => 'required',
    		'category_id'  => 'required',
            'name' => 'required|unique:inventories',
            'price'   => 'required',
        ]);
    	$user = Inventory::create($request->all());
    	if ($user) {
    		return response()->json(['message' => 'Inventory added succesfully'], 201);
    	}

    	return response()->json(['message' => 'Inventory not added'], 400);
    }

    /**
     * Create a category.
     *
     * @return Response
     */
    public function postCategory(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:categories',
        ]);
    	$category = Category::create($request->all());
    	if ($category) {
    		return response()->json(['message' => 'Category added succesfully'], 201);
    	}

    	return response()->json(['message' => 'Category not added'], 400);
    }

    /**
     * Retrieve all the categories.
     *
     * @return Response
     */
    public function getAllCategories()
    {
        $category = Category::all();

        return response()->json($category, 200);
    }

    /**
     * Retrieve all the products.
     *
     * @return Response
     */
    public function getAllProducts()
    {
        $category = Inventory::all();

        return response()->json($category, 200);
    }

    /**
     * Retrieve a single category.
     *
     * @return Response
     */
    public function getCategoryById($id)
    {
        $category = Category::where('id', $id)->get();

        if (is_null($category) || $category->count() == 0) {
            return response()->json(['message' => 'This category does not exist'], 404);
        }

        return response()->json($categoryName, 200);
    }

    /**
     * Retrieve a single product.
     *
     * @return Response
     */
    public function getProductById($id)
    {
        $product = Product::where('id', $id)->get();

        if (is_null($product) || $product->count() == 0) {
            return response()->json(['message' => 'This category does not exist'], 404);
        }

        return response()->json($categoryName, 200);
    }
}
