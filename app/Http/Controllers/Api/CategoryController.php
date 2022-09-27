<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(Request $request){
        $categories = $this->category->getResult($request->name);

        return response()->json($categories);
    }

    public function store(Request $request){
        $category = $this->category->create($request->all());
        return response()->json($category, 201);
    }
}
