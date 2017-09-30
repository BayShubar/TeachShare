<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\User;
use Auth;
use App\Like;
use App\Comment;
use App\Photo;

class MaterialsController extends Controller{
    public function index(){
    	$materials = Material::get()->all();
    		foreach ($materials as $material){
    			$material->user;
                $material->likes;
                $material['commentsSum'] = count($material->comments);
                $material->photos;
            }
        $revers = array_reverse($materials);
        return $revers;
    }

    public function  show($id){
    		$material = Material::whereId($id)->first();
    		$material->user;
            $material->photos;
            foreach ($material->comments as $comment) {
                $comment->user;
            }
    		return $material;
    }

    public function selectToTeacher($id){
        $materials = User::whereId($id)->first()->materials;
        foreach ($materials as $material){ 
                $material->user;
                $material->likes;
                $material['commentsSum'] = count($material->comments);
        }
        return $materials;    
    }


    public function store(Request $request){
        $material = Material::create([
                'title'=>$request->title,
                'content' => $request->content,
                'user_id' => Auth::user()->id
            ]);

        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], "jpeg"))
                $extension = 'jpeg';
            else 
                $extension = "png";

        $fileName = str_random().'.'.$extension;

        $link = public_path()."/".$fileName;
        file_put_contents($link, $decoded);

        $p = Photo::create([
            "material_id" => $material->id,
            "link" => $fileName
        ]);


            return  $material;
    }


    public function edit($id){
        return Material::whereId($id)->first();
    }

    public function update(Request $request, $id){
        $material = Material::whereId($id);
        $material->update([
                'title'=>$request->title,
                'content' => $request->content,
            ]);
        return 'ok';
    }




        public function like($id){
            $like = Like::where('type', 'material')
                    ->where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
            $material = Material::whereId($id)->first();
            if(empty($like)){
                 Like::create([
                    'id' => $id,
                    'user_id' => Auth::user()->id,
                    'type' => 'material'
                    ]);
                return $material->likes;
            }else{
               Like::where('type', 'material')
                    ->where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->delete();
               return $material->likes;
            }
        }

    public function setComment(Request $request, $id){
       return Comment::create([
                'user_id' => Auth::user()->id,
                'material_id' => $id,
                'content' => $request->content
            ]);
    }

    public function getComment($id){
        $material = Material::whereId($id)->first();
        $comments = $material->comments;
         foreach ($comments as $comment) {
                $comment->user;
            }
        return $comments;
    }
}
