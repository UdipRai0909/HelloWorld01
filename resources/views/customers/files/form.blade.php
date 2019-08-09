<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control" placeholder="Enter name..">
    <div class="text-danger">{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control" placeholder="Enter email..">
    <div class="text-danger">{{ $errors->first('email') }}</div>
</div>

<div class="form-group">
    <label for="name">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" selected>Select Customer Status</option>

        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach

    </select>
    <div class="text-danger">{{ $errors->first('active') }}</div>
</div>

<div class="form-group">
    <label for="company_id">Companies</label>
    <select name="company_id" id="company_id" class="form-control">

        <option value="" selected>Select Company</option>
        @foreach($companies as $company)
        <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select>
    <div class="text-danger">{{ $errors->first('company_id') }}</div>
</div>
@csrf