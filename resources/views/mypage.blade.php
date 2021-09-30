<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- 文字コードセット -->
  <meta charset="UTF-8">
  <!-- タイトルセット -->
    <title>マイページ</title>
      
        
  
  <!-- CSSの読み込み -->
  <!--<link rel="stylesheet" href="./css/style.css">-->
</head>
    <body>
      <h1 class="top_logo"><p>趣民 ShuMin</p></h1>
      <h1>マイページ</h1>
        <header>
          <ul class="header_list">
            <a href="{{ url('/') }}">トップページ</a>
            <a href="{{ route('user_post') }}">掲示板</a>
            @auth
            @else
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">新規登録</a>
            @endauth
          </ul>
        </header>
        <main>
        <div class="content">
          <form method="POST" action="/mypage/{{ Auth()->user()->id }}">
            @csrf
            <h1>各情報編集</h1>
            <div class="edit_name">
              <h2>ニックネーム</h2>
              <h3>現在の名前</h3>
              <h3>{{ $user -> name }}</h3>
                変更したいニックネームを設定してください。
              <input type='text' name='name'placeholder="変更したいニックネームを入力">
            </div>
          
            <div class="edit_email">
              <h2>メールアドレス</h2>
              <h3>{{ $user -> email }}</h3>
              <input type='email' name='email'placeholder="変更したいメールアドレスを入力">
            </div>
          
            <div>
              <h2>お住いの都道府県</h2>
              <h3>{{ $user -> prefecture }}</h3>
              <select name = 'prefecture' value = "{{ $user -> prefecture }}">
              @foreach ($prefectures as $prefectures)
               <option value = "{{$prefectures->prefecture}}" >{{$prefectures->prefecture}}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group row mb-0">
              <button type="submit" class="btn">
                  編集
              </button>
            </div>
          </form>
          @if( !empty('success_message') )
           <p class="success_message"> {{session('success_message')}} </p>
          @endif  
          
              
        </div>
        </main>
    </body>
</html>