<div class="status/errors" style="font-style: italic; color: red;">
    @if (session()->hasAny(['status','error']))
        {{ session('status') !== null? session('status') : session(key: 'error') }}
    @elseif($errors->any() && request()->is('register'))
        <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
        </ul>
    @elseif ($errors->has('username') || $errors->has('password'))
        Please enter usename/password.
    @endif
</div>