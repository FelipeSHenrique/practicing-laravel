<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    
    // public function list() {
    //     $list = DB::select('SELECT * FROM tarefas');

    //     return view('tarefas.list', [
    //         'list' => $list
    //     ]);
    // }

    // public function add() {
    //     return view('tarefas.add');
    // }

    // public function addAction(Request $request) {
    //     if ($request->filled('titulo')) { // Verifica se o campo title está preenchido

    //         $titulo = $request->input('titulo');

    //         DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo' => $titulo]);

    //         return redirect()->route('tarefas.list');

    //     } else {
    //         return redirect()->route('tarefas.add')->with('warning', 'Você não preencheu o titulo');
    //     }

    // }

    // public function edit($id) {

    //     $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
    //         'id' => $id
    //     ]);

    //     if (count($data) > 0) {
    //         return view('tarefas.edit', [
    //             'data' => $data[0]
    //         ]);
    //     } else {
    //         return redirect()->route('tarefas.list');
    //     }

    // }

    // public function editAction(Request $request, $id) {
    //     if ($request->filled('titulo')) {

    //         $titulo = $request->input('titulo');

    //         $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
    //             'id' => $id
    //         ]);
    
    //         if (count($data) > 0) {
                
    //             DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
    //                 'id' => $id,
    //                 'titulo' => $titulo
    //             ]);
    //         } 
    //         return redirect()->route('tarefas.list');
    //     } else {
    //         return redirect()->route('tarefas.edit', ['id'=>$id])->with('warning', 'Você não preencheu o titulo');
    //     }
    // }   

    // public function del($id) {
    //     DB::delete('DELETE FROM tarefas WHERE id = :id', [
    //         'id' => $id
    //     ]);

    //     return redirect()->route('tarefas.list');
    // }

    // public function done($id) {

    //     DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
    //         'id' => $id
    //     ]);

    //     return redirect()->route('tarefas.list');
    // }

    public function list() {
        // $list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();

        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add() {
        return view('tarefas.add');
    }

    public function addAction(Request $request) {
        //Validação usando o proprio laravel
        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');

        // DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)', ['titulo' => $titulo]);
        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.list');
    }

    public function edit($id) {

        // $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);
        $data = Tarefa::find($id);

        if ($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }

    }

    public function editAction(Request $request, $id) {

        $request->validate([
            'titulo' => [ 'required', 'string' ]
        ]);

        $titulo = $request->input('titulo');

        // $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);

        // $t = Tarefa::find($id);
        // $t->titulo = $titulo;
        // $t->save();

        //ou

        Tarefa::find($id)->update(['titulo'=>$titulo]);

        return redirect()->route('tarefas.list');

        // if (count($data) > 0) {
            
        //     DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
        //         'id' => $id,
        //         'titulo' => $titulo
        //     ]);
        // } 
    }   

    public function del($id) {
        // DB::delete('DELETE FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);
        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }

    public function done($id) {

        // DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
        //     'id' => $id
        // ]);

        $t = Tarefa::find($id);
        if ($t) {
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }

        return redirect()->route('tarefas.list');
    }

}
