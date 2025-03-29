@extends('layout.app')

@section('title', 'The List of tasks')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">
            Add Task
        </a>
    </nav>


    <div>
        <!-- @if(count($tasks)) -->
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-bold', 'line-through' => $task->completed])> {{ $task->title }} </a>
            </div>
        @empty
            <div>There are no tasks!</div>
        @endforelse


        <!-- @endif -->
    </div>
    @if ($tasks->count())
        <nav class="mt-4">
            <div> Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }} results
        </nav>
        <nav> {{ $tasks->links('pagination::simple-bootstrap-5') }} </nav>
    @endif


@endsection
