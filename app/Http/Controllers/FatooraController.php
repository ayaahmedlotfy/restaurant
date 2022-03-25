<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FatooraService;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;
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
        return TransactionResource::collection(Transaction::all());
    }

    private $FatooraService;
    public function __construct(FatooraService $FatooraService){
        $this->FatooraService =  $FatooraService;
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payOrder(Request $request)
    {
        $data =[
            'CustomerName'=>$request->user_name,
            // 'CustomerName'=>'hala ayaa',
            'NotificationOption'=>'Lnk', 
            // 'InvoiceValue'=>'100',
            'InvoiceValue'=>$request->total_price,
            'CustomerEmail'=>$request->email,
            // 'CustomerEmail'=>'haa@gmail.com',
            'CustomerMobile'=>$request->phone,
            'CallBackUrl'=>'http://127.0.0.1:8000/api/call_back',
            // 'CallBackUrl'=>'http://127.0.0.1:4200/paid',
            'ErrorUrl'=>'https://www.youtube.com', 
            'Language'=>'en', 
            'DisplayCurrencyIso'=>'egp'
        ];
        return $this->FatooraService->sendPayment($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentCallBack(Request $request)
    {
    
        $data=[];
        $data['Key']=$request->paymentId;
        $data['KeyType']='paymentId';
        
        $paymentData=$this->FatooraService->getPaymentStatus($data);

        $transaction=Transaction::where('InvoiceId','=',$paymentData['Data']['InvoiceId'])
        ->limit(1)  
        ->update(['status' => $paymentData['Data']['InvoiceStatus']]);  
    
        return redirect()->away('http://127.0.0.1:4200/paid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $datapay = $this->payOrder($request);
    
        $transaction=new Transaction();
        $transaction->user_name=$request->user_name;
        $transaction->email=$request->email;
        $transaction->phone=$request->phone;
        $transaction->InvoiceId=$datapay["Data"]["InvoiceId"];
        $transaction->InvoiceURL=$datapay["Data"]["InvoiceURL"];
        $transaction->total_price=$request->total_price;
        $transaction->order_id=$request->order_id;
        // $transaction->status=$request->status;
        // $transaction->PaymentId=$request->PaymentId;
        $transaction->save();
        
        return $transaction;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_name)
    {
        //
       return Transaction::find($user_name);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editable(Request $request)
    {
        //
        // $datapay = $this->payOrder();
        // dd($datapay);
        // $this->store($request);
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