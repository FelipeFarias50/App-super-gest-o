<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor');
    }
}  




// condicao ? se verdade : se falso;
// condicao ? se verdade : (condicao ? se verdade : se falso);
 
// $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';      
// echo $msg;