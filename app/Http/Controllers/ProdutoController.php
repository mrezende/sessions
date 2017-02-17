<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    //
    public function index()
    {
      $produtos = Produto::all();
      return view('produto.index', compact('produtos'));
    }

    public function cria()
    {
      return view('produto.cria');
    }

    public function armazena()
    {
      Produto::create(request()->all());
      return redirect('/produtos');
    }
}
