@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @foreach($locations as $location)
                    <div class="card mb-3">
                        <div class="card-body ">
                            <h2>{{$location->name}}</h2>
                            <a href=""><h5>{{$location->user->name}}</h5></a>
                            <ul>
                                <li><b>Address :</b> {{$location->address}}</li>
                                <li><b>Map :</b> <a href="#">Click here to see in googel map</a>
                                <b>latitude : </b>{{$location->latitude}}
                                <b>Longitude :</b>{{$location->longitude}}
                                </li>
                            </ul>
                            <p>{{$location->description}}</p>
                            <a href="{{route('location.show' , [$location->id])}}" class="btn btn-secondary float-right">go to location page</a>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="col-md-4">

                {{-- Category Widget --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body">


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
