@if(Auth::check())
    <p>Usuario: {{ Auth::user()->name}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    </p>
@endif
