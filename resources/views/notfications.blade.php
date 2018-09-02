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
            <td> <a href="{{ url('deleteNotification/'.$notification->NOTIFICATIONID.'/'.$accNumber) }}" class="badge badge-primary" onclick="return  confirm('Do you want to delete notification Y/N')"> Delete </a></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>

@endsection
