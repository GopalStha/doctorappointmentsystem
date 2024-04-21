@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card-header">Appointments({{ $patients->count() }})</div>
                    <div class="card-body">
                        @if ($patients->isEmpty())
                            <p>There is no any appointments Today!</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Doctor</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Prescription</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($patients as $key=>$patient)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><img src="{{ asset('profile') }}/{{ $patient->user->image }}" alt=""
                                                    width="80" style="border-radius: 50%;"></td>
                                            <td>{{ $patient->date }}</td>
                                            <td>{{ $patient->user->name }}</td>
                                            <td>{{ $patient->user->email }}</td>
                                            <td>{{ $patient->user->phone_number }}</td>
                                            <td>{{ $patient->user->gender }}</td>
                                            <td>{{ $patient->time }}</td>
                                            <td>{{ $patient->doctor->name }}</td>
                                            <td>
                                                {{ $patient->status }}
                                            </td>
                                            <td>

                                                <a href="{{ route('prescription.show', [$patient->user->id, $patient->date]) }}"
                                                    class="btn btn-secondary">View Prescription</a>


                                            </td>
                                        </tr>
                                    @empty
                                        {{-- This part will not be reached --}}
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
