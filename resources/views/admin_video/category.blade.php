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
                <form role="form" autocomplete="off">
                    <div class="entry input-group col-xs-3">
                        <input class="form-control" name="fields[]" type="text"/>
                    	<span class="input-group-btn">
                            <button class="btn btn-danger btn-remove" type="button">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                    </div>
                    <div class="entryTwo input-group col-xs-3">
                        <input class="form-control" name="fields[]" type="text"/>
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>

@endsection
