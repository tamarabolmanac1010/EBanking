<?php

$accounts =  Account::all();

$notifications = Notification::where('ACCNUMBER',$accN)->get();

$transactions = Transaction::where('ACCNUMBER',$account)
            ->whereBetween('DATE', [$from, $current])
            ->get();


Notification::where('NOTIFICATIONID', $id)->delete();

DB::table('accounts')
        ->where('ACCNUMBER', $accountNumber)
        ->update(['AMOUNT' => $newAmount]);

DB::table('notifications')->insertGetId(
        ['ACCNUMBER' => $accountNumber,
        'TEXT' => $text,
        'TITLE' => $title,]
    );

        ?>