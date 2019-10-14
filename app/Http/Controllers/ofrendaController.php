<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ofrenda;
use App\noticia;

use App\Http\Resources\ofrendaCollection;


class ofrendaController extends Controller
{
    public function store(Request $request)
    {




        $post = new ofrenda([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'telefono' => $request->get('telefono'),
            'cedula' => $request->get('cedula'),
            'correo' => $request->get('correo'),
            'ocupacion' => $request->get('ocupacion'),
            'ofrenda' => $request->get('ofrenda'),
            'direccion' => $request->get('direccion'),
            'tablanombre' => $request->get('tabla')


        ]);


        $post->save();

        $users = DB::table('logins')->select('notification')->where('id', '=', 1)->first()->notification;


        $add = $users + 1;


        $noti = DB::table('logins')
            ->where('id', 1)
            ->update(['notification' => $add]);


        $post2 = new noticia([
            'titulo' => $request->get('nombre'),
            'tabla' => $request->get('tabla'),


        ]);


        $post2->save();

        return response()->json('Formulario Llenado Correctamento');





//
//            $image = $request->get('image');
//            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
//            \Image::make($request->get('image'))->save(public_path('images/').$name);




    }


    public function index()
    {

        return new ofrendaCollection(ofrenda::all());


    }


    public function update($id, Request $request)
    {
        $table= DB::table('ofrendas')
            ->where('id', $id)
            ->update(['nombre' => $request->get('nombre') ,
                    'apellido' => $request->get('apellido'),
                    'telefono' => $request->get('telefono'),
                    'cedula' => $request->get('cedula'),
                    'correo' => $request->get('correo'),
                    'ocupacion' => $request->get('ocupacion'),
                    'ofrenda' => $request->get('ofrenda'),
                    'direccion' => $request->get('direccion'),
                ]

            );

        return response()->json('Fila Actualizada Correctamente');
    }


    public function delete($id)
    {
        $post = ofrenda::find($id);

        $post->delete();

        return response()->json('Eliminado satisfactoriamente');
    }





}
