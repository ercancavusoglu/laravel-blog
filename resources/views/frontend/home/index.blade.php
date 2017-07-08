@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <div class="panel panel-default">

                    <div class="panel-body">


                        @foreach($blogs as $value)
                            <h2>
                                <a href="{{ url("blog/".$value->slug) }}">
                                    {{ $value->name }}
                                </a>
                            </h2>
                            <p>
                                <span class="glyphicon glyphicon-time"></span>
                                Posted on
                                {{ $value->created_at->diffForHumans() }}
                            </p>
                            <hr>
                            <p>
                                {!! str_limit($value->content) !!}
                            </p>
                            <a class="btn btn-primary" href="{{ url("blog/".$value->slug) }}">
                                Read More
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                            <hr>
                        @endforeach


                    </div>
                </div>
            </div>


            @include("frontend._common.sidebar")

            @include("frontend._common.footer")


        </div>
        <!-- /.container -->

@endsection
