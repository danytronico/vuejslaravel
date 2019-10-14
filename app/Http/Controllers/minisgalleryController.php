<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\minisgalery;
use App\noticia;

use App\Http\Resources\minisgalleryCollection;


class minisgalleryController extends Controller
{
    public function store(Request $request)
    {


        if(empty($request->file('imagen'))){


            $post = new minisgalery([
                'titulo' => $request->get('titulo'),
                'imagen' => 'no hay imagen',
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


            $post = new minisgalery([
                'titulo' => $request->get('titulo'),
                'imagen' => $image ,
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
        $table = DB::table('minisgaleries')->where('status', 'hombres')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index2()
    {
        $table = DB::table('minisgaleries')->where('status', 'mujeres')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index3()
    {
        $table = DB::table('minisgaleries')->where('status', 'matrimonio')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index4()
    {
        $table = DB::table('minisgaleries')->where('status', 'jovenes')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index5()
    {
        $table = DB::table('minisgaleries')->where('status', 'niños')->orderBy('id', 'desc')->get();

        return response()->json($table);    }

    public function index6()
    {
        return new minisgalleryCollection(minisgalery::all());
    }


    public function update($id, Request $request)
    {

//        $image = base64_encode(file_get_contents($request->file('imagen')));



        $table= DB::table('minisgaleries')
            ->where('id', $id)
            ->update(['titulo' => $request->get('titulo')]);

        return response()->json('Fila Actualizada Correctamente');
    }

    public function image($id, Request $request)
    {

        $image = base64_encode(file_get_contents($request->file('imagen')));



        $table= DB::table('minisgaleries')
            ->where('id', $id)
            ->update([
                    'imagen' => $image,

                ]

            );

        return response()->json('Imagen Subida Correctamente');
    }

    public function delete($id)
    {
        $post = minisgalery::find($id);

        $post->delete();

        return response()->json('Eliminado satisfactoriamente');
    }





}
