@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="float-left">Manage Categories</h1>
                        <a href="{{route('category.create')}}" class="float-right btn btn-primary btn-sm">create new category</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route('category.edit' , ['id' => $category->id])}}"
                                           class="btn btn-sm btn-warning">edit</a>
                                        <a href="javascript:;" onclick="hello({{$category->id}})"
                                           class="btn btn-danger btn-sm">delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade">
        <form action="" method="post" id="deleteForm">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function hello(cat_id) {
            a = confirm('are you sure delete category with id ' + cat_id + " ?");
            if (a) {
                var id = cat_id;
                var uri = '{{route('category.destroy' , ":id")}}'
                uri = uri.replace(':id' , id);
                $("#deleteForm").attr('action' , uri);
                $("#deleteForm").submit();
            }
        }
    </script>
@endsection
