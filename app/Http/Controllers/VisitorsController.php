<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;

class VisitorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('visitors.index');
    }

    public function create(){
        return view('visitors.create');
    }
    
    public function edit($id){
        return view('visitors.edit')->with('id', $id);
    }

    public function show($id){
        $visitor = Visitor::find($id);
        return response()->json($visitor);
    }
}
