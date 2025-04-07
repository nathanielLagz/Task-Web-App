<x-layout>
    
<title>Home</title>
    <h1>This is a Home Page</h1>
    <x-error-status/>
    <div class="task tab">
        <h3>Your tasks:</h3>
        @if ($tasks)
            <ul style="">
                @foreach ($tasks as $task)
                    <li><a href="/home/{{ $task->task_name }}">{{ $task->task_name  }}</a></li> 
                    {{ $task->description }} <br>
                    {{ $task->end_date_time }}
                @endforeach
            </ul>
        @else
            <h6>You have no tasks.</h>
        @endif
    </div>
    @csrf
    <a href="{{ route('create.task') }}"><button>Create New Task</button></a>
    <div> <br>
        <form action="{{ route('logging.out') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
    </div>

</x-layout>
