@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="/map/dist/css/s.map.min.css">
    <link rel="stylesheet" href="/map/dist/css/fa/style.css">

    <link rel="stylesheet" href="/map/app/css/app.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body ">
                        <h2>{{$location->name}}</h2>
                        <a href=""><h5>{{$location->user->name}}</h5></a>
                        <ul>
                            <li><b>Address :</b> {{$location->address}}</li>
                        </ul>


                        <p>{{$location->description}}</p>

                        <br>
                        <br>

                        <div id="map" class="col-lg-11" style="height: 300px"></div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Pages</div>
                    <div class="card-body">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li><a href="{{route('category.create')}}">create category</a></li>
                            <li><a href="{{route('category.index')}}">manage category</a></li>
                            <li><a href="{{route('location.index')}}">all locations</a></li>
                            <li><a href="{{route('request.category.create')}}">Category request</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('map/dist/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('map/dist/js/jquery.env.js') }}"></script>

    <script type="text/javascript" src="{{ asset('map/dist/js/s.map.styles.js') }}"></script>
    <script type="text/javascript" src="{{ asset('map/dist/js/s.map.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            var map = $.sMap({
                element: '#map',
                presets: {
                    latlng: {
                        lat: {!! $location->latitude !!},
                        lng: {!! $location->longitude !!},
                    },
                    zoom: 16,
                },
            });

            $.sMap.layers.static.build({
                layers: {
                    base: {
                        default: {
                            server: 'https://map.ir/shiveh',
                            layers: 'Shiveh:ShivehNOPOI',
                            format: 'image/png',
                        },
                    },
                },
            });

            $.sMap.features();

            $.sMap.features.marker.create({
                name: 'test-marker',
                popup: {
                    title: {
                        html: 'address',
                        i18n: '',
                    },
                    description: {
                        html: '{!! $location->address !!}',
                        i18n: '',
                    },
                },
                latlng: {
                    lat: {!! $location->latitude !!},
                    lng: {!! $location->longitude !!},
                },
            });

        })
    </script>


@endsection
