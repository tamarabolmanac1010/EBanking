@extends('layouts.appAdmin')
@section('content')

    <h1> Edit user profile </h1>
    <br>
    <?php echo (Form::open(array('url' => 'saveChanges')))?>
    {!! Form::hidden('id', $user->id) !!}
    <div class="form-group">
        <?php echo e(Form::label('name', 'Current username:  '.$user->name)); ?>
        <?php echo Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter new username']);?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('mail', 'Current mail:    '.$user->email)); ?>
        <?php echo Form::text('mail', '', ['class' => 'form-control', 'placeholder' => 'Enter new mail']);?>
    </div>
    <div>
        {{Form::submit('Save changes', ['class' => 'btn btn-primary'])}}
    </div>

    <?php echo e(Form::close()); ?>

    @endsection