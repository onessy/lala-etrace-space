<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $home = Home::orderBy('created_at', 'DESC')->get();

        return view('properties.index')->with('home',$home);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.new');
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
            'name'          => 'required|string',
            'type'          => 'required|in:Servant quarter,Single,Bedsitter,Hostel,1 bedroom,2 bedroom,Apartment,Other',
            'availability'  => 'required|string|in:Bookable,Un-bookable',
            'location'      => 'required|string',
            'rent'          => 'required|string',
            'desc'          => 'required|string|max:400|min:20',
            'status'        => 'required|string',
            'cover_image' => 'required|image|max:256',
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
            $home = new Home();
            $home -> name           = $request->input('name');
            $home -> type           = $request->input('type');
            $home -> availability   = $request->input('availability');
            $home -> location       = $request->input('location');
            $home -> rent           = $request->input('rent');
            $home -> desc           = $request->input('desc');
            $home ->by              = auth()->user()->name;
            $home -> status         = $request->input('status');
            $home -> cover_image    = $fileNameToStore;
            $home ->save();

            return redirect('/homes')->with('success', 'new house record was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = Home::find($id);
        return view('properties.view')->with('home', $home);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Home::find($id);
        return view('properties.edit')->with('home', $home);
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
            'name'          => 'required|string',
            'type'          => 'required|in:Servant quarter,Single,Bedsitter,Hostel,1 bedroom,2 bedroom,Apartment,Other',
            'availability'  => 'required|string|in:Bookable,Un-bookable',
            'location'      => 'required|string',
            'rent'          => 'required|string',
            'desc'          => 'required|string|max:400|min:20',
            'cover_image'   => 'nullable|image|max:256',
        ]);

        if ($request->hasFile('cover_image'))
        {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);

        }

        $home = Home::find($id);
        $home -> name           = $request->input('name');
        $home -> type           = $request->input('type');
        $home -> availability   = $request->input('availability');
        $home -> location       = $request->input('location');
        $home -> rent           = $request->input('rent');
        $home -> desc           = $request->input('desc');
        $home ->by              = auth()->user()->name;
        if ($request->hasFile('cover_image'))
        {
            $home->cover_image = $fileNameToStore;
        }
        $home ->save();

        return redirect('/homes')->with('success', 'selected house record was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home::find($id);
        $home -> delete();
        return redirect('/home')->with('success', 'record was successfully deleted from the server');
    }

    public function pStatus($id)
    {
        $home = Home::find($id);
        return view('properties.status')->with('home', $home);
    }

    public function propertyStatus(Request $request, $id)
    {
        $this->validate($request,[
            'availability'     => 'required|string|in:Bookable,Un-bookable',
            'status'           => 'required|string|in:Booked,Reserved,Vacant,Under Repairs',
            'priority'         => 'required|string|in:Priority 1,Priority 2,Priority 3,Priority 4,Priority 5,Priority 6,
                                    Priority 7,Priority 8,Priority 9,Priority 10',
        ]);

        $home = Home::find($id);
        $home -> availability = $request->input('availability');
        $home -> status       = $request->input('status');
        $home -> priority     = $request->input('priority');
        $home -> save();

        return back()->with('success', 'record status updated successfully');

    }
    public function houses()
    {
        $home = Home::all();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'portrait');
        $fileName = "homename";
        return $pdf->stream($fileName.'.pdf');
    }
}
