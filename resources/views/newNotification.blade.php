@extends('layouts.appAdmin')
@section('content')

    <h1> Write notification </h1>
    <br>
    <br>
    <?php echo (Form::open(array('url' => 'notification')));?>


    <?php echo (Form::open(array('url' => 'notification')))?>
    <?php
    $accArray = array();
    foreach ($accounts as $account){
        $accArray[$account->ACCNUMBER] = $account;
    }?>

    {!! Form::select('account',    $accArray, null , ['class' => 'form-control2', 'placeholder'=>' Select account ']) !!} <br>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title')); ?>
        <?php echo Form::text('title', '', ['class' => 'form-control2', 'placeholder' => 'Enter notification title']);?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('text', 'Text')); ?>
        <?php echo Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Enter text']);?>
    </div>

    <div>
        {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
    </div>
    <?php echo (Form::close()); ?>



@endsection
