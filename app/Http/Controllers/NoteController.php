<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Note;
use App\Http\Resources\Note as NoteResource;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::paginate(15);

        return NoteResource::collection($notes);
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
        $note = $request->isMethod('put') ? Note::findOrFail($request->id) : new Note;
        $note->title = $request->input('title');
        $note->description = $request->input('description');
        $note->notebooks_id = $request->input('notebooks_id');
        if($note->save()) {
            return new NoteResource($note);
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
        $note = Note::findOrFail($id);
        return new NoteResource($note);
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
        $note = Note::findOrFail($id);
        $note->title = $request->input('title');
        $note->description = $request->input('description');
        if($note->save()) {
            return new NoteResource($note);
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
        $note = Note::findOrFail($id);
        if($note->delete()) {
            return new NoteResource($note);
        }
    }

    /**
     * Return the specified notebook notes
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notebook($id)
    {
        $notes = Note::where('notebooks_id', $id)->get();
        return new NoteResource($notes);
    }
}
