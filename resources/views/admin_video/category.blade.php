@extends('layout.admin')


@section('title', 'CRUD Category')

@section('contentTwo')
<br>
<br>
<h2>Category list</h2>

<div class="container">
    <div class="row">
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">List of Categories</label>
            <div class="controls">
                @foreach ($categories as $category)
                <div class="input-group col-xs-3">
                    <form action="/admin/category/<nummer>/update" role="form" autocomplete="off">
                        <div class="input-group-btn">
                            <input class="form-control" name="name" type="text" value="{{$category->name}}">
                            <button class="btn btn-primary btn-add" type="button">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </div>
                    </form>
                    <form action="/admin/category/delete">
                        <input type="hidden" name="category_id" value="{{ $category->id}}">
                        <div class="input-group-btn">
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <button class="btn btn-danger btn-remove" type="button" name="delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
                <div class="input-group col-xs-3">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="input-group-btn">
                            <input class="form-control" name="name" type="text">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
