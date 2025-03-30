<x-layout>
    
<title>Home</title>
    <h1>This is a Home Page</h1>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <div class="task tab">
        <h3>Your tasks:</h3>
        @if ($tasks)
            @foreach ($tasks as $task)
                {{ $task }}
            @endforeach
        @else
            <h6>You have no tasks.</h>
        @endif
    </div>
    <button type="button" name="action" value="create">Create New Task</button>
    <div> <br>
        <form action="{{ route('logging.out') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
    </div>

</x-layout>
