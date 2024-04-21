@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-edit bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>add doctor</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                
                <div class="card-body">
                    <img src="{{ asset('images') }}/{{ $user->image }}" alt="" width="120">
                    <h3>{{ $user->name }}</h3>
                    <form class="forms-sample" action="{{ route('doctor.destroy', [$user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                            <a href="{{ route('doctor.index') }}"><button class="btn btn-light">Cancel</button></a>
                        </div>
                        

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
