<footer class="blog-footer">
    <p>{{ $text }}</p>
    @php
      $counter = 2;
    @endphp
    
        <a href="{{ route('hw_6.preset_all_news') }}">На главную страницу >>></a>
    </p>
    <p>
        <a href="{{ route('hw_6.news.index') }}">Изменить новость >>></a>
    </p>
</footer>
