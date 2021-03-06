@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') Список новостей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Новости @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать новость</a>
 <br>
 
  <h1>Главные Новости</h1>
  <table class="table table-striped">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      
      @forelse ($articles as $article)
        @if ($article->categories()->first()->id == 1)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->published}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}

              <a class="btn btn-default" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>

              <button type="submit" class="btn btn-default"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
        @endif
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      {{-- <tr>
        <td colspan="3">
          <ul class="pagination pull-right">
            {{$articles->links()}}
          </ul>
        </td>
      </tr> --}}
    </tfoot>
  </table>
  
 <hr>
  <h1>Новости</h1>
  <table class="table table-striped">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      
      @forelse ($articles as $article)
        @if ($article->categories()->first()->id != 1)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->published}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}

              <a class="btn btn-default" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>

              <button type="submit" class="btn btn-default"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
        @endif
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
          <ul class="pagination pull-right">
            {{$articles->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
