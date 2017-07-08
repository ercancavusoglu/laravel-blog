@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include("flash::message")

            <div class="col-md-12">
                {!! Form::model($result,['method' => 'PATCH','route'=>['backend.category.update',$result->id]]) !!}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Category
                    </div>
                    <div class="panel-body">
                        {!! form_input("Title","name")  !!}
                        {!! form_input("Slug","slug")  !!}
                    </div>
                </div>

                {!! form_submit() !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
