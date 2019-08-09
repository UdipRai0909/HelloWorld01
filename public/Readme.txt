
::::::::::  Routes :::::::::: Views  ::::::::::

    Route::get('/', function() {
        return view('welcome');
    });

    Route::view('welcome', '/');




::::::::::  Passing Data To Views  ::::::::::

    Route::get('customers', function() {

        $customers = [

            'Udip Rai',
            'Utsa Rai',
            'DB Yakkha',
            'Bindu Chamling Rai'

        ];

        return view('tests.01_customer', [

            'customers' => $customers,
        ]);
    });


::::::::::  Controllers  ::::::::::

    class CustomersController extends Controller
    {
        public function list()
        {
            $customers = [
                'Udip Rai',
                'Utsa Rai',
                'DB Yakkha',
                'Bindu Chamling Rai'
            ];

            return view('tests.01_customer', [
                'customers' => $customers,
            ]);
        }
    }


::::::::::  Blade  ::::::::::
    @extends('layouts.app')

    @section('content')

        <h1>About Page</h1>

    @endsection


::::::::::  Database  ::::::::::
    php artisan migrate


::::::::::  Model  ::::::::::
    php artisan make:model Customer -m


::::::::::  Tinker  ::::::::::
    php artisan tinker

    Customer::all();
    $customer = new Customer();
    $customer->name = "Dependra Jung Thapa";
    $customer->save();

    use App\Customer;
    $customers = Customer::all();
    dd($customers);

    @foreach ($customers as $customer)
        <li>{{ $customer->name }}</li>
    @endforeach

    > $c->name="Pawan Shrestha";
    => "Pawan Shrestha"
    >>> $c->name="Prabesh Regmi";
    => "Prabesh Regmi"
    >>> $c->save()
    => true
    >>> $c->name="Pawan Shrestha";
    => "Pawan Shrestha"
    >>> $c->save();
    => true

::::::::::  Adding Customers to the Database  ::::::::::
    <div class="container">
        <div class="card p-5">
            <form action="customers" method="POST" class="form-control pb-5">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Enter Customer's name..">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Customer</button>
                </div>
                @crsf
            </form>
        </div>
    </div>

    public function store()
    {
        // dd(request('name'));
        $customer = new Customer();
        $customer->name=request('name');
        $customer->save();
        return back();
    }
::::::::::  Form Validation  ::::::::::
    $data = request()->validate([
        'name' => 'required|min:4',
    ]);
    {{ $errors->first('name') }}
::::::::::  Adding column to Database  ::::::::::
    php artisan migrate:rollback
    php artisan migrate

    Edit inside the database table, form.blade.php and controller


::::::::::  Cleaning up the views  ::::::::::
    @include('layouts.navbars.navbar')
    @include('layouts.navbars.navbar', ['username' => 'Udip Rai'])
    
    <title>@yield('title', 'Learning Laravel 5.8')</title>

    @section('title')
        Customers
    @endsection

    @section('title', 'Contact Us')


::::::::::  Eloquent Where Clause  ::::::::::

    Schema::create('customers', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email');
        $table->integer('active');
        $table->timestamps();
    });

    public function list()
    {
        // $customers = [
            //     'Udip Rai',
            //     'Utsa Rai',
            //     'DB Yakkha',
            //     'Bindu Chamling Rai'
            // ];


        $activeCustomers = Customer::where('active', 1)->get();
        $inactiveCustomers = Customer::where('active', 0)->get();
        $customers = Customer::all();
        // dd($customers);

        return view('tests.01_customer', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
        ]);
    }

    return view('tests.01_customer', compact('activeCustomers', 'inactiveCustomers'));


    <div class="form-group">
        <label for="name">Status</label>
        <select name="active" id="active" class="form-control">
            <option value="" disabled>Select Customer Status</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <div class="text-danger">{{ $errors->first('email') }}</div>
    </div>

    <div class="form-group">
        <label for="name">Status</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email..">
        <div class="text-danger">{{ $errors->first('email') }}</div>
    </div>

    <div class="row p-5">
        <div class="col-12">
            <h2>Here is a list of all the people.</h2>
        </div>
        <!-- 
                        <ul>
                            <li>Customer 1</li>
                            <li>Customer 2</li>
                            <li>Customer 3</li>
                        </ul> 
                        <h2>Other People</h2>
                        -->
        <div class="col-6">  
            <table class="table">
                    <tr>
                        <th><h3 class="text-center">Active</h3></th>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                @foreach ($activeCustomers as $activeCustomer)
                                    <li class="py-2">{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->email }})</span></li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-border-dark">
                <tr>
                    <th><h3 class="text-center">In-Active</h3></th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            @foreach ($inactiveCustomers as $inactiveCustomer)
                                <li class="py-2">{{ $inactiveCustomer->name }} <span class="text-muted">({{ $inactiveCustomer->email }})</span></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>





::::::::::  Elequent Scopes ad Mass Assignment  ::::::::::

    public function list()
    {
        // $customers = [
            //     'Udip Rai',
            //     'Utsa Rai',
            //     'DB Yakkha',
            //     'Bindu Chamling Rai'
            // ];


        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        $customers = Customer::all();
        // dd($customers);

        return view('tests.01_customer', compact('activeCustomers', 'inactiveCustomers'));
    }

    protected $fillable = ['name', 'email', 'active'];

    //protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function store()
    {
        // dd(request('name'));
        $data = request()->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'active' => 'required',
        ]);

        // dd($data);

        Customer::create($data);
        // dd($customer);
            // $customer = new Customer();
            // $customer->name=request('name');
            // $customer->email=request('email');
            // $customer->active=request('active');
            // $customer->save();
        return back();
    }


::::::::::  Eloquent BelongsTo and HasMany Relationships  ::::::::::
    php artisan tinker
    $c = Company::create(['name' => 'ABC Company', 'phone' => '12-345-6789']);

    <div class="form-group">
        <label for="company_id">Companies</label>
        <select name="company_id" id="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        <div class="text-danger">{{ $errors->first('active') }}</div>
    </div>

    >>> $c = Customer::first();
    [!] Aliasing 'Customer' to 'App\Customer' for this Tinker session.
    => App\Customer {#2988
        id: 1,
        company_id: 2,
        name: "DB Yakkha",
        email: "db_rai1234@gmail.com",
        active: 1,
        created_at: "2019-08-07 11:35:38",
        updated_at: "2019-08-07 11:35:38",
    }
    >>> $c->company;
    => App\Company {#2979
        id: 2,
        name: "XYZ Company",
        phone: "85-224-5549",
        created_at: "2019-08-07 10:57:59",
        updated_at: "2019-08-07 10:57:59",
    }


    <div class="col-12">  
            <table class="table">
                <tr>
                    <th><h3 class="text-center">Active</h3></th>
                    <th><h3 class="text-center">In-Active</h3></th>
                </tr>
                <tr>
                    <td>
                        <ul>
                        @foreach ($activeCustomers as $activeCustomer)
                            <li class="py-2">{{ $activeCustomer->name }} 
                                <span class="text-muted">({{ $activeCustomer->email }})</span><br/>
                                <span class="text-info ml-5 d-block">{{ $activeCustomer->company->name }}</span>
                            </li>
                        @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                        @foreach ($inactiveCustomers as $inactiveCustomer)
                            <li class="py-2">{{ $inactiveCustomer->name }} 
                                <span class="text-muted">({{ $inactiveCustomer->email }})</span><br/>
                                <span class="text-info ml-5 d-block">{{ $inactiveCustomer->company->name }}</span>
                            </li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

::::::::::  Adding column to Database  ::::::::::

::::::::::  Adding column to Database  ::::::::::
::::::::::  Adding column to Database  ::::::::::
::::::::::  Adding column to Database  ::::::::::



































Eloquent Relationships and ORM

Types of Relationships
One To One
One To Many
Many To Many
Has One Through
Has Many Through
One To One (Polymorphic)
One To Many (Polymorphic)
Many To Many (Polymorphic)




Do a model migration
php artisan make:model Company -m

Edit the database table
Schema::create('companies', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('phone');
    $table->timestamps();
});

Turn off the Mass Assignment inside Company model
protected $guarded = [];

Refresh the database table using:
php artisan migrate:refresh

Easiest way to insert values for the Company



