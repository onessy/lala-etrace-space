<?php

namespace App\Http\Controllers;

use App\Testmony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Testmony::orderBy('created_at', 'DESC')->get();
        return  view('testimony.index')->with('test', $test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimony.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required|string',
            'title'     =>  'required|string',
            'comment'   => 'string|required',
            'email'     =>  'required|email|string',
            'cover_image' => 'image|nullable|max:150'
            ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $comment = new Testmony();
        $comment -> name        = $request->input('name');
        $comment -> email       = $request->input('email');
        $comment -> title       = $request->input('title');
        $comment -> body     = $request->input('comment');
        $comment -> cover_image = $fileNameToStore;
        $comment -> save();

        return redirect('/testimony')->with('success', 'testimony added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Testmony::find($id);
        return view('testimony.view')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Testmony::find($id);
        return view('testimony.edit')->with('comment', $comment);
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
        $this->validate($request,[
            'name'      => 'required|string',
            'title'     =>  'required|string',
            'comment'   => 'string|required',
            'email'     =>  'required|email|string',
            'cover_image' => 'image|nullable|max:150'
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }

        $comment = Testmony::find($id);
        $comment -> name        = $request->input('name');
        $comment -> email       = $request->input('email');
        $comment -> title       = $request->input('title');
        $comment -> body     = $request->input('comment');
        if ($request->hasFile('cover_image'))
        {
            $comment->cover_image = $fileNameToStore;
        }
        $comment -> save();

        return redirect('/testimony')->with('success', 'testimony updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $comment = Testmony::find($id);
       $comment->delete();
       return redirect('/testimony')->with('success', 'the record was successfully deleted');
    }
}
