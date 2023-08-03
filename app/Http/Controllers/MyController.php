<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductionModel;
use DB;

class MyController extends Controller
{
    function welcome(){
        return view('WWelcome');
    }
    function registers(Request $request){

        $username = $request['username'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        $model = new MyModel;

        $model['Username']=$username;
        $model['Email']=$email;
        $model['Password']=$password;

        $model -> save();
        header("Location: wel");
        exit;
    }
    function run(){
        return view('SignUp');
    }
    function signUp(Request $request){
        $username = $request['txt'];
        $email = $request['email'];
        $password = $request['pswd'];

        $user = User::where(['Email'=> $email, 'Username'=>$username])->first();
        if ($user && hash::check($password,$user['Password'])){
            return view('product');
        }
        else{
            return view('error');
        }

        // $model = new MyModel;
        // $model = $model::get();
        // foreach ($model as $item) {
        //     if ($item['Username'] == $username){
        //         if ($item['Email'] == $email){
        //             if($item['Password'] == $password){
        //                 echo "Successfully";
        //             }
        //         }
        //     }
        // }
    }
    function getProduct(Request $request){
        $Yourdream = $request['favorite'];
        $ProductionModel = new ProductionModel;

        $ProductionModel['YourDream'] = $Yourdream;

        $ProductionModel -> save();
        return view('thank');

    }
    function toShow(Request $request){
        $model = new ProductionModel;
        $model = $model::get();

        return view('toShow')->with('md', $model);
    }
    function Todelete(Request $request){
        DB::table('production')->where('id', $request['id'])->delete();
        return redirect('toShow');
    }
    function repair(Request $request){
        $id = $request['id'];
        return view('repair')->with('id', $id);
    }
    function Repaired(Request $request){
        $id = $request['id'];
        $new = $request['change'];
        
        $result = DB::table('production')->where(['id' => $id])->update(['YourDream'=>$new]);
        return "Successfull";
    }
    function test(){
        return view('test');
    }
    function testpost(Request $request){
        $username = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $model = new MyModel;
        $model['Username'] = $username;
        $model['Email'] = $email;
        $model['Password'] = $password;

        $model->save();
        return view('logout')->with('user', $username);
    }
    function logOut(){
        $auth = new Auth;
        $auth::logout();
        return redirect('test');
    }
    function val(){
        return view('validate');
    }
    function valPost(Request $request){
        $username = $request->name;
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|max:20'
        ]);
        $remember = $request->has('remember') ? true : false;
        $user = new User();
        $user = User::where(['Username'=>$username, 'Email'=>$email], $remember)->first();
        if($user && hash::check($password , $user['Password'])){
            $auth = new Auth;
            $auth::login($user);
            return "successfull";
        }
        else {
            return "please try again";
        }
    }
    function MDsign(){
        return view('MDsign');
    }
    function MDpost(Request $request){
        $user = $request['name'];
        $password = $request['password'];

        $User = new User();
        $User = User::where('name', $user)->first();
        if($User && hash::check($password, $User['password'])){
            if($User['role'] == 1){
                return view('Admin');
            }
            if($User['role'] == 0){
                return view('Writer');
            }
            else{
                return "not found";            }
        }
    }
}
