<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    //
    public function index(){
       $users = DB::table('posts')->get();
       $data['title']='Home';
       $data['listUser']=$users;
        return view('posts', $data);
       
    }

    public function post(Request $request){
   if(isset($_POST['btnSave'])){
      
    $save=Post::create([
    		'title'=>$request->title,  
            'description'=>$request->description,       
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
    	]);
        if($save==true){
          return redirect('post')->with('status', 'Success !!!');
        }
        else{
            echo'GAGAL';
        }
    }
    return redirect('post')->with('status', 'Dikembalikan tujuan salah !!!');
    /*
    $data = array(
    array(          
        'title'=>'Judul1',
        'description'=>$des,       
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')),
    );

     $ini=DB::table('posts')->insert($data);
    if($ini==true){
       return redirect('post');
    }*/
    }
    public function edit(){
       
       $users = DB::table('posts')->get();
       $data['title']='Home';
       $data['listUser']=$users;
        return view('posts', $data);
       
    }
}
