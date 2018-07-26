@extends('layouts.appAdmin')
@section('content')

    <h1> Write notification </h1>
    <br>
    <?php echo e(Form::open(array('url' => 'notification')));?>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title')); ?>
        <?php echo Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter notification title']);?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('text', 'Text')); ?>
        <?php echo Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Enter text']);?>
    </div>

    <div>
        {{Form::submit('Send', ['class' => 'btn btn-primary'])}}
    </div>
    <?php echo e(Form::close()); ?>

@endsection
