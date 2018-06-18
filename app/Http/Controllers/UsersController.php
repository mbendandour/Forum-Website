<?php
/**
 * Created by PhpStorm.
 * User: mbendandour
 * Date: 6/13/18
 * Time: 2:05 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Mail\AccountDeletion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class UsersController extends Controller
{



    public function deleteuser($id){


        $user = User::findOrFail($id);

        $user->delete();

        Mail::to($user->email)->send(new AccountDeletion($user));
        return redirect()->back();


    }

    public function userpage(){

       $users = User::all();

        return view('administrator.admindeleteuser', compact('users'));
    }


    public function assign_admin($id){

        $user = User::findOrFail($id);
        if($user->admin == false){

            $user->admin = (true);
            $user->save();

        }else{

            $user->admin = (false);
            $user->save();
        }


        return redirect()->back();
    }

    public function assignpage(){

        $users = User::all();

        return view('administrator.assignadmin', compact('users'));
    }

    public function edit_info($id){

        $user = User::findOrFail($id);

            return view('user_edits.edit_info', compact('user'));


    }

    public function updateInfo(Request $request)
    {
        $user = User::findOrFail($request['user_id']);

            $user->username = $request['username'];
            $user->bio = $request['bio'];
            $user->save();

        return redirect()->back();
    }




}