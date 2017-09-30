<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;
use App\Subject;
use Auth;
use App\User;

class JournalController extends Controller{

    public function index(){
        $journals = Journal::get()->all();
        foreach ( $journals as $journal) {
            $journal->subjects;
        }
        return $journals;
    }

    public function selectToTeacher($id){
        $teacher = User::whereId($id)->first();
        $journals = $teacher->journals;
        foreach ($journals as $journal) {
            $journal->subjects;
        }
        return $journals;
    }

    public function store(Request $request){
    	$id = Journal::create(['user_id' => Auth::user()->id ])->id;
    	foreach ($request->all() as $data) {
    		Subject::create([
    					'journal_id' => $id,
    					'name' => $data['name'],
    					'description' => $data['description']
    			]);
    	}

    	return $request->all();
    }
}
