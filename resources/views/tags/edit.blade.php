@extends('main')

@section('title', "Edit Tag")

@section('content')

    {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
        <div class="form-group">
            {{ Form::label('name', "Title:") }}
            {{ Form::text('name', null,['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
    {{ Form::close() }}

@endsection