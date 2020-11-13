@extends('backend.master')

@section('title')
    Edit Company | Invento
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Edit Company</h3>
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

                    <form name="editCompany" action="{{ route('update.company') }}" method="POST" enctype="multipart/form-data" class="form-horizontal row-fluid">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Category <span class="text-red">*</span></label>
                            <div class="controls">
                                <select name="category_id" tabindex="1" class="span8">
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
                                <input type="text" name="name" value="{{ $company['name'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                <input type="hidden" name="id" value="{{ $company['id'] }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Number of Employee<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="number" min="1" name="number_of_employee" value="{{ $company['number_of_employee'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('number_of_employee') ? $errors->first('number_of_employee') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Website<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="website" value="{{ $company['website'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('website') ? $errors->first('website') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Phone Number<span class="text-red">*</span></label>
                            <div class="controls">
                                <input type="text" name="phone" value="{{ $company['phone'] }}" id="basicinput" class="span8">
                                <span class="text-red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email</label>
                            <div class="controls">
                                <input type="email" name="email" value="{{ $company['email'] }}" id="basicinput" class="span8">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Address</label>
                            <div class="controls">
                                <textarea name="address" class="span8" rows="5">{{ $company['address'] }}</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Company Logo</label>
                            <div class="controls">
                                <input type="file" name="image" id="basicinput" class="span8">
                                @if($company->image)
                                    <a href="{{ asset('assets/backend/images/company/'.$company['image']) }}" target="_blank">
                                        <img src="{{ asset('assets/backend/images/company/'.$company['image']) }}" alt="Attached" style="height: 60px;width: 60px">
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Status</label>
                            <div class="controls">
                                <select name="status" tabindex="1" data-placeholder="Select here.." class="span8">
                                    @if($company->status == 1)
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    @else
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    @endif
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

@section('js')
    <script>
        document.forms['editCompany'].elements['category_id'].value ='{{ $company->categoryName['id'] }}'
    </script>
@endsection