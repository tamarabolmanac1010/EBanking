@extends('layouts.appAdmin')
@section('content')

    <h1> Users </h1>

    <form action='searchUser' method='GET' class="form-inline ml-auto">
        <div class="md-form my-0">
            <input class="form-control" name = 'searchName' type="text" placeholder="Search" aria-label="Search">
        </div>
        <button href="searchUser" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
    </form>

    <br>

    <?php if(!empty($users)) {?>
    <table data-toggle="table" id="accounts">
        <thead>
        <tr>
            <th>Name</th>
            <th>E mail</th>
            <th>Profile view</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $us) {?>
        <tr>
            <td><?php echo $us->name; ?></td>
            <td><?php echo $us->email ?></td>
            <td> <a href="{{ url('view/'.$us->id) }}" class="card-link badge-primary">>></a> </td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>

@endsection
