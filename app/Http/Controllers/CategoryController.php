<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $categories = Category::orderBy('id')->get();

    return view('category.index', compact('categories'));
  }

  public function create(){
    return view('category.create');
  }

  public function store(CategoryStoreRequest $request){
    $categories = Category::create($request->all());
    $categories->save();

    return back();
  }

  public function edit($id){
    $categories = Category::findOrFail($id);

    return view('category.edit', compact('categories'));
  }

  public function update(CategoryUpdateRequest $request, $id){
    $categories = Category::findOrFail($id);
    $categories->update($request->all());

    return back();
  }
  
  public function confirmDelete($id){
    $categories = Category::findOrFail($id);

    return view('category.confirmDelete',[
      'categories' => $categories
      ]);
  }
  public function destroy($id){
    $categories = Category::findOrFail($id);

    return back();
  }

}
