<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    
    public function index(Request $request) {

        $nome = 'Felipe';
        $idade = 22;

        $lista = [
            'farinha',
            'ovo',
            'margarina',
            'chocolate'
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'lista' => $lista
        ];

        return view('admin.config', $data);
    }

    public function info() {
        echo "Configurações INFO 3";
    }

    public function permissioes() {
        echo "Configurações PERMISSÕES 3";
    }

}
