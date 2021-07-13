<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Document</title>
</head>
<body>
  <div class="global">
  <div class="global__content">
  <h2 class="header__title">Todo List</h2>
  <div class="content__box">
    @error('content')
    <h3>Error : {{$message}}</h3>
    @enderror
    <form action="/todo/create" method="post" class="content__box__form">
      @csrf
      <input type="text" name="content" class="content__text" value="{{old('content')}}">
      <input type="submit" class="content__btn" value="追加">
    </form>

    <table  class="content__table">
      <tr class="content__table__tr">
        <th class="content__table__th">作成日</th>
        <th class="content__table__th">タスク名</th>
        <th class="content__table__th">更新</th>
        <th class="content__table__th">削除</th>
      </tr>

      @foreach($items as $item)
      <tr class="content__table__tr">
        <td>{{$item -> updated_at}}</td>
        <form action="/todo/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$item -> id}}">
        <td><input type="text" name="content" class="content__text__re" value="{{$item ->content}}"></td>
        <td><input type="submit" method="post" class="content__text__btn" value="更新"></td>
        </form>

        <form action="/todo/delete" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$item -> id}}">
        <td><input type="submit" class="content__delete__btn" value="削除"></td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>
  </div>
  </div>
</body>
</html>