<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        return view('create-customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'contact' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'diskon' => 'required',
            'tipe_diskon' => 'required'
        ]);

        Customer::create($request->all());
        return redirect('/customers');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customers', compact('customers'));
    }



    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
    }
    
    public function update(Request $request, $id)
    {
        Customer::findOrFail($id)->update($request->all());
        return redirect('/customers');
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return back();
    }
}
