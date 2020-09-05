<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use File;
use UserFile;

class UserFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['user_files'] = UserFile::orderBy('id','DESC')->paginate(5);
        return view('admin.user-file.index', $data);
    }

    public function deletedFiles()
    {
        $data = [];

        $data['user_files'] = UserFile::withTrashed()->paginate(5);
        return view('admin.user-file.deleted', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
 
        $validator = Validator::make($request->all(), 
            [
                'name'              => 'required|min:2|unique:user_files,name' ,
                'user_file'         => 'required|mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif|max:2048',
            ],
            [
                'user_file.mimes'  => 'This file type is not supported. Acceptable formats are txt,doc,docx,pdf,png,jpeg,jpg,gif',
                'user_file.max'    => 'Maximum File size is 2 MB',
            ],
            );

        if($validator->fails()) {
            $data['errors'] = $validator->errors();
        }
        else {
            $user_file   = $request->file('user_file');
            $file_src = "";
            
            if(!empty($user_file)){

                $user_file_name  = time().$user_file->getClientOriginalName();
                $destinationPath = 'backend/user_files/';
                $file_src        = $destinationPath. $user_file_name;

                $user_file->move($destinationPath, $file_src);
            }

            $file               = new UserFile($request->all());
            $file->file         = $user_file_name;
            $file->save();

            $data['user_file']  = $file;
        }

        if(!empty($data['errors'])){
            return redirect()->route('admin.authenticated.files.create')->withErrors($data['errors']);
        }
        else{
            return redirect()->route('admin.authenticated.files.index')->with('success','Successfully Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = UserFile::findOrFail($id);
        $file->delete();
        
        return redirect()->route('admin.authenticated.files.index')->with('success','Successfully Removed!');
    }
}
