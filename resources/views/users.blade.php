@extends('layouts.appAdmin')
@section('content')

    <h1> Users </h1>

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
        foreach ($users as $user) {?>
        <tr>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->email ?></td>
            <td> <a href="{{ url('view/'.$user->id) }}" class="card-link">>></a> </td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>

@endsection
