<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact_person = $request->contact_person;
        $supplier->address = $request->address;
        $supplier->save();

        return redirect()->action('SupplierController@index')->with('success', sprintf('%s', 'Supplier '. $supplier->name.' has been added!'));
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
        $supplier = Supplier::find($id);

        return view('pages.supplier.edit')->with('supplier', $supplier);
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
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->contact_person = $request->contact_person;
        $supplier->address = $request->address;
        $supplier->save();

        return redirect()->action('SupplierController@index')->with('success', sprintf('%s', 'Supplier '. $supplier->name.' has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        try {
            $supplier->delete();

            return redirect()->action('SupplierController@index')->with('success', sprintf('%s', 'Supplier '. $supplier->name.' has been deleted!'));
        } catch (\Exception $e) {
            return redirect()->action('SupplierController@index')->with('fail', sprintf('%s', 'Supplier '. $supplier->name.' can\'t be deleted!'));
        }
    }
}
