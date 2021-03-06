@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
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
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' =>'form-control input-lg']) }}
            </div>

            <div class="form-group">
                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, ['class' =>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Category:') }}
                {{ Form::select('category_id', $categories, /*default value*/$post->category_id, ['class' =>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('tags', 'Tags:') }}
                {{ Form::select('tags[]', $tags, null, ['class' =>'form-control select2-multi', 'multiple' => 'multiple']) }}
            </div>

            <div class="form-group">
                {{ Form::label('featured_image', 'Update Featured Image:') }}
                {{ Form::file('featured_image') }}
            </div>

            <div class="form-group">
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body', null, ['class' =>'form-control']) }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At: Date</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated: Date</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id ),array('class' => 'btn btn-danger btn-block')) !!}
                    </div>

                    <div class="col-sm-6"> 
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!--<dl class="dl-horizontal">
            <dt></dt>
            <dd></dd>
        </dl>-->
    </div><!-- end of .row (form)-->

@stop

@section('scripts')

   {!! Html::script('/js/select2.min.js') !!}

   <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2.val({!! json_encode($post->tags()->getRelated()) !!}).trigger('change');
   </script>

@endsection