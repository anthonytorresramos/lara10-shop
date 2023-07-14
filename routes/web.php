<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// brevo.com smtp free 300 emails daily
// example #1 Direct send email
Route::get('send-mail', function(){
    // send email to th0nz13@gmail.com with subject this is test subject.
    Mail::raw( 'Hello World this is a test email' , function($message){
        $message->to('th0nz13@gmail.com')->subject('this is test subject');
    } );

    // dd('success');
});

// example #2: sending email using demo_email_template
// demo_email_template is in view folder
/*
this function will send emal to 'th0nz13@gmail.com'
the subject and $data is being pass to TestMail()
*/
Route::get('sendmenow', function(){
    $data = [
        'username' => 'Super Thonz',
        'position' => 'Super Senior Developer'
    ];
    // $mail_content = view('demo_email_template', $data)->render();

    // TestMail was your mailing class created using php artisan make:mail TestMail
    // on TestMail() we are passing 2 arguments first is the subject and second is the data which will be use on the view
    Mail::to('th0nz13@gmail.com')->send(new TestMail('Demo of Email Sending', $data));







});




