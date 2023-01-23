<footer class="blog-footer">
    <p>{{ $text }}</p>
    @php
      $counter = 2;
    @endphp
    
        <a href="{{ route('preset_all_news', ['counter' => $counter]) }}">На главную страницу >>></a>
    </p>
   <p><p>
        <a href="{{ route('category_news') }}">Выбрать категорию новостей >>> </a>
    </p>
    <p>
        <a href="{{ route('authorization_page') }}">Пройти авторизацию >>></a>
    </p>
    <p>
        <a href="{{ route('insert_news') }}">Добавить новость >>></a>
    </p>
</footer>
