@extends('layouts.app')
@section('content')

    <h1> Notifications </h1>

    <br>

    <?php if(!empty($notifications)) {?>
    <table data-toggle="table" id="accounts">
        <thead>
        <tr>
            <th>Title</th>
            <th>Text</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($notifications as $notification) {?>
        <tr>
            <td><?php echo $notification->TITLE; ?></td>
            <td><?php echo $notification->TEXT ?></td>
            <td><?php echo ">>" ?></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>

@endsection
