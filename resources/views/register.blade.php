<x-layout>
<title>Register</title>
    <h1>Register your credentials.</h1>
    <x-error-status/>
    <div>
        <form action="{{ route('registering') }}" method="post">
            @csrf
            <label for="email">Enter email address</label>
            <input type="email" name="email" value="{{ old('email') }}">

            <label for="username">Enter Username:</label>
            <input type="text" name="username" value="{{ old('username') }}">
            
            <label for="password">Enter Password:</label>
            <input type="password" name="password">
            
            <label for="password">Confirm password:</label>
            <input type="password" name="password_confirmation">
            
            <button type="submit">Register</button>
        </form>
    </div>
    <div>
        <a href="{{ route('login.page') }}">Back to Login</a>
    </div>
</x-layout>
