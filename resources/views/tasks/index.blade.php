@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <p>ログインユーザー名：　{{ Auth::user()->name }}</p>
        @if (count($tasks) > 0)
        <!--{{ $tasks }}-->
        
        {{ $users }}

        <h1>タスク一覧</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>
                        ステータス
                    </th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                @if( ( $task->user_id ) === ( Auth::user()->id ) )
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {!! link_to_route('tasks.create', 'タスク追加', [], ['class' => 'btn btn-primary']) !!}
    @endif

    @else
        <h2>ログイン前画面</h2>
    @endif
    
@endsection