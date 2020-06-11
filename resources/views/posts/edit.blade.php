@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} post編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'Item title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content', 'File details:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '4']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-secondary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
        
@endsection