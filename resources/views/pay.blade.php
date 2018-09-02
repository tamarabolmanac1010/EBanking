@extends('layouts.app')

@section('content')
    <h1> Make a new payment </h1>
    <br>
    <?php echo e(Form::open(array('url' => 'payment', 'onsubmit' => 'return confirm("Confirm payment?")')));

        $accArray = array();
        foreach ($accounts as $account){
            $accArray[$account->ACCNUMBER] = $account;
        }?>

        {!! Form::select('account',    $accArray, null , ['class' => 'form-control2', 'placeholder'=>' Select account ']) !!} <br>
        <div class="form-group">
            <?php echo e(Form::label('amount', 'Amount')); ?>
            <?php echo Form::text('amount', '', ['class' => 'form-control2', 'placeholder' => 'Enter amount']);?>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('account', 'Account number')); ?>
            <?php echo Form::text('accountTo', '', ['class' => 'form-control2', 'placeholder' => 'Enter account number']);?>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('email', 'E-Mail Address')); ?>
            <?php echo Form::text('email', '', ['class' => 'form-control2', 'placeholder' => 'Enter e-mail']);?>
        </div>

    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
    </div>
    <?php echo e(Form::close()); ?>


@endsection