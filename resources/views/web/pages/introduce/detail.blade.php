@extends('web.layout') 
@section('title', 'Gạch Hạ Long')
@section('css')

@endsection
@section('js')

@endsection

@section('content')
<div class="single">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-sm-10 col-sm-offset-1">
                <!-- Title -->
                <h1 class="mt-4">Bài giới thiệu mẫu</h1>
                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">Admin</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on January 1, 2017 at 12:00 PM</p><br>
                <h5><span class="label label-danger">Tin tức</span> <span class="label label-primary">Giới thiệu</span></h5>
                <hr>

                <!-- Preview Image -->
                <div class="text-center">
                    <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
                </div>

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

                <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">Someone famous in
                        <cite title="Source Title">Source Title</cite>
                    </footer>
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Để lại bình luận:</h5><br>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4 col-md-12">
                    <div class="col-md-2" style="float: left">
                        <img class="d-flex mr-3 rounded-circle" width="65px" src="{{ asset('upload/images/news/noname.png') }}" alt="">
                    </div>

                    <div class="col-md-10" style="float: left">
                        <h5 class="mt-0">Commenter Name</h5><br>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <div class="media mb-4 col-md-12">
                    <div class="col-md-2" style="float: left">
                        <img class="d-flex mr-3 rounded-circle" width="65px" src="{{ asset('upload/images/news/noname.png') }}" alt="">
                    </div>

                    <div class="col-md-10" style="float: left">
                        <h5 class="mt-0">Commenter Name</h5><br>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
@endsection 