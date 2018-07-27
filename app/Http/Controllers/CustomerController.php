<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Customer;
use App\Models\UploadCustomer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = Customer::all();

       return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        try {
            
            $file = Storage::put('uploads', $request->file);
            
            UploadCustomer::create(['file' => $file]);

            return redirect()->route('customers.index');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => 'Houve um eror na sua solicitação!']);
        }
    }
}
