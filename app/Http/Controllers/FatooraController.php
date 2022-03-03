<?php
namespace App\Http\Controllers;
// use vendor\autoload;
use Illuminate\Http\Request;
use App\Http\Services\FatooraService;
use Illuminate\Support\Facades\Http;

class FatooraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    private $FatooraService;
    public function __construct(FatooraService $FatooraService){
        $this->FatooraService =  $FatooraService;
    }
    public function payOrder()
    {
        // $user = Auth::User()->name;
        $data =[
            'CustomerName'=> 'hala emad',
            // 'CustomerName'       => '$user->name',
            'NotificationOption'=>'Lnk', 
            'InvoiceValue'=>'100',
            'CustomerEmail'=> 'halaaa.abdelaziz95@gmail.com',
            // 'CustomerEmail'      => '$user->email',
            'CallBackUrl'=>'http://127.0.0.1:8000/api/call_back',
            // 'ErrorUrl'           => env('error_url'), 
            // 'CallBackUrl'        => "www.google.com",
            'ErrorUrl'=>'https://www.youtube.com', 
            'Language'=>'en', 
            'DisplayCurrencyIso'=>'egp'
        ];
       return  $this->FatooraService->sendPayment($data);

       //transaction table
       //invoiceid from post man pay route
       //userId = auth::user()->id




    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentCallBack(Request $request)
    {
        // dd($request);
        $data=[];
        $data['Key']=$request->paymentId;
        $data['KeyType']='paymentId';
        
        $paymentData=$this->FatooraService->getPaymentStatus($data);
        return $paymentData['Data']['InvoiceId']; 
        // search in transaction table where id = $paymentData['Data']['InvoiceId'] to change status to paid 

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}