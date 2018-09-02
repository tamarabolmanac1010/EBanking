@extends('layouts.appAdmin')

@section('content')
    <h1> Register new user </h1>
    <br>
    <?php echo (Form::open(array('url' => 'registerUser')))?>

    <div class="row">
        <div class="col-sm-6">

    <div class="form-group">
        <?php echo (Form::label('username', 'Username:')); ?>
        <?php echo Form::text('username', '', ['class' => 'form-control2', 'placeholder' => 'Enter username']);?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('password', 'Password:')); ?>
        <?php echo Form::password('pass',  ['class' => 'form-control2', 'placeholder' => 'Enter password']);?>
    </div>
    <div class="form-group">
        <?php echo (Form::label('email', 'E mail:')); ?>
        <?php echo Form::email('email', '', ['class' => 'form-control2', 'placeholder' => 'Enter mail']);?>
    </div>



        </div>

        <div class="col-sm-6">


            <?php echo  Form::checkbox('onlyProfile', 'value', true); ?>
            <?php echo (Form::label('onlyProfile', 'Create only user profile')); ?> <br><br>

            <div class="form-group">
                <?php echo (Form::label('accNumber', 'Account number:')); ?>
                <?php echo Form::text('accNumber', '', ['class' => 'form-control2', 'placeholder' => 'Enter account number']);?>
            </div>
            <br>
           <p  style="font-size:24px;"> <?php echo (Form::label('accNumber', ' Chose account type: ')); ?> <br></p>


            <?php echo Form::radio('accType', 'c', true); ?>
            <?php echo (Form::label('accT', 'Checking')); ?> <br>

            <?php echo Form::radio('accType', 'f', false); ?>
            <?php echo (Form::label('accT', ' 	Foreign currency')); ?>

            <div>
                <br>
                <br>
                {{Form::submit('Register', ['class' => 'btn btn-primary btn-lg'])}}
            </div>

        </div>



    <?php echo e(Form::close()); ?>
    </div>
@endsection
