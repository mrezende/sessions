@extends('layouts.master')

@section('title', 'Cadastro de produto')

@section('page-header-content', 'Cadastro de produto')

@section('content')

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Ações</h3>
        </div>
        <div class="panel-body">
          <a href="/produtos">
            <span class="glyphicon glyphicon-th-list"> Produtos</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <form action="/produtos" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="form-group">
          <label for="preco">Preço</label>
          <input type="text" class="form-control" name="preco" id="preco">
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
      </form>
    </div>
  </div>


@endsection
