<x-layout>
<x-slot:title>Task Home Page</x-slot:title>
    <h1>This is a Home Page</h1>
    <x-error-status/>
    <h3>Your tasks:</h3>
    @if (!$tasks->isEmpty())
        <ul>
        @foreach ($tasks as $task)
            <div class="card info">
                <h6><li><p><a href="{{ route('edit.task', $task) }}">
                {{ $task->task_name  }}
                    </a></p></li></h6>
                <p> {{ $task->description }} </p> <br>
                <p> {{ $task->end_date_time }} </p>
                <form action="{{ route('delete.task', $task) }}" method="post" onsubmit="return confirm('This will delete your task.');">
                    @csrf
                    @method('delete')
                    <button type="submit" >
                        Delete Task
                    </button>
                </form>
            </div>
        @endforeach
        </ul>
    @else
        <h6><p>You have no tasks.</p></h6>
    @endif
    <a href="{{ route('create.task') }}"><button>Create New Task</button></a>
    <div> <br>
        <form action="{{ route('logging.out') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
    </div>

</x-layout>
