<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\noticia;

use App\Http\Resources\noticiaCollection;
use Illuminate\Support\Facades\DB;

class noticiaController extends Controller
{
    public function index()
    {
        $users = DB::table('noticias')
            ->orderBy('id', 'desc')->limit(3)

            ->get();

        return response()->json($users);

    }

    public function index2()
    {
        return new noticiaCollection(noticia::all());


    }



    public function delete($id)
    {
        $post = noticia::find($id);

        $post->delete();

        return response()->json('Eliminado satisfactoriamente');
    }


    public function update($id, Request $request)

    {

        $users = DB::table('logins')->select('notification')->where('id', '=', $id)->first()->notification;


        $add = $users * 0;


        $noti = DB::table('logins')
            ->where('id', $id)
            ->update(['notification' => $add]);


        return response()->json('No hay notificaciones');
    }

}
