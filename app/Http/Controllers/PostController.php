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

    public function action(Request $request){
   if(isset($_POST['btnSave'])){
    $this->validate($request,[
    'title' => 'required|min:5|max:20',
    'description' => 'required', 
    ]);
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
    //click btn update
    if(isset($_POST['btnUpdate'])){
    $id= $request->id;
    $post = Post::findOrFail($id);

    $saveUpdate=$post->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'updated_at'=>date('Y-m-d H:i:s')
    ]);


    if($saveUpdate==true){
    return redirect('post')->with('status', 'Update Success !!!');
    }
    else{
    echo'GAGAL';
    }
    }
    
    return redirect('post')->with('status', 'No Action !!!');
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
