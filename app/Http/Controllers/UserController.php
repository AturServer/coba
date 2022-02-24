<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
//use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Post;
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //echo 'Halaman Index';
        $data['title']='Home';
        return view('user', $data); 
    }
    public function list(){
       $users = DB::table('users')->get();
       $data['title']='Home';
       $data['listUser']=$users;
        return view('user', $data);
       
    }
    
    
}