<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        return Category::get();
    }

    public function save(StoreCategoryRequest $request){

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return $category;
    }
}
