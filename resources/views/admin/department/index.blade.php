@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Departments</h5>
                    <span>List of all departments</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Department</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Data Table</h3>
            </div>
            <div class="card-body">
                @if ($departments->isEmpty())
                <p>No departments to display!</p>
                @else
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->department }}</td>


                            <td>
                                <div class="table-actions d-flex float-right ml-4">
                   
                                    <a href="{{ route('department.edit',$department->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                            <div class="mx-1"></div>
                                        <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                                            @csrf

                                            @method('DELETE')
                                           <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                </div>
                            </td>
                            <td>X</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection