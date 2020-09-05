@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong>New File</strong>
                        <a href="{{ route('admin.authenticated.files.index') }}" class="btn pull-right">
                            <i class="fa fa-times" title="Close"></i>
                        </a>
                    </div>
                    <form action="{{ route('admin.authenticated.files.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    	{{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="name">Name</label>
                                <div class="col-md-10">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="user_file">File</label>
                                <div class="col-md-10">
                                    <input type="file" id="user_file" name="user_file" class="form-control"required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="status">Status</label>
                                <div class="col-md-10">
                                    <select id="select" name="status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection