@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <div class="card" style="text-align: center">
                    <div class="card-header red">
                        {{ __('User Name ') }}
                    </div>
                    <div class="card-body">
                        {{ $user->name }}
                    </div>
                    <div class="card-header red">
                        {{ __('User Email Address') }}
                    </div>
                    <div class="card-body">
                        {{ $user->email }}
                    </div>
                     <div class="card-header red">
                        {{ __('Mobile Number ') }}
                    </div>
                    <div class="card-body">
                        {{ $user->mobile }}
                    </div>
                     <div class="card-header red">
                        {{ __('Address ') }}
                    </div>
                    <div class="card-body">
                        {{ $user->address }}
                    </div>

                    
                    <div>
                        <a href=" {{ route('edit', $user->id) }} " class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection