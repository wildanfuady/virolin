<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoresponder;
use Illuminate\Support\Facades\Auth;

class AutoresponderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data['auto'] = Autoresponder::where('user_id', $user_id)->get();
        return view('autoresponder.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autoresponder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $auto = new Autoresponder;
        $auto->auto_title = $request->auto_title;
        $auto->auto_status = $request->auto_status;
        $auto->auto_content = $request->auto_content;
        $auto->user_id = $user_id;
        $simpan = $auto->save();

        if($simpan){
            return redirect('autoresponders')->with('success', 'Created Autoresponder Successfully');
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
        $user_id = Auth::user()->id;

        $data['auto'] = Autoresponder::where('user_id', $user_id)->where('auto_id', $id)->first();
        return view('autoresponder.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;

        $data['auto'] = Autoresponder::where('user_id', $user_id)->where('auto_id', $id)->first();
        return view('autoresponder.edit', $data);
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
        $auto = Autoresponder::find($id);
        $auto->auto_title = $request->auto_title;
        $auto->auto_status = $request->auto_status;
        $auto->auto_content = $request->auto_content;
        $ubah = $auto->save();

        if($ubah){
            return redirect('autoresponders')->with('info', 'Updated Autoresponder Successfully');
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
        $auto = Autoresponder::find($id);
        $hapus = $auto->delete();
        if($hapus){
            return redirect('autoresponders')->with('warning', 'Deleted Autoresponder Successfully');
        }
    }
}
