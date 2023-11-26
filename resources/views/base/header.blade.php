<nav>
    <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/get-notes">Заметки</a></li>
        <li><a href="/posts">Посты</a></li>
    </ul>

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Выход
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>
</nav>