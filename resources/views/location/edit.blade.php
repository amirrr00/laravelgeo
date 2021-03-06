@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit <b>{{$location->name}}</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('location.update' , [$location->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Location Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{$location->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Location
                                    Category</label>

                                <div class="col-md-6">
                                    <select id="category_id" type="text"
                                            class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                            name="category_id" value="{{ old('category_id') }}" required autofocus>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $location->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                <label for="description" class="col-md-4 col-form-label text-md-right">Location
                                    Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              name="description" required>
                                        {{$location->description}}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Location
                                    Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{$location->address}}" required>


                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">Location Lat,Long</label>


                                <div class="col-md-6 input-group">
                                    <input id="latitude" type="text"
                                           class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"
                                           placeholder="latitude"
                                           name="latitude" value="{{$location->latitude}}" required>
                                    <input id="longitude" type="text"
                                           class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}"
                                           placeholder="longitude"
                                           name="longitude" value="{{$location->longitude}}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" id="getLocation">Send Your
                                            Location
                                        </button>
                                        <div id="javad"></div>
                                    </div>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
    <script>
        $(document).ready(function () {
            $("#getLocation").click(function () {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }



            });
        });
        function showPosition(position) {
            $("#latitude").val(position.coords.latitude);
            $("#longitude").val(position.coords.longitude);
        }
    </script>
@endsection
