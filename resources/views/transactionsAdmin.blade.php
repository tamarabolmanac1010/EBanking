@extends('layouts.appAdmin')
@section('content')

    <h1> Transactions </h1>

    <br>
    <?php echo (Form::open(array('url' => 'submit')));

    $accArray = array();
    foreach ($accounts as $account){
        $accArray[$account->ACCNUMBER] = $account;
    }?>

    {!! Form::select('account',    $accArray, null , ['class' => 'form-control', 'placeholder'=>' Select account ']) !!} <br>
    {!! Form::select('month',   array_merge([
                                        '1' => 'Past month',
                                        '2' => 'Past two months',
                                        '3' => 'Past three months']), null , ['class' => 'form-control', 'placeholder'=>' Select month '] ) !!}
    <br>
    <div>
        {{Form::submit('Show transactions', ['class' => 'btn btn-primary'])}}
        <br>
    </div>
    <br>
    <?php echo e(Form::close());?>

    <?php if(!empty($transactions)) {?>
    <?php echo "Current time ".$current; ?>
    <table data-toggle="table" id="accounts">
        <thead>
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($transactions as $transaction) {?>
        <tr>
            <td><?php echo $transaction->DATE; ?></td>
            <td><?php echo $transaction->TRANSACTIONAMOUNT." EUR"; ?></td>
            <td><?php echo $transaction->DESCRIPTION; ?></td>
            <td><?php echo $transaction->TRANSACTIONTYPE; ?></td>
        </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>


@endsection