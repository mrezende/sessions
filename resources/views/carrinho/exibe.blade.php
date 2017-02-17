@extends('layouts.master')

@section('title', 'Produtos adicionados ao carrinho')

@section('page-header-content', 'Produtos adicionados ao carrinho')

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
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="title">Produtos</h3>
        </div>
        @if(Session::has('produtos') and !Session::get('produtos')->isEmpty())
          <ul class="list-group">
            @foreach (Session::get('produtos') as $produto)
              <li class="list-group-item">
                {{ $produto->nome }}
                <a class="pull-right" href="/carrinho/remove/{{ $produto->id }}" data-method="delete" data-token="{{ csrf_token() }}">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
              </li>
            @endforeach
          </ul>
        @else
          <div class="panel-body">
            <h3>Não há produtos no carrinho<h3>
          </div>
        @endif
      </div>
    </div>
  </div>


@endsection

@section('scripts')
  <script type="text/javascript">
    $(function(){
      $("a[data-method='delete']").click(function(e){
        e.preventDefault(); // impede o link de redirecionar para outra página

        var link = $(this);
        var method = link.data('method');
        var token = link.data('token');
        var url = link.attr('href');

        var data = { '_method' : method, '_token' : token };
        $.post(url, data)
          .done(function(data){
            link.parent().remove();

            var links = $("a[data-method='delete']");
            if(links.length ==0)
            {
              $(".panel ul").append("<div class='panel-body'><h3>Não há produtos no carrinho</h3></div>");
            }
          })
          .fail(function(data){
            alert("Fail: " + data);
          });

      });
    });
  </script>
@endsection
