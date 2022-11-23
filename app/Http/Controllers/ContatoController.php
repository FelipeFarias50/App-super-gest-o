<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function Contato(Request $request) {
        
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    
    }

    public function salvar(Request $request) {
        // $contato = new SiteContato();
        // $contato->create($request->all());

        //realizar a validação dos dados do formulário recebidos no $request
        

        $request->validate(
            [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
            ],
            [
                'nome.required' => 'O campo nome precisa ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'nome.unique' => 'O nome informado já está incluso',
                'telefone.required' => 'O número de telefone não pode ficar em branco',
                'email.email' => 'O campo email deve ser preenchido com um email válido',
                'motivo_contatos_id.required' => 'Selecione uma opção',
                'required' => 'O campo deve ser preenchido',
            ]
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}






/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function Contato(Request $request) {

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        print_r($contato->getAttributes());
        $contato->save();
        /**

        $contato = new SiteContato();
        $contato->fill($request->all());

        //print_r($contato->getAttributes());
        $contato->save();

        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
*/