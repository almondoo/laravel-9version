@php
$query = '';
$firstPage = 1;
$currentPage = $paginator->currentPage();
$lastPage = $paginator->lastPage();
$query_parameter = preg_replace('/\?.*/', '', url()->full());
if ($query_parameter) {
    $query = $query_parameter;
}
@endphp

<nav class="pagination">
  <ul class="pagination">
    <li class="page--item {{ $currentPage == $firstPage ? ' disabled' : '' }}">
      <a class="page--link"
        href="{{ $currentPage == $firstPage ? 'javascript:void(0);' : $paginator->url($firstPage) . $query }}">First</a>
    </li>
    @for ($i = $currentPage - 2; $i <= $currentPage - 1; $i++)
      @if ($i > 0 && $currentPage !== $firstPage)
        <li class="page--item txt--color">
          <a class="page--link" href="{{ $paginator->url($i) . $query }}">{{ $i }}</a>
        </li>
      @endif
    @endfor
    <li class="page--item txt--color active">
      <a class="page--link" href="javascript:void(0);">{{ $currentPage }}</a>
    </li>
    @for ($i = $currentPage + 1; $i <= $currentPage + 2; $i++)
      @if ($i <= $lastPage)
        <li class="page--item txt--color">
          <a class="page--link" href="{{ $paginator->url($i) . $query }}">{{ $i }}</a>
        </li>
      @endif
    @endfor
    <li class="page--item {{ $currentPage == $lastPage ? ' disabled' : '' }}">
      <a class="page--link"
        href="{{ $currentPage == $lastPage ? 'javascript:void(0);' : $paginator->url($lastPage) . $query }}">Last</a>
    </li>
  </ul>
</nav>
