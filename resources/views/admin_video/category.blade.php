@extends('layout.admin')


@section('title', 'CRUD Category')

@section('contentTwo')
<br>
<br>
<h2>Category list</h2>
<form method="POST">
    @csrf
    <div class="form-group">
        <fieldset>
            <div class="col-md-8">
                <input class="form-control" id="categoryID" type="text" name="categoryID">
                <input class="form-control" id="" type="text" name="">
            </div>
        </fieldset>
    </div>

</form>

@endsection
@endsection
