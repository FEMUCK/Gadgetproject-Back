<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SubCategory = SubCategory::all();
        return response()->json($SubCategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'subCategoryName' => 'required',
            'subCategoryIcon' => 'required',
            'subCategoryMain' => 'required',
            'imageName' => 'required',
        ]);   

        $category = Category::find($request->get('subCategoryMain'));

        $SubCategory = new SubCategory;
        $SubCategory->name = $request->get('subCategoryName');
        $SubCategory->icon = $request->get('subCategoryIcon');
        $SubCategory->category_id = $category->_id;
        $SubCategory->category_name = $category->name;
        $SubCategory->image = $request->get('imageName');
        $SubCategory->save();

        return response()->json([
            'message' => 'Create Success'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SubCategory = SubCategory::find($id);
        return response()->json($SubCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subCategoryName' => 'required',
            'subCategoryIcon' => 'required',
            'subCategoryMain' => 'required',
            'imageName' => 'required',
        ]);   

        $category = Category::find($request->get('subCategoryMain'));

        $SubCategory = SubCategory::find($id);
        $SubCategory->name = $request->get('subCategoryName');
        $SubCategory->icon = $request->get('subCategoryIcon');
        $SubCategory->category_id = $category->_id;
        $SubCategory->category_name = $category->name;
        $SubCategory->image = $request->get('imageName');
        $SubCategory->save();

        return response()->json([
            'message' => 'Create Success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SubCategory = SubCategory::find($id);
        $SubCategory->delete();

        $SubCategory = SubCategory::all();
        return response()->json($SubCategory);
    }
}
