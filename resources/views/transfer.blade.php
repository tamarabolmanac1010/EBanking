@extends('layouts.app')
@section('content')

    <h1> Transfer amount to another user account </h1>
    <br>
    <?php if(!empty($accounts) && !empty($accountsUser)) {?>

    <?php echo e(Form::open(array('url' => 'executeTransfer', 'onsubmit' => 'return confirm("Confirm transfer?")')));

    $accUserArray = array();
    $accArray = array();

    foreach ($accounts as $account){
        $accArray[$account->ACCNUMBER] = $account;
    }
    foreach ($accountsUser as $account){
        $accUserArray[$account->ACCNUMBER] = $account;
    }?>

    {!! Form::select('accountUser',  $accUserArray, null , ['class' => 'form-control2', 'placeholder'=>' Select your active account ']) !!} <br>
    {!! Form::select('account', $accArray , null , ['class' => 'form-control2', 'placeholder'=>' Select account of another user ']) !!} <br>

    <div class="form-group">
        <?php echo e(Form::label('amount', 'Amount')); ?>
        <?php echo Form::text('amount', '', ['class' => 'form-control2', 'placeholder' => 'Enter amount']);?>
    </div>
    <div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
    </div>
    <?php echo e(Form::close()); ?>

    <?php } ?>

    <?php if(!empty($success)) {?>
        <?php if($success== "T") {?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Transefer executed successfuly</h4>
                <hr>
             <p class="mb-0">Check transfer details in transaction list.</p>
        </div>
        <?php } ?>
        <?php if($success == "F") {?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Transfer aborted!</h4>
                <hr>
                <p class="mb-0"> Not enough balance on selected account.</p>
            </div>
        <?php } ?>


    <?php } ?>


@endsection
