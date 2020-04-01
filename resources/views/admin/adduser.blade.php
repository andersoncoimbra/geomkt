@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>Adicionar Produtor</h1>
@stop

@section('content')
<div class="col-md-6">
        <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Formulario de cadastro de produtor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.adduser.post')}}" >
                {{ csrf_field() }}
              <div class="box-body">
              <div class="form-group">
                  <label>Nome Completo</label>
                  <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control">
              </div>
              <div class="form-group">
                  <label>CNPJ</label>
                  <input type="text" name="cnpj" class="form-control">
              </div>
              <div class="form-group">
                  <label>Cep</label>
                  <input type="text" name="cep" class="form-control">
              </div>
              <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" name="end" class="form-control">
              </div>
              <div class="form-group">
                  <label>Cidade</label>
                  <input type="text" name="cidade" class="form-control">
              </div>
              <div class="form-group">
                  <label>Telefone Celular</label>
                  <input type="text" name="fone" class="form-control">
              </div>
              <div class="form-group">
                  <label>Tipo de cooperado</label>
                  <select class="form-control" name="tipo">
                        <option value="">Selecione o tipo</option>
                        <option value="1">Estrativista</option>
                        <option value="2">Produtor</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email"  name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
            </form>
          </div>
</div>
<div class="col-md-6">
        <div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Produtores</h3>
            </div>
            <!-- /.box-header -->
            <!-- List start -->

            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                            @foreach($prod as $pro) 
                            <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->cpf}}</td>                            
                            <td>{{$pro->email}}</td>
                            <td>{{$pro->tipo() }}</td>
                            </tr>

                            @endforeach
                    </tbody>
            </table>
        </div>
</div>
@stop
