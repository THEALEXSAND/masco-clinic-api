<?php

namespace App\Http\Controllers;

use App\Filters\CustomerFilter;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $filter =  new CustomerFilter();

        $customers = parent::baseIndex($req, $filter, new Customer);

        $includePets = $req->query('includePets');
        if ($includePets) $customers = $customers->with('pets');

        return new CustomerCollection($customers->paginate()->appends($req->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $req)
    {
        return new CustomerResource(Customer::create($req->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Request $req)
    {
        $includePets = $req->query('includePets');
        if ($includePets) return new CustomerResource($customer->loadMissing('pets'));

        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $req, Customer $customer)
    {
        return parent::baseUpdate($req, $customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        return parent::baseDestroy($customer);
    }
}
