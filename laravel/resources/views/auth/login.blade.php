<x-header title="ログインページ" />
<div class="login-page">
  <div class="card">
    <div class="card-content">
      <div class="title">
        <h1>アカウント作成</h1>
      </div>
      <form method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form__list">
          <div class="field">
            <input placeholder="メールアドレス" type="email" name="user_email" class="field__input"
              value="{{ old('user_email') }}" />
            <label class="field__label">メールアドレス</label>
          </div>
          @error('user_email')
            <p class="error-txt">{{ $message }}</p>
          @enderror
        </div>

        <div class="form__list">
          <div class="field">
            <input placeholder="パスワード" type="password" name="user_password" class="field__input" />
            <label class="field__label">パスワード</label>
          </div>
          @error('user_password')
            <p class="error-txt">{{ $message }}</p>
          @enderror
        </div>

        <div class="form__list">
          <label>
            <input type="checkbox" name="user_is_remember" {{ old('user_is_remember') ? 'checked' : '' }}>
            ログイン情報を保存する
          </label>
          @error('user_is_remember')
            <p class="error-txt">{{ $message }}</p>
          @enderror
        </div>

        <input class="button contained is-full text-align__center mt-2" type="submit" value="ログイン" />
      </form>
    </div>
  </div>
</div>
<x-footer />
