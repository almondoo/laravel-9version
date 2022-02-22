<x-header title="タスク詳細ページ" />
<div class="top__content mb-3">
  <h1>タスク作成</h1>
</div>
<form method="POST" action="{{ !empty($task) ? route('task.update') : route('task.create') }}">
  @csrf
  <div class="form__list">
    <div class="field">
      <input placeholder="タイトル" type="text" name="title" class="field__input" value="{{ $task->title ?? '' }}" />
      <label class="field__label">タイトル</label>
    </div>
    @error('title')
      <x-error-text message="{{ $message }}" />
    @enderror
  </div>

  <div class="form__list">
    <div class="field">
      <textarea placeholder="内容" type="textarea" name="text" class="field__input"
        rows="8">{{ $task->text ?? '' }}</textarea>
      <label class="field__label">内容</label>
    </div>
    @error('text')
      <x-error-text message="{{ $message }}" />
    @enderror
  </div>
  <div class="button-group mt-2 left">
    <button><a href="#!">戻る</a></button>
    <input class="button contained" type="submit" value="作成" />
  </div>
</form>
<x-footer />
