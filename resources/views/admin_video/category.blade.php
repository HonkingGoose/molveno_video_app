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
                <div class="entry input-group col-xs-3">
                    <form action="/admin/category/<nummer>/update" role="form" autocomplete="off">
                        <input onblur="this.form.submit();" class="form-control" name="name" type="text" value="{{$category->name}}">
                    </form>
                    <form action="/admin/category/delete" role="form" autocomplete="off">
                        <span class="input-group-btn">
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                            <button class="btn btn-danger btn-remove" type="button">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                    </form>
                </div>
                @endforeach
                <div class="entryTwo input-group col-xs-3">
                    <form method="POST" id="myForm" action="{{ route('category.store') }}" role="form" autocomplete="off">
                        @csrf
                        <input class="form-control" name="name" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-add" type="button">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scriptsTwo')
<script src="{{asset('js/categoryindex.js')}}"></script>
@endpush
