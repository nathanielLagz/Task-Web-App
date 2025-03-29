<x-header>

<title>Login Page</title>

    <h1>Welcome to Login Page</h1>
    @if (session('loggedOut')) 
        <div>
            {{ session('loggedOut') }}
        </div>
    @elseif ($errors->has('username') || $errors->has('password'))
        <div>
            Invalid username/password.
        </div>
    @endif
    <h4>Enter credentials to log in.</h4>
    <div>
        <form action="{{ route('logging.in') }}" method="post">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    <div>
        <a href="{{ route('register.page') }}">Register</a>
    </div>
    
</x-header>
    