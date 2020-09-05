@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                @if($user_files->count() > 0)
                     <input type="text" placeholder="Search..." class="my-search form-control">
                @endif
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>Files
                        <a href="{{ route('admin.authenticated.files.create') }}" class="btn btn-success pull-right">Add New File</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Document</th>
                                    <th>File Name</th>
                                    <th>Created Date & Time</th>
                                    <th>Deleted Date & Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="my-table">
                                @if (!empty($user_files))
                                    @foreach ($user_files as $user_file)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user_file->name }}</td>
                                            <td><a href="{{ asset('backend/user_files/'.$user_file->file) }}" target="_blank">{{ $user_file->file }}</a></td>
                                            <td><?php echo date('d-m-Y h:i A', strtotime($user_file->created_at)) ?></td>
                                            <td><?php echo date('d-m-Y h:i A', strtotime($user_file->deleted_at)) ?></td>
                                            <td>
                                            @if ($user_file->status == 1)
                                                <span class="badge" style="background-color: #349037;color: #fff;">Active</span>
                                            @else
                                                <span class="badge" style="background-color: #d8190b;color: #fff;">Inactive</span>
                                            @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.authenticated.files.destroy', $user_file->id) }}" method="post" style="display: inline-block;">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mr-2">
                        <ul class="pagination pull-right">
                            <li class="page-item">{{ $user_files->links() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection