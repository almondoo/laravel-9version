<x-header title="タスク詳細ページ" />
<div class="task__list--page">
  <div class="top__content mb-3">
    <h1>タスク一覧</h1>
  </div>
  <form method="GET" action="{{ route('task.list') }}">
    <div class="form__list mb-1">
      <div class="field">
        <input placeholder="検索" type="text" name="search" class="field__input" value="{{ old('title') }}" />
        <label class="field__label">検索</label>
      </div>
      @error('title')
        <x-error-text message="{{ $message }}" />
      @enderror
    </div>

    <div class="button-group left">
      <input class="button contained" type="submit" value="検索" />
    </div>
  </form>
  @isset($tasks)
    <div class="table__wrap">
      <table class="table mt-3">
        <thead>
          <tr>
            <th class="text--middle">ID</th>
            <th class="text--middle">タイトル</th>
            <th class="text--middle">テキスト</th>
            <th class="text--middle user--name">作成者</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tasks as $task)
            <tr>
              <td class="text--middle">
                <a href="{{ route('task.detail', ['id' => $task->id]) }}">{{ $task->id }}</a>
              </td>
              <td>{{ $task->title }}</td>
              <td>{{ $task->text }}</td>
              <td class="text--middle">{{ $task->user->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $tasks->links('components.pagination') }}
  @endisset
</div>
<x-footer />
