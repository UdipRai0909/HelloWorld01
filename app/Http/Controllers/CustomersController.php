<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;


class CustomersController extends Controller
{
    // public function __construct()
        // {
        //     $this->middleware('auth')->only('create');
        // }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }

    public function index()
    {
        // $customers = [
        //     'Udip Rai',
        //     'Utsa Rai',
        //     'DB Yakkha',
        //     'Bindu Chamling Rai'
        // ];


        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();
        $customers = Customer::all();

        // dd($customers);

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        // dd(request('name'));
            // $data = request()->validate([
            //     'name' => 'required|min:4',
            //     'email' => 'required|email',
            //     'active' => 'required',
            //     'company_id' => 'required',
            // ]);
            // dd($data);

        
        
        $customer = Customer::create($this->validateRequest());
        // dd($customer);
            // $customer = new Customer();
            // $customer->name=request('name');
            // $customer->email=request('email');
            // $customer->active=request('active');
            // $customer->save();

        event(new NewCustomerHasRegisteredEvent($customer));
        
        

        

        

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        // dd($customer);
            // $customer = Customer::where('id', $customer)->firstOrFail();
            // dd($customer);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {

        $customer -> update($this->validateRequest());
        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer -> delete();
        return redirect("customers");
    }
}
