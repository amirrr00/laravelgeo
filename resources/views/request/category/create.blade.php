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
                <div class="card">
                    <div class="card-header">Search near stores</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('request.category.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Location
                                    Category</label>

                                <div class="col-md-6">
                                    <select id="category_id" type="text"
                                            class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                            name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="radius" class="col-md-4 col-form-label text-md-right">Location radius in km</label>

                                <div class="col-md-6">
                                    <input id="radius" type="text"
                                           class="form-control{{ $errors->has('radius') ? ' is-invalid' : '' }}"
                                           name="radius" value="{{ old('radius') }}" required autofocus>

                                    @if ($errors->has('radius'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('radius') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                <div class="col-lg-12"><label class="col-md-4 col-form-label text-md-right">location in map</label></div>
                                <div id="map" class="col-lg-12" style="height: 300px"></div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
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

    <script type="text/javascript" src="{{ asset('map/app/js/app.js') }}"></script>
@endsection

