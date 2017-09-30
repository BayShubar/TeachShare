<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Relation;

class TeachersController extends Controller{
   public function index(){
   	$teachersId = Relation::wherePerson(Auth::user()->id)->get();
      $teachers = [];
      foreach ($teachersId as $teacherId) {
         array_push($teachers, $teacherId->user);
      }
      return $teachers;
   }


   public function show($id){
         $teacher = User::whereId($id)->first();
         $teacher['teachers'] = count(Relation::wherePerson($id)->get());
         $teacher['materials'] = count(User::whereId($id)->first()->materials);
         $teacher['journals'] = count(User::whereId($id)->first()->journals);
         return $teacher;
    }

   //this route use to define that he follow him
   public function update(Request $request, $id){
      $star = Relation::whereStar($id);
      if(empty($star->first()))
      return Relation::create([
      			'star' => $id,
      			'person' =>Auth::user()->id
      		]);
      
      else return $star->delete();
    
   }


   //this is return does a person friend or not
   public function iFollow($id){
      $itisMe = User::whereId(Auth::user()->id)->first();
      $iFollow = $itisMe->iFollow;
      foreach ($iFollow as $f) 
       if($id == $f->star) return 'true';
      return 'false';
   }  


   //this is return list of teachers that you subscribed
   public function myTeachers($id){
         $relations = Relation::wherePerson($id)->get();
         $teachers = [];
         foreach ($relations as $relation) {
            array_push($teachers, $relation->user);
         }
         return $teachers;
   }

}
