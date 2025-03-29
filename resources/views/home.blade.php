<x-header>
<title>Home</title>
    <h1>This is a Home Page</h1>
    @if (session('success'))
        <div>
            {{ session('success') }}
    </div>
    @endif
    <h4>Your tasks:</h4>
    
    <form action="{{ route('logging.out') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
</x-header>
