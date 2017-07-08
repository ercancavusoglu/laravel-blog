@extends('layouts.backend')

@section('content')

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-12">

            @include('flash::message')


            <!-- Domain-->
                <div class="panel panel-default col-sm-12">
                    <div class="panel-heading">
                        <h3>
                            Blogs
                        </h3>

                        <a href="{{ route("backend.blog.create") }}" class="btn btn-primary">
                            Add New Blog
                        </a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>Title</th>
                            <th>Slug</th>
                            <th style="width:200px"></th>
                            </thead>
                            <tbody>
                            @foreach($blogs as $item)
                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                    {{ $item->slug }}
                                    <td>

                                        <ul class="list-inline list-unstyled">
                                            <li>
                                                <a href="{{route('backend.blog.edit',$item->id)}}"
                                                   class="btn btn-success btn-ss" title="Edit">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                {{ Form::open(array('route' => array('backend.blog.destroy', $item->id), 'method' => 'delete')) }}
                                                <button type="submit" class="btn btn-danger" title="Delete">
                                                    Delete
                                                </button>
                                                {{ Form::close() }}
                                            </li>
                                        </ul>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $blogs->links() }}
                </div>
                <!-- Domain-->


            </div>
        </div>
    </div>


@endsection
