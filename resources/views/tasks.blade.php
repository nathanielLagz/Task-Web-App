<x-layout>
    <x-slot:title>Create New Task</x-slot:title>
    <div class="card">
        <h1>Create New Task</h1>
        <x-error-status/> 
        @if (request()->is('home/create'))
            <form action="{{ route('creating.task') }}" method="post">
        @else
            <form action="{{ route('update.task', $task) }}" method="post">
            @method('patch')
        @endif
            @csrf
            <label for="task">Task Name:</label>
            <input type="text" name="task_name" value="{{ $task->task_name ?? old('task_name')}}">
            
            <label for="description">Decription:</label> <br>
            <textarea name="description" cols="100" rows="3">
                {{ $task->description ?? old('description') }}
            </textarea> <br>

            <label for="date">Date:</label>
            <input type="datetime-local" name="end_date_time" value="{{ $task->end_date_time ?? old('end_date_time') }}">
            
            <button type="submit">
            {{ request()->is('home/create') ? 'Create Task' : 'Update Task'}}
        </button>
        </form>
    </div>
    <a href="{{ route('home.page') }}">Back to Home</a>
</x-layout>