@extends('layouts.app')
@section('content')

    <h1> Transfer amount to another user account </h1>
    <br>
    <?php if(!empty($accounts) && !empty($accountsUser)) {?>

    <?php echo e(Form::open(array('url' => 'executeTransfer')));

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
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    <?php echo e(Form::close()); ?>

    <?php } ?>

    <?php if(!empty($success)) {?>
        <h3> <?php echo $success  ?></h3>
    <?php } ?>


@endsection
