@extends('layouts.app')
@section('content')

    <h1> Transactions </h1>

    <br>
    <?php echo e(Form::open(array('url' => 'transactions/submit'))); ?>

    {!! Form::select('ACCNUMBER', (['0' => 'Select account '] + array($accounts)), null, ['class' => 'form-control'] ) !!}
    <br>
         <div>
            {{Form::submit('Show transactions', ['class' => 'btn btn-primary'])}}
         </div>

    @foreach($accounts as $account)

            {!! Form::select('account',  array($account->ACCNUMBER => "Account type:  ".$account->accounttype()->TYPE."
Number:   ".$account->ACCNUMBER), null ) !!}

    @endforeach

    <?php echo e(Form::close());

    if(!empty($transactions))
        foreach ($transactions as $transaction) {
        ?>
            <?php echo $transaction->DESCRIPTION."     Amount: ".$transaction->TRANSACTIONAMOUNT."     Type: ".$transaction->TRANSACTIONTYPE ?><br>
        <?php
        }
        ?>

@endsection