<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Csv;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
       
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        try {

            $csv = Storage::put('csvs', $request->csv);
            
            Csv::create(['csv' => $csv]);

            return redirect()->route('customers.create');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Houve um eror na sua solicitação!']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
