<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? '' }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <header class="header">
    <a class="logo" href="/">
      <img class="img" src="{{ asset('/images/logo.png') }}" />
    </a>
    <ul class="list">
      <li>
        <a href="/">Home</a>
      </li>
      <li>
        <div class="dropdown">
          <button>Fake</button>

          <div class="dropdown__content">
            <ul class="menu-list">
              <li>fake</li>
              <li>faker</li>
              <li>fakest</li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
    <div class="button-group left">
      <button class="button contained is-secondary"><a href="{{ route('register') }}">アカウント作成</a></button>
      <button class="button"><a href="{{ route('login') }}">ログイン</a></button>
    </div>
  </header>
  <div class="header-spacer"></div>
  <div class="out-inner">
