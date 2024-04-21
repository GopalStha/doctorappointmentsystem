@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Appointments({{ $bookings->count() }})</div>
                    <div class="card-body">
                        @if ($bookings->isEmpty())
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $key=>$booking)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td><img src="{{ asset('profile') }}/{{ $booking->user->image }}" alt=""
                                                    width="80" style="border-radius: 50%;"></td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->user->email }}</td>
                                            <td>{{ $booking->user->phone_number }}</td>
                                            <td>{{ $booking->user->gender }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>{{ $booking->doctor->name }}</td>
                                            <td>
                                                @if ($booking->status == 0)
                                                    <a href="{{ route('update.status',[$booking->id]) }}"><button class="btn btn-primary">Pending</button></a>
                                                @else
                                                <a href="{{ route('update.status',[$booking->id]) }}"><button class="btn btn-success">Checked</button></a>

                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        {{-- This part will not be reached --}}
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
