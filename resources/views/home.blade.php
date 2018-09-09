@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-sm-6">

            <?php
            $accounts  = Auth::user()->accounts;?>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="card-header">Welcome to E banking <br> User: <b> <?php echo Auth::user()->name ?></b><br>
                E mail:      <b font-size="1.2rem"><?php echo Auth::user()->email ?></b><br></div>

            <br>
            <div class="card-header">
                <h4 style="text-align:center;"> Active accounts</h4>
            </div>
            <br>

            <table data-toggle="table" id="accounts" >
                <thead>
                <tr>
                    <th>Account number</th>
                    <th>Balance</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($accounts as $account) {?>
                <tr>
                    <td>
                        <a href="{{ url('notifications/'.$account->ACCNUMBER) }}" class="card-link badge badge-primary">
                            <?php echo $account->ACCNUMBER; ?></a>
                    </td>
                    <td><?php echo $account->AMOUNT." ".$account->CURRENCY; ?></td>
                    <td><?php echo $account->accounttype()->TYPE; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>


        </div>

        <div class="col-sm-6">
            <div class="card-header">
                <h4 style="text-align:center;"> Currency list</h4>
            </div>


            <br>
            <table data-toggle="table" id="accounts">
                <thead>
                <tr>
                    <th></th>
                    <th>Currency</th>
                    <th>Rate</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="https://news.bitcoin.com/wp-content/uploads/2017/12/badge_button_united_kingdom_flag_1600_wht_1991.png" height="50" width="50"/></td>
                    <td>GBP</td>
                    <td><?php echo substr($GBP, 0, 4) ?></td>
                </tr>
                <tr>
                    <td><img src="https://i.ebayimg.com/images/g/GmUAAOSwVFlT9e9~/s-l300.jpg"  height="50" width="50"></td>
                    <td>USD</td>
                    <td><?php echo substr($USD, 0, 4) ?></td>
                </tr>
                <tr>
                    <td><img src="http://aux3.iconspalace.com/uploads/53712904.png"  height="50" width="50"></td>
                    <td>AUD</td>
                    <td><?php echo substr($AUD, 0, 4)?></td>
                </tr>
                <tr>
                    <td><img src="https://images-na.ssl-images-amazon.com/images/I/3153rt5c4UL.jpg"  height="50" width="50" ></td>
                    <td>CAD</td>
                    <td><?php echo substr($CAD, 0, 4) ?></td>
                </tr>
                <tr>
                    <td><img src="http://telecoms.com/wp-content/blogs.dir/1/files/2011/03/serbia-icon.png"  height="50" width="50" ></td>
                    <td>RSD</td>
                    <td><?php echo substr($RSD, 0, 6) ?></td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>

    </div>
    </div>
    </div>
    </div>

@endsection

@section('sidebar')

@endsection
