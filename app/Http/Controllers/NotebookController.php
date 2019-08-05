<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Notebook;
use App\User;
use App\Http\Resources\Notebook as NotebookResource;
use App\Http\Controllers\AuthController as Auth;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request->user('api')->id;

        $notebooks = Notebook::where('users_id', $id)->paginate(15);

        return NotebookResource::collection($notebooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notebook = new Notebook;
        $notebook->name = $request->input('name');
        $notebook->users_id = $request->user('api')->id;

        if($notebook->save()) {
            return new NotebookResource($notebook);
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
        $notebook = Notebook::findOrFail($id);
        return new NotebookResource($notebook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $notebook = Notebook::findOrFail($id);
        $notebook->name = $request->input('name');
        if($notebook->save()) {
            return new NotebookResource($notebook);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notebook = Notebook::findOrFail($id);
        if($notebook->delete()) {
            return new NotebookResource($notebook);
        }
    }
}
