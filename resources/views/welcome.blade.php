@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/banner/img_Doctor-Appointment-App-1024x768-min.jpg" alt="" class="img-fluid"
                    style="border: 1px solid #ccc">
            </div>
            <div class="col-md-6">
                <h2>Create an account and Book your appointment</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At minima eveniet deserunt ducimus recusandae
                    nulla voluptate rerum labore reprehenderit fugit inventore maxime necessitatibus obcaecati officia nihil
                    veniam, iste dicta totam? Ut iure reprehenderit explicabo perspiciatis tenetur sed, pariatur mollitia
                    deserunt quis veniam dicta nulla inventore eius accusantium dolorum ducimus expedita.</p>
                <div class="d-flex mt-5">
                    <a href="{{ url('/register') }}"><button type="submit" class="btn btn-success">Register as
                            Patient</button></a>
                    <div class="mx-1"></div>
                    <a href="{{ url('/login') }}"><button type="submit" class="btn btn-secondary">Login</button></a>

                </div>
            </div>
        </div>
        <hr>
        <!--Search Doctor-->
        <form action="{{ url('/') }}" method="GET">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        Find Doctors
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="date" class="form-control" id="datepicker">

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Find Doctors</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--Display Doctors-->
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    Doctors
                </div>
                <div class="card-body">
                    @if ($doctors->isEmpty())
                        <p>No doctors available!</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Speciality</th>
                                    <th>Book</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><img src="{{ asset('images') }}/{{ $doctor->doctor->image }}" alt=""
                                                width ="60px" style="border-radius: 50%"></td>
                                        <td>{{ $doctor->doctor->name }}</td>
                                        <td>{{ $doctor->doctor->department }}</td>
                                        <td>
                                            <a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"><button
                                                    class="btn btn-success ">Book Appointment</button></a>
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
@endsection
