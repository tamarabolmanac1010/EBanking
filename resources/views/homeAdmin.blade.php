@extends('layouts.appAdmin')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">Welcome<b> <?php echo Auth::user()->name ?></b></div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>E mail:      </b><?php echo Auth::user()->email ?><br></li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Edit profile</a>

                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('sidebar')

@endsection
