<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::get();
        return view('backend.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lesson.create');
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
            'title'=> 'required',
            'lesson'=> 'required',
            'notification'=> 'required',
            'description'=> 'required'
            
        ]);

        Lesson::create([
            'title'=>$request->title,
            'lesson'=>$request->lesson,
            'notification'=>$request->notification,
            'description'=>$request->description
            
            
        ]);
        return redirect()->back()->with('message', 'Lesson created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lessons = Lesson::find($id);
        return view('backend.lesson.edit', compact('lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $this->validate($request, [
        'title'=>'required',
        'lesson'=>'required',
        'notification'=>'required',
        'description'=>'required'
    ]);
    $lesson = Lesson::find($id);
    $lesson->title = $request->title;
    $lesson->lesson = $request->lesson;
    $lesson->notification = $request->notification;
    $lesson->description = $request->description;
    $lesson->save();
    return redirect(route('lesson.index'))->with('message', 'Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessons = Lesson::find($id)->delete();
        return redirect()->route('lesson.index');
    }
}
