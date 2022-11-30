<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function complated() {
        $Galleries = Gallery::where([
            ['user_id', '=' , Auth::user()->id],
            ['status', '=', 1],
            
            ])->get();
        return view('dashboard.complated', compact('Galleries'));
    }
    public function updateComplated($id)
    {
        Gallery::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);


        return redirect()->route('todo.complated')->with('Done', 'This Task Has Done. :D');
    }
    public function index()
    {
        $Galleries = Gallery::where([
            ['user_id', '=' , Auth::user()->id],
            ['status', '=', 0],
            
            ])->get();
        return view('dashboard.index', compact('Galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:3',
        ]);

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('todo.index')->with('successAdd', 'Berhasil Menambahkan Data Todo');

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    }
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Galleries= Gallery::where('id', $id)->first();
        return view('dashboard.edit', compact('Galleries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:3'
        ]);
        Gallery::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'status' => 0,
            'description' => $request->description,
            'user_id' => Auth::User()->id

        ]);

        return redirect()->route('todo.index')->with('berhasil', 'Succesfully Change Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Gallery::where('id', $id)->delete();
    return redirect()->back()->with('successDelete', 'Successfully Delete Data!');
    }
}
