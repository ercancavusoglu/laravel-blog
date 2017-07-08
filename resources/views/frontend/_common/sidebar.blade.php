<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <div class="panel panel-default">

        <div class="panel-body">


            <!-- Blog Search Well -->
            <div>
                {{ Form::open(['route' => ['search'], 'method' => 'GET']) }}

                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control" name="search"/>
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            {{ Form::close() }}

            <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div>
                <h4>Blog Categories</h4>
                <div class="row">


                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($allCategories as $category)
                                <li>
                                    <a href="{{ url("category/".$category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>

</div>
<!-- /.row -->