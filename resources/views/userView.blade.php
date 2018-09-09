@extends('layouts.appAdmin')
@section('content')


    <div class="row">
        <div class="col-sm-6">
            <div class="card ">
                <div class="card-header">Welcome to E banking <br> User: <b> <?php echo $user->name ?></b><br>
                    E mail:      <b font-size="1.2rem"><?php echo $user->email ?></b><br></div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <br>
                        <h4 style="text-align:center;"> Active accounts</h4>
                        <br>
                        <?php
                        $accounts  = $user->accounts;?>
                        <table data-toggle="table" id="accounts" style="text-align:left;">
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
                                <td><a href="{{ url('notifications/'.$account->ACCNUMBER) }}" class="card-link badge badge-primary">>></a></td>
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
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional conjjjjjjjtent.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>


    </div>

    </div>
    </div>
    </div>
    </div>

@endsection

@section('sidebar')

@endsection
