@extends('backend.master')

@section('title')
    Company | Invento
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Add Company</h3>
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

                    <form action="{{ route('save.company') }}" method="POST" enctype="multipart/form-data" class="form-horizontal row-fluid">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Category <span class="text-red">*</span></label>
                            <div class="controls">
                                <select name="category_id" tabindex="1" class="span8">
                                    <option selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-red">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Company Name <span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="name" value="{{ old('name') }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Number of Employee<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="number" min="1" name="number_of_employee" value="{{ old('number_of_employee') }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('number_of_employee') ? $errors->first('number_of_employee') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Website<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="website" value="{{ old('website') }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('website') ? $errors->first('website') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Phone Number<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="phone" value="{{ old('phone') }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email</label>
                            <div class="controls">
                                <input type="email" name="email" value="{{ old('email') }}" id="basicinput" class="span8">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Address</label>
                            <div class="controls">
                                <textarea name="address" class="span8" rows="5">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Company Logo</label>
                            <div class="controls">
                                <input type="file" value="{{ old('image') }}" name="image" id="basicinput" class="span8">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Status</label>
                            <div class="controls">
                                <select name="status" tabindex="1" data-placeholder="Select here.." class="span8">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
