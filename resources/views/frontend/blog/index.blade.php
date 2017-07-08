@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <div class="panel panel-default">

                    <div class="panel-body">


                        <h2>
                            {{ $result->name }}
                        </h2>
                        <p>
                            <span class="glyphicon glyphicon-time"></span>
                            Posted on
                            {{ $result->created_at->diffForHumans() }}
                        </p>
                        <hr>
                        <p>
                            {!! $result->content !!}
                        </p>


                    </div>
                </div>
            </div>


            @include("frontend._common.sidebar")

            @include("frontend._common.footer")


        </div>
        <!-- /.container -->

@endsection
