<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category([
            'name' => $request->get('name')
        ]);
        $category->save();

        return redirect()->action('CategoryController@index')->with('success', sprintf('%s', 'Category '.$request->get('name').' has been added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->save();

        return redirect()->action('CategoryController@index')->with('success', sprintf('%s', 'Category '.$id.' has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        try {
            $category->delete();
            return redirect()->action('CategoryController@index')->with('success', sprintf('%s', 'Category '.$category->name.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('CategoryController@index')->with('fail', sprintf('%s', 'Category '.$category->name.' can not be deleted!'));
        }
    }
}
