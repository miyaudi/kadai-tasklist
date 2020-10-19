@extends('layouts.app')

@section('content')

    @if (Auth::check())
        {{ Auth::user()->name }}
        @if (count($tasks) > 0)
        @foreach ($tasks as $task)
            <p>{{ $task->user->name }}</p>
            <p class="mb-0">{!! nl2br(e($task->content)) !!}</p>
        @endforeach
        <h1>タスク一覧</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>
                        ステータス
                    </th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! link_to_route('tasks.create', '新規メッセージの投稿', [], ['class' => 'btn btn-primary']) !!}
    @endif

    @else
        <h2>LOgin</h2>
    @endif
    
@endsection