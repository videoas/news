 <label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($article->id))
    <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title or ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug or ""}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
  @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

   <input type="hidden" name="viewed" value="0">


<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>
<hr> 

<h4>Загрузка Фото </h4> 

<label for=""> Фото 1</label>
 <input type="file" name="image[]" value="1">
 <hr>
 <label for="">Фото 2</label>
 <input type="file" name="image[]" value="2">
  <hr>
 <label for="">Фото 3</label>
 <input type="file" name="image[]" value="3">
  <hr>

 <label for="">Фото 4</label>
 <input type="file" name="image[]" value="4">
<hr>
 <hr>
 <label for="">Фото 4</label>
 <input type="file" name="image[]" value="4">
<hr>


<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title or ""}}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description or ""}}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keyword or ""}}">



<input class="btn btn-primary" type="submit" value="Сохранить"> 
