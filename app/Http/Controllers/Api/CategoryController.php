<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCategory;
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

    public function store(RequestCategory $request){
        $category = $this->category->create($request->all());
        return response()->json($category, 201);
    }

    public function update(RequestCategory $request, $id){
        $category = $this->category->find($id);

        if(!$category){
            return response()->json(['error'=>'Not Found'],404);
        }
        $category->update($request->all());
        return response()->json($category);
    }

    public function delete($id){
        $category = $this->category->find($id);

        if(!$category){
            return response()->json(['error'=>'Not Found'],404);
        }
        $retorno = $category->delete();

        return response()->json($retorno);
    }
}
