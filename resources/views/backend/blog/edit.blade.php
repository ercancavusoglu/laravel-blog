@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include("flash::message")

            <div class="col-md-12">
                {!! Form::model($result,['method' => 'PATCH','route'=>['backend.blog.update',$result->id]]) !!}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Blog
                    </div>
                    <div class="panel-body">
                        {!! form_input("Title","name")  !!}
                        {!! form_input("Slug","slug")  !!}
                        {!! form_textarea("content","Content")  !!}
                        {!! form_selectbox("Category","category_id",$categories) !!}
                    </div>
                </div>

                {!! form_submit() !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
