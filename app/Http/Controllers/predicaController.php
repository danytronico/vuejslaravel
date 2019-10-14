<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\predica;
use App\noticia;

use App\Http\Resources\predicaCollection;

class predicaController extends Controller
{
    public function store(Request $request)
    {


        if(empty($request->file('imagen'))){


            $post = new predica([
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'pastor' => $request->get('pastor'),
                'imagen' => 'no hay imagen',
                'link' => $request->get('link'),
                'status' => $request->get('status')



            ]);


            $post->save();

            $users = DB::table('logins')->select('notification')->where('id', '=', 1)->first()->notification;


            $add = $users + 1;


            $noti = DB::table('logins')
                ->where('id', 1)
                ->update(['notification' => $add]);


            $post2 = new noticia([
                'titulo' => $request->get('titulo'),
                'tabla' => $request->get('status'),


            ]);


            $post2->save();

            return response()->json('Formulario Llenado Correctamento');

        }else{
            $image = base64_encode(file_get_contents($request->file('imagen')));


            $post = new predica([
                'titulo' => $request->get('titulo'),
                'descripcion' => $request->get('descripcion'),
                'pastor' => $request->get('pastor'),
                'imagen' => $image ,
                'link' => $request->get('link'),
                'status' => $request->get('status')



            ]);


            $post->save();

            $users = DB::table('logins')->select('notification')->where('id', '=', 1)->first()->notification;


            $add = $users + 1;


            $noti = DB::table('logins')
                ->where('id', 1)
                ->update(['notification' => $add]);


            $post2 = new noticia([
                'titulo' => $request->get('titulo'),
                'tabla' => $request->get('status'),


            ]);


            $post2->save();

            return response()->json('Formulario Llenado Correctamento');



        }


    }

    public function index()
    {
        $table = DB::table('predicas')->where('status', 'sermon')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index2()
    {
        $table = DB::table('predicas')->where('status', 'devocional')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index3()
    {
        $users = DB::table('predicas')->where('status', 'sermon')
            ->orderBy('id', 'desc')->limit(3)

            ->get();

        return response()->json($users);

    }

    public function index4()
    {
        $users = DB::table('predicas')->where('status', 'devocional')
            ->orderBy('id', 'desc')->limit(3)

            ->get();

        return response()->json($users);
           }


    public function update($id, Request $request)
    {

//        $image = base64_encode(file_get_contents($request->file('imagen')));



        $table= DB::table('predicas')
            ->where('id', $id)
            ->update(['titulo' => $request->get('titulo') ,
                    'descripcion' => $request->get('descripcion'),
                    'pastor' => $request->get('pastor') ,
                    'link' => $request->get('link'),



                ]

            );

        return response()->json('Fila Actualizada Correctamente');
    }


    public function image($id, Request $request)
    {

        $image = base64_encode(file_get_contents($request->file('imagen')));



        $table= DB::table('predicas')
            ->where('id', $id)
            ->update([
                    'imagen' => $image,

                ]

            );

        return response()->json('Imagen Subida Correctamente');
    }

    public function delete($id)
    {
        $post = predica::find($id);

        $post->delete();

        return response()->json('Eliminado satisfactoriamente');
    }



}
