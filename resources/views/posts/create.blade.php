@extends('layouts.app')

@section('content')
   
    <h1>新規投稿</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => 'posts.store','enctype' =>'multipart/form-data']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'Item title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
        
                <div class="form-group">
                    {!! Form::label('content', 'File details') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','rows' => '4']) !!}
                </div>
        
                
                
                <div>
                    {!! Form::label('image', 'Post Image') !!}<br>
                    {!! Form::file('image', null, ['class' => 'form-control-file']) !!}
                    {{--<label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">--}}
                    
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                
                </div>
                
                <div class="pt-5">
                {!! Form::submit('投稿', ['class' => 'btn btn-secondary']) !!}
                </div>
                
            {!! Form::close() !!}
        </div>
    </div>
</form>
@endsection