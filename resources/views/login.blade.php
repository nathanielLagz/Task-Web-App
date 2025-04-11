<x-layout>
    <x-slot:title>Task Login Page</x-slot:title>
        <h1>Welcome to Task Login Page</h1>
        <x-error-status/>
        <h4>Enter credentials to log in.</h4>
        <div class="">
            <form action="{{ route('logging.in') }}" method="post">
                @csrf
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
        <a href="{{ route('register.page') }}"><button>Register</button></a>
</x-layout>
    