@extends('layouts.master')
@section('title', 'Tarefas cadastradas')
@section('subtitle', 'Tarefas cadastradas')
@section('content')

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tarefas cadastradas</h3>
                               @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" 
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
  @endif
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

             
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                   
                <tr>
              
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Data e hora - início </th>
                  <th>Data e hora - fim </th>
                  <th>Data e hora - início/usuário </th>
                  <th>Data e hora - fim/usuário </th>
                  <th>Usuário </th>
                  <th>Status</th>
                  <th>Ação</th>
                </tr>
                 @foreach($tasks as $task)
                <tr>
            
                  <td>{{$task->titleTask}}</td>
                 <td>{{$task->descriptionTask}}</td>
                  <td>{{$task->startTask}}</td>
                <td>{{$task->endTask}}</td>
                  <td>{{$task->startTaskuser}}</td>
                <td>{{$task->endTaskuser}}</td>
              
                <td>{{$users->name}}</td>
         
                <td><span class="label label-success">Encerrada</span></td>
                          <td>
                                            <a href="{{route('tasks.edit', $task->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar">Editar</a>

                                            &nbsp;<form style="display: inline-block;" method="POST" 
                                                        action="{{route('tasks.destroy', $task->id)}}"                                                        
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Excluir" 
                                                        onsubmit="return confirm('Confirma exclusão?')">
                                                {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                                <button type="submit" style="background-color: #fff">
                                                    <a>Excluir</a>                                                    
                                                </button></form></td> 
                </tr>
                    @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
 

@endsection
