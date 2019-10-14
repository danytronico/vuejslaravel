<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class loginController extends Controller
{
    public function index(Request $request)
    {
        $table = DB::table('logins')->select('usuario', 'clave','id')->where('usuario',$request->get('usuario'))->where('clave',$request->get('clave'))
            ->get();

        if(count($table)!= 0){

            return response()->json($table);

        }else{

            return response()->json('error');

        }

    }


    public function index2(Request $request)
    {
        $users = DB::table('logins')->select('notification')->where('id', '=', 1)->first()->notification;

        return response()->json($users);


    }
}
