@extends('layout.app')


@section('title', $task->title)



@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            <- Go Back to the task list! </a>
    </div>


    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)

        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>

    @endif


    <p class="mb-4 text-sm text-slate-500">Create {{ $task->created_at->diffForHumans() }} | Update
        {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>


    <div class="flex gap-3 ">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
        class="btn">Edit</a>

        <form method="POST" action="{{ route('task.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>


@endsection
