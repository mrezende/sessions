@extends('layouts.master')

@section('title', 'Produtos')

@section('page-header-content', 'Produtos')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Ações</h3>
        </div>
        <div class="panel-body">
          <p>
            <a href="/produtos/cria">
              <span class="glyphicon glyphicon-plus"> Produtos</span>
            </a>
          </p>
          @if(Session::has('produtos'))
            <p>
              <a href="/carrinho/exibe">
                <span class="glyphicon glyphicon-shopping-cart"> {{ Session::get('produtos')->count() }} Produtos</span>
              </a>
            </p>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($produtos as $produto)
            <tr>
              <td>{{ $produto->id }}</td>
              <td>{{ $produto->nome }}</td>
              <td>{{ $produto->preco }}</td>
              <th><a href="/carrinho/adiciona/{{ $produto->id }}"><span class="glyphicon glyphicon-shopping-cart"></span></a></th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
