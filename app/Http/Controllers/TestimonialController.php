<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['testimoni_who', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['testimoni_as', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['testimoni_content', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['testimonials'] = \App\Testimonial::paginate($paginate);
        }
        else {
            $data['testimonials'] = \App\Testimonial::where($where)->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        return view('testimonial.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonial.create');
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
            'testimonial_who' => 'required|string|min:5|max:50',
            'testimonial_as' => 'required|string|min:5|max:50',
            'testimonial_status' => 'required',
            'testimonial_content' => 'required|string',
            'testimonial_image' => 'required'
        ]);

        $testimonial = new \App\Testimonial;
        $testimonial->testimoni_who = $request->testimonial_who;
        $testimonial->testimoni_as = $request->testimonial_as;
        $testimonial->testimoni_status = $request->testimonial_status;
        $testimonial->testimoni_content = $request->testimonial_content;

        if($request->testimonial_image != null)
        {
            $image = $request->testimonial_image
                ->store('testimonials', 'public');
            $testimonial->testimoni_image = $image;
        }

        $simpan = $testimonial->save();

        if($simpan){
            return redirect()->route('testimonials.index')->with('success', 'Created Testimonial Successfully');
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
        $data['testimonial'] = \App\Testimonial::find($id);
        return view('testimonial.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['testimonial'] = \App\Testimonial::find($id);
        return view('testimonial.edit', $data);
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
            'testimonial_who' => 'required|string|min:5|max:50',
            'testimonial_as' => 'required|string|min:5|max:50',
            'testimonial_status' => 'required',
            'testimonial_content' => 'required|string'
        ]);

        $testimonial = \App\Testimonial::find($id);
        $testimonial->testimoni_who = $request->testimonial_who;
        $testimonial->testimoni_as = $request->testimonial_as;
        $testimonial->testimoni_status = $request->testimonial_status;
        $testimonial->testimoni_content = $request->testimonial_content;

        if($request->testimonial_image != null)
        {
            $image = $request->testimonial_image
                ->store('testimonials', 'public');
            $testimonial->testimoni_image = $image;
        }

        $ubah = $testimonial->save();

        if($ubah){
            return redirect()->route('testimonials.index')->with('info', 'Updated Testimonial Successfully');
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
        $testimonial = \App\Testimonial::find($id);
        $hapus = $testimonial->delete();
        if($hapus){
            return redirect()->route('testimonials.index')->with('warning', 'Deleted Testimonial Successfully');
        }
    }
}
