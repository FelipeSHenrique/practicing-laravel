<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Tarefa::where('resolvido', 0)->delete();

        // Tarafa::where('resolvido', 0)->update([
        //     'resolvido' => 1
        // ]);

        // $t = Tarefa::find(3);
        // $t->titulo = 'Dormir';
        // $t->save();

        // $t = new Tarefa;
        // $t->titulo = 'Testando pelo Eloquent';
        // $t->save();

        echo "Salvo com sucesso";
        // return view('welcome');
    }
}
