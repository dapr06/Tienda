@if(Auth::check())
    <p>Usuario: {{ Auth::user()->name }}

    <?php

    $user=Auth::user();

if($user->esAdmin()){
    echo "eres admin";
}else{
    echo "eres cliente";
}
?>




    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    </p>
@endif
