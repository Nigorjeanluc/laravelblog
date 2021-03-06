@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
    {!! Html::style('/css/parsley.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
    <script src="/js/tiny/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link lists code image imagetools',
            menubar: false,
            /*menu: {
                view: {title: 'Edit', items: 'cut, copy, paste'}
            }*/
            /*toolbar: 'undo redo | cut copy paste'*/
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '',
                        'minlength' => '5', 'maxlength' => '255']) }}
                </div>
                <div class="form-group">
                {{ Form::label('category_id', 'Category:') }}
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('tags', 'Tags:') }}
                    <select multiple class="form-control select2-multi" name="tags[]">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{ Form::label('featured_image', 'Upload featured Image:') }}
                    {{ Form::file('featured_image') }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', "Post Body") }}
                    {{ Form::textarea('body', null,['class' => 'form-control','rows' => '10'/*, 'required' => ''*/]) }}
                </div>
                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')

   {!! Html::script('/js/parsley.min.js') !!}
   {!! Html::script('/js/select2.min.js') !!}

   <script type="text/javascript">
    $('.select2-multi').select2();
   </script>

@endsection
