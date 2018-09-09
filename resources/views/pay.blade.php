@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-6">


            <h1> Make a new payment </h1>
            <br>
            <br>
            <?php echo e(Form::open(array('url' => 'payment', 'onsubmit' => 'return confirm("Confirm payment?")')));

            $accArray = array();
            foreach ($accounts as $account){
                $accArray[$account->ACCNUMBER] = $account;
            }?>

            {!! Form::select('account',    $accArray, null , ['class' => 'form-control3', 'placeholder'=>' Select account ']) !!} <br>
            <div class="form-group">
                <?php echo e(Form::label('amount', 'Amount')); ?>
                <?php echo Form::text('amount', '', ['class' => 'form-control3', 'placeholder' => 'Enter amount']);?>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('account', 'Account number')); ?>
                <?php echo Form::text('accountTo', '', ['class' => 'form-control3', 'placeholder' => 'Enter account number']);?>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('email', 'E-Mail Address')); ?>
                <?php echo Form::text('email', '', ['class' => 'form-control3', 'placeholder' => 'Enter e-mail']);?>
            </div>

            <div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
            </div>
            <?php echo e(Form::close()); ?>


        </div>

        <div class="col-sm-6">

            <div class="pricing card-deck flex-column flex-md-row mb-3">
                <div class="card card-pricing text-center px-3 mb-4">
                    <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Accounts</span>

                    <div class="card-body pt-0">
                        <ul class="list-unstyled mb-4">
                        <?php
                        foreach ($accounts as $account){
                        $accArray[$account->ACCNUMBER] = $account;?>
                            <div class="bg-transparent card-header pt-4 border-0">
                                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">

                                    <span class="price"><?php echo $account->AMOUNT ?></span> $
                                    <span class="h6 text-muted ml-2">
                                        / balance
                                    </span>
                                </h1>
                            </div>
                            <li><b>Number: </b> <?php echo $account->ACCNUMBER ?></li>
                            <li><b>Type: </b> checking</li>
                      <?php  }?>

                        </ul>
                        <button type="button" class="btn btn-outline-secondary mb-3">Order now</button>
                    </div>
                </div>

        </div>



        <?php echo e(Form::close()); ?>
    </div>
@endsection
