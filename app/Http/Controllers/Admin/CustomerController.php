<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.index', compact('customers', $customers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = Customer::create([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
            'address' => $request->customer_address,
        ]);

        if (!$save) {
            Session::flash('messages', ['type' => 'error', 'messages' => 'Something went wrong']);
            return redirect()->back();
        }
        Session::flash('messages', ['type' => 'success', 'messages' => 'Successfully Saved']);
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.index', compact('customers', $customers));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customers = Customer::latest()->get();
        return view('admin.customer.index', compact('customers', $customers));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $save = $customer->update([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
            'address' => $request->customer_address,
        ]);
        if (!$save) {
            Session::flash('messages', ['type' => 'error', 'messages' => 'Something went wrong']);
            return redirect()->back();
        }
        Session::flash('messages', ['type' => 'success', 'messages' => 'Successfully Updated']);
        return redirect()->route('customers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $save = $customer->delete();
        if (!$save) {
            Session::flash('messages', ['type' => 'error', 'messages' => 'Something went wrong']);
            return redirect()->back();
        }
        Session::flash('messages', ['type' => 'success', 'messages' => 'Successfully Deleted']);
        return redirect()->route('customers.index');

    }
}
