<?php
use Sunil\Payments\Facades\Ggpay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Sunil\Payments\Exceptions\IndipayParametersMissingException;

Route::post('paynow/{payment_mode}', function(Request $request,$payment_mode){



    $parameters = [
        'tid' => $request->tid,

        'order_id' => $request->order_id,
        'payment_mode' => $payment_mode,

        'amount' => $request->amount,
        'firstname' => $request->firstname,
        'email' => $request->email,
        'phone' => $request->phone,
        'productinfo' => $request->order_id, // For the Payumoney Gateway Optional Paramater

    ];

    // gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Mocker / CitrusPopup
    if(empty($payment_mode) || env('IS_DEFAULT_GATEWAY')==true)
        $order = Ggpay::prepare($parameters);
    else
        $order = Ggpay::gateway($payment_mode)->prepare($parameters);

    return Ggpay::process($order);

});

Route::post('/indipay/response',function(Request $request){
    if(isset($request->Order)){
        $response = Ggpay::gateway($request->Domain)->response($request);
        if(is_array($response))
            $response['payment_method']='Citrus';

    }elseif (isset($request->productinfo)){
        $response = Ggpay::gateway('PayUMoney')->response($request);
        if(is_array($response))
            $response['payment_method']='PayUMoney';
    }else{
        $response = Ggpay::response($request);
        if(is_array($response))
            $response['payment_method']='Other';
    }
    dd($response);
});

//Route::post('/indipay/response',function(Request $request){
//
////    $response = Ggpay::gateway('CitrusPopup')->response($request);
//
////    dd($response);
//    dd($request->all());
//});