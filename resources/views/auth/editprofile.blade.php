@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header red center">
                        <h2>{{ __('Update Profile') }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                            <div class="form-group">
                                Name :
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Enter Name" value="{{ $user->name }}" required> <br>
                            </div>

                            <div class="form-group">
                                Mobile : <br>
                                <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number"
                                    value="{{ $user->mobile }}" required> <br>
                            </div>

                            <div class="form-group">
                                Address : <br>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"
                                    value="{{ $user->address }}" required> <br>
                            </div>

                            <div class="form-group">
                                Profile Image:<br>
                                <input type="file" name="profile_image" class="form-control"><br>
                            </div>

                            <div class="form-group">
                                Hobbies:<br>
                                <select name="hobbies" id="hobbies" class="form-control">
                                    <option>--</option>
                                    <option value="reading">reading</option>
                                    <option value="travelling">travelling</option>
                                    <option value="writing">writing</option>
                                </select><br>
                            </div>


                            <div class="form-group">
                                Gender : <br>
                                <input type="radio" id="male" name="gender" value="{{ $user->gender }}">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="{{ $user->gender }}">
                                <label for="female">Female</label><br>
                            </div>

                            <div class="center">   
                                <button type="submit" class="btn btn-primary" id="updateprofile" name="updateprofile"
                                    value="">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()