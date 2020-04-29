<?php

use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Bus\Dispatcher;
use App\Mail\SendEmailMailable;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
dispatch(new App\Jobs\SendEmailJob);

use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/sendmailqueue', function(){
    $job=(new SendEmailJob())->delay(Carbon::now()->addSecond(7));
    // Mail::to('maryamabdi9776@gmail.com')->send(new SendEmailMailable());
    dispatch($job);
    return "Email send successfully";
});




Route::get('/payment/buye', function(){
    
$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
$Amount = 1000; //Amount will be based on Toman - Required
$Description = 'توضیحات تراکنش تستی'; // Required
$Email = 'UserEmail@Mail.Com'; // Optional
$Mobile = '09123456789'; // Optional
$CallbackURL = 'http://www.yoursoteaddress.ir/verify.php'; // Required


$client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
$url='https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority;
return Redirect::to($url);
} else {
echo'ERR: '.$result->Status;
}
});

Route::get('/verify',function(){

    $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
    $Amount = 1000; //Amount will be based on Toman
    $Authority = $_GET['Authority'];
    
    if ($_GET['Status'] == 'OK') {
    
    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    
    $result = $client->PaymentVerification(
    [
    'MerchantID' => $MerchantID,
    'Authority' => $Authority,
    'Amount' => $Amount,
    ]
    );
    
    if ($result->Status == 100) {
    echo 'Transaction success. RefID:'.$result->RefID;
    } else {
    echo 'Transaction failed. Status:'.$result->Status;
    }
    } else {
    
    echo 'Transaction canceled by user';
    }
});

Route::get('/zarrinpay',function(){
    $invoice=(new Invoice)->amount(1000);
    return Payment::config(['mode'=>'sandbox'])->purchase(
        $invoice,
        function($driver,$transactionId){

        }
    )->pay();
});




Route::get('/', function () {
    return view('welcome');
});
Route::namespace('Admin')->prefix('admin')->group(function(){
    // Route::get('/alluserdatatabels','UserController@alluserdatatabels')->name('users.alluserdatatabels');
    // Route::get('/index1','UserController@index1')->name('users.index1');
    
    Route::get('/panel', 'PanelController@index');
    Route::get('/panel/upload-image', 'PanelController@uploadImageSubject');
    Route::resource('products','ProductController')->middleware('can:show-product');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::group(['prefix'=>'users'],function(){
        Route::get('/','UserController@index');
       Route::resource('level' , 'LevelManageController' , ['parameters' => ['level' => 'user']]);
        Route::delete('/{user}/destroy','UserController@destroy')->name('users.destroy');
    });


});
