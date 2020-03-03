    @extends('layout.admin')


    @section('title', 'Video index')


    @section('contentTwo')
        <div class="container-fluid">
            <br />
            <br />
            <div align="right">
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
            </div>
            <br />
            <div class="table-responsive">
                <table id="user_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">Created at</th>
                            <th width="5%">Updated at</th>
                            <th width="5%">Youtube_UID</th>
                            <th width="5%">Title</th>
                            <th width="5%">Description</th>
                            <th width="5%">Category</th>
                            <th width="5%">Reviews</th>
                            <th width="5%">Video Available?</th>
                            <th width="5%">Suitable for Kids?</th>
                            <th width="5%">Created by</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <br />
            <br />
        </div>

        <!--MODALS-->

        <div id="formModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Record</h4>
                    </div>
                        <div class="modal-body">
                            <span id="form_result"></span>
                            <form method="post" id="sample_form" class="form-horizontal">
                                @csrf
                            <div class="form-group">
                                <label class="control-label col-md-4" for="youtube_uid">Youtube UID:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="youtube_uid" type="text" name="youtube_uid">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="title">Title:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="title" type="text" name="title" >
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="description">Description:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" id="description" type="text" name="description">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="category">Choose a category:</label>
                                    <div class="col-md-8">
                                        <select multiple class="form-control" name="category" id="category">
                                            <option value="">--Please choose an option--</option>
                                            {{-- @foreach ($categories as $category) --}}
                                            <option value="cat1">cat1</option>
                                            <option value="cat2">cat2</option>
                                            <option value="cat3">cat3</option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="checkbox">
                                        <label for="available_to_watch"><input type="checkbox" id="available_to_watch" name="available_to_watch" >Video is available to watch</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-8">
                                    <div class="checkbox">
                                        <label for="suitable_for_kids"><input type="checkbox" id="suitable_for_kids" name="suitable_for_kids">Suitable for kids</label>
                                    </div>
                                </div>
                            </div>

                                <br />
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action" value="Add" />
                                    <input type="hidden" name="id" id="hidden_id" />
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>

        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Delete video</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                    </div>
                    <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{asset('js/videoindex.js')}}"></script>
    @endpush
