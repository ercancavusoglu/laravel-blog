@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include("flash::message")

            <div class="col-md-12">
                {!! Form::open(['method'=>'post','route'=>'backend.category.store']) !!}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Category
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
