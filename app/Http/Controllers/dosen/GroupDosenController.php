<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Group;
use App\User;
use App\File;

class GroupDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_dosen = auth()->user()->id;
        $groups = Group::with('users')->where('user_id',$id_dosen)->get();
        return view('dosen.group.view', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role','mahasiswa')->get();
        return view('dosen.group.form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'image' => 'required',
            'users' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')){
            $imagename = '/upload/group/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/group/'), $imagename);
        }
        
        $input = new Group;
        $input->name = $request->name;
        $input->image = $imagename;
        $input->description = $request->description;
        
        auth()->user()->group()->save($input);
        $input->users()->sync($request->users);

        return redirect()->route('groupdosen.index')->with('success', 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = File::where('group_id',$id)->get();
        $data = Group::findOrFail($id);
        return view('dosen.group.detail', compact('data','files'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('role','mahasiswa')->get();
        $group = Group::with('users')->where('id', $id)->first();
        return view('dosen.group.edit_group', compact('users','group'));   
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
        $input = $request->all();
        $group = Group::findOrFail($id);
        $input['image'] = $group->image;
        $input['users'] = $group->users()->sync($request->users);


        if ($request->hasFile('image')){
            if (!$group->image == NULL){
                unlink(public_path($group->image));
            }
            $input['image'] = '/upload/group/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/group'), $input['image']);
        }

        if ($group->update($input)) {
            return redirect()->route('groupdosen.index')->with('success', 'Edited');
        }
    }

    public function uploadfiledosen(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|max:100',
            'file' => 'required|file|max:2000'
        ]);
        $uploadedFile = $request->file('file');        
        $path = $uploadedFile->store('public/groupfile');
        $file = File::create([
            'title' => $request->title ?? $uploadedFile->getClientOriginalName(),
            'filename' => $path,
            'group_id' => $request->group
        ]);
        return redirect()
            ->back()
            ->withSuccess(sprintf('File %s has been uploaded.', $file->title));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Group::destroy($id)){
            return redirect()->route('groupdosen.index')->with('success', 'Deleted');
        }   
    }
}
