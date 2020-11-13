@extends('backend.master')

@section('title')
    Manage Company | Invento
@endsection

@section('content')
    <div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Manage Company</h3>
                </div>
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
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Company Name</th>
                            <th>Company Logo</th>
                            <th>No. of Emp.</th>
                            <th>Website</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($companies as $company)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $company->categoryName['name'] }}</td>
                                <td>{{ $company['name'] }}</td>
                                <td>
                                    @if($company->image)
                                        <a href="{{ asset('assets/backend/images/company/'.$company['image']) }}" target="_blank">
                                            <img src="{{ asset('assets/backend/images/company/'.$company['image']) }}" alt="Attached" style="height: 40px;width: 40px">
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $company['number_of_employee'] }}</td>
                                <td>
                                    <a href="{{ $company['website'] }}" target="_blank">
                                        {{ $company['website'] }}
                                    </a>
                                </td>
                                <td>{{ $company['phone'] }}</td>
                                <td>
                                    @if($company->status == 1)
                                        <button class="btn btn-success">Active</button>
                                    @else
                                        <button class="btn btn-warning">Inactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit.company',['id' => $company->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="#editCompany-{{ $company->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="editCompany-{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Question Type Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('delete.company') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                Are you want to delete this?
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" value="{{ $company->id }}">
                                                <button type="button" class="btn btn-secondary pl-3 pr-3" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary pl-3 pr-3">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection