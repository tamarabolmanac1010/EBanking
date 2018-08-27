@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">Welcome<b> <?php echo Auth::user()->name ?></b><br>
                    E mail:      <b font-size="1.2rem"><?php echo Auth::user()->email ?></b><br></div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">  Active accounts: </li>
                        <li class="list-group-item">
                        <?php
                        $accounts  = Auth::user()->accounts;?>
                        <table data-toggle="table" id="accounts">
                            <thead>
                            <tr>
                                <th>Account number</th>
                                <th>Balance</th>
                                <th>Type</th>
                                <th>Notifications</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($accounts as $account) {?>
                                <tr>
                                    <td><?php echo $account->ACCNUMBER; ?></td>
                                    <td><?php echo $account->AMOUNT." EUR"; ?></td>
                                    <td><?php echo $account->accounttype()->TYPE; ?></td>
                                    <td><a href="{{ url('notifications/'.$account->ACCNUMBER) }}" class="card-link">>></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </li>
                    </ul>
                     <div class="card-body">
                         <a href="{{ url('edit/'.$user->id) }}" class="card-link">Edit profile</a>
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
