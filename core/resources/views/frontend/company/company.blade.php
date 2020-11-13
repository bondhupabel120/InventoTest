@extends('frontend.master')

@section('title')
    Company | Invento
@endsection

@section('content')
    <h2 style="text-align: center;color: #a31515;">Search your favourite company</h2>
    <div class="span12">
        <div class="content">
            <div class="module">
                <div class="module-body table">
                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Company Name</th>
                            <th>Company Logo</th>
                            <th>Website</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($companies as $company)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $company->categoryName['name'] }}</td>
                                <td>
                                    <a href="{{ route('company.details', ['id'=>$company->id]) }}">
                                        {{ $company['name'] }}
                                    </a>
                                </td>
                                <td>
                                    @if($company->image)
                                        <a href="{{ route('company.details', ['id'=>$company->id]) }}">
                                            <img src="{{ asset('assets/backend/images/company/'.$company['image']) }}" alt="Attached" style="height: 40px;width: 40px">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $company['website'] }}" target="_blank">
                                        {{ $company['website'] }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection