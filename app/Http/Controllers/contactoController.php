<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use App\contacto;
use App\noticia;

use App\Http\Resources\contactoCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\mymail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




        class contactoController extends Controller
        {
            public function store(Request $request)
            {
//        $nombre = $request->get('nombre');
//        $comentario = $request->get('comentario');
//        $email2 = $request->get('correo');





                $post = new contacto([
            'nombre' => $request->get('nombre'),
            'telefono' => $request->get('telefono'),
            'correo' => $request->get('correo'),
            'comentario' => $request->get('comentario'),
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


        return response()->json('Formulario llenado correctamente');





//
//            $image = $request->get('image');
//            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
//            \Image::make($request->get('image'))->save(public_path('images/').$name);




    }

    public function index()
    {
        return new contactoCollection(contacto::all());

    }


    public function delete($id)
    {
        $post = contacto::find($id);

        $post->delete();

        return response()->json('Eliminado satisfactoriamente');
    }
}
