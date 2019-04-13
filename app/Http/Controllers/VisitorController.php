<?php

namespace App\Http\Controllers;

use Auth;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $visitors = Visitor::latest()->paginate(5);
        return response()->json($visitors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitors.create');
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
            'name' => 'required|max:50|string', 
            'email' => 'required|email|unique:visitors,email'
        ]);

        $visitor = new Visitor();

        $visitor->name = $request->get('name');
        $visitor->email = $request->get('email');
        $visitor->details = $request->get('details');
        $visitor->user_id = Auth::id();
        $visitor->save();

        return response()->json($visitor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitor = Visitor::find($id);
        return response()->json($visitor);
        // return view('visitors.show')->with('visitor', $visitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::where('id', $id)->first();
        return response()->json($visitor);
        // return view('visitors.edit')->with('visitor', $visitor);
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
        $this->validate($request, [
            'name' => 'required|max:50|string', 
            'email' => 'required|email|unique:visitors,email,'.$id,
        ]);

        $visitor = Visitor::find($id);

        $visitor->name = $request->get('name');
        $visitor->email = $request->get('email');
        $visitor->details = $request->get('details');
        $visitor->save();

        return response()->json($visitor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();

        return response()->json('Visitor Deleted');
    }
}
