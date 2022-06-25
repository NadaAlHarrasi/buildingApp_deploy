<?php

namespace App\Http\Controllers;

use App\Auth;
use App\User;
use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Http\Validator;
use App\Imports\IssuesImport;
use App\Mail\IsseRequestSubmitted;
use Maatwebsite\Excel\Facades\Excel;


class IssuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['test']);
    }
    public function list(){
        $data['users'] = User::all();
        return view('issues.list',$data);
    }

    //
    public function store(Request $request)
    {
        // return $request;
        
        $issue = new Issue();
            $issue->name= $request->name;
            $issue->email= $request->email;
            $issue->phone= $request->phone;
            $issue->msg= $request->message;
            $issue->building_number= $request->building_number;
            $issue->apartment_number= $request->apartment_number;
            $issue->user_id = Auth::user()->id;
            $issue->attachment= null;
            $issue->save();
            
            \Mail::to($issue->email)->send(new IsseRequestSubmitted($issue));
            return "Record is created successfully";

        }

    
        public function test(){
        return "This is a test function";

    }
    public function importFromExcel(Request $request) 
    {
        // //add validation to uplod only xslx file
        // $request->validate([
        //     'excelFile' => 'required|mimes:xslx'
        //  ]);
        
        Excel::import(new IssuesImport, $request->excelFile);
        
        return "Data imported successfully";
    }
}