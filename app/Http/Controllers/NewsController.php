<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Pagination;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('type', 'News')->orderBy('created_at','desc')->paginate(6);
        $updates = News::where('type', 'Updates')->orderBy('created_at','desc')->paginate(6);
        return view('news.index')->with(['news' => $news, 'updates' => $updates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.news');
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
            'headline'      => 'required|string|min:5',
            'type'          =>  'required|in:News,Updates',
            'news'          =>  'required|string|min:20',
            'cover_image'   =>  'nullable|image|max:256'
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
        $news = new News();
        $news -> headline           = $request->input('headline');
        $news -> type               = $request->input('type');
        $news -> news               = $request->input('news');
        $news -> cover_image        = $fileNameToStore;
        $news -> save();

        return redirect('/news')->with('success', 'news and updates created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit')->with('news', $news);
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
            'headline'      => 'required|string|min:5',
            'type'          =>  'required|in:News,Updates',
            'news'          =>  'required|string|min:20',
            'cover_image'   =>  'nullable|image|max:256'
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }
        $news = News::find($id);
        $news -> headline           = $request->input('headline');
        $news -> type               = $request->input('type');
        $news -> news               = $request->input('news');
        if ($request->hasFile('cover_image'))
        {
            $news -> cover_image        = $fileNameToStore;
        }
        $news -> save();

        return redirect('/news')->with('success', 'news and updates updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news -> delete();
        return redirect('/news')->with('success', 'News/update deleted successfully');
    }
}
