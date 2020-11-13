@extends('frontend.master')

@section('title')
    Company Profile | Invento
@endsection

@section('content')
    <section>
        <div class="container">
            <a href="{{ route('index') }}" class="btn btn-success">Back / Home</a>
            <h3 style="text-align: center">{{ $company['name'] }}</h3>
            <div style="text-align: center">
                <img src="{{ asset('assets/backend/images/company/'.$company['image']) }}" alt="" style="max-height: 100px;max-width: 100px;border-radius: 10px">
            </div>
            <hr>
            <div class="row">
                <h4>Category : {{ $company->categoryName['name'] }}</h4>
                <h4>Number of Employee: {{ $company['number_of_employee'] }}</h4>
                <h4>Website: <a href="{{ $company['website'] }}" target="_blank">{{ $company['website'] }}</a></h4>
                <h4>Phone Number: {{ $company['phone'] }}</h4>
                <h4>Email: {{ $company['email'] }}</h4>
                <h4>Address: {{ $company['address'] }}</h4>
            </div>
        </div>
    </section>
@endsection
