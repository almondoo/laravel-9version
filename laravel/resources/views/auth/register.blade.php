<x-header title="ユーザー作成" />
<div class="register-page">
  <div class="card">
    <div class="card-content">
      <div class="title">
        <h1>アカウント作成</h1>
      </div>
      <form method="POST" action="{{ route('user.register') }}">
        @csrf
        <div class="form__list">
          <div class="field">
            <input placeholder="名前" type="text" name="user_name" class="field__input"
              value="{{ old('user_name') }}" />
            <label class="field__label">名前</label>
          </div>
          @error('user_name')
            <p class="error-txt">{{ $message }}</p>
          @enderror
        </div>

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
          <div class="field">
            <input placeholder="パスワード再確認" type="password" name="user_password_confirmation" class="field__input" />
            <label class="field__label">パスワード確認</label>
          </div>
          @error('user_password_confirmation')
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


        <div class="button-group mt-2 left">
          <button>戻る</button>
          <input class="button contained" type="submit" value="作成" />
        </div>
      </form>
    </div>
  </div>
</div>
<x-footer />
