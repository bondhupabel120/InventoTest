@extends('backend.master')

@section('title')
    Edit Admin Profile | Invento
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Edit Your Profile</h3>
                </div>
                <div class="module-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('update.admin.profile') }}" method="POST" enctype="multipart/form-data" class="form-horizontal row-fluid">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Name <span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="name" value="{{ $profile['name'] }}" id="basicinput" class="span8">
                                <input type="hidden" name="id" value="{{ $profile['id'] }}">
                                <span class="text-red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Username <span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="user_name" value="{{ $profile['user_name'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('user_name') ? $errors->first('user_name') : '' }}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email <span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="email" name="email" value="{{ $profile['email'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Date of Birth</label>
                            <div class="controls">
                                <input type="date" name="date_of_birth" value="{{ $profile['date_of_birth'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Profile Photo</label>
                            <div class="controls">
                                <input type="file" name="image" id="basicinput" class="span8">
                                @if($profile->image)
                                    <a href="{{ asset('assets/backend/images/admin/'.$profile['image']) }}" target="_blank">
                                        <img src="{{ asset('assets/backend/images/admin/'.$profile['image']) }}" alt="Attached" style="height: 60px;width: 60px">
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .text-red{
            color: red;
        }
    </style>
@endsection