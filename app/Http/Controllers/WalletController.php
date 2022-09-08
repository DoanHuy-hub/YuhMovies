<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\User;
use App\Nation;
use App\Cate;
use App\Year;
use App\WalletCharge;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getWallet()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        $username=session('username_minmovies');
        $user=User::where('username',$username)->first();
        $user_id=$user->id;
        $wallet=Wallet::all();
        $walletCharge=WalletCharge::where('user_id',$user_id)->paginate(10);
        return view('user.wallet', compact('cate', 'nation', 'year','user','wallet','walletCharge'));
    }
    public function getChargeWallet()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        return view('user.chargeWallet', compact('cate', 'nation', 'year'));
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function postChargeWallet(Request $request)
    {
        $username = session('username_minmovies');
        

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Nạp tiền vào ví";
        $amount = $request->amount;
        $orderId = time() . "";
        $redirectUrl = "http://localhost/webxemphim/wallet/saveChargeWallet/".$username;
        $ipnUrl = "http://localhost/webxemphim/wallet/saveChargeWallet/".$username;
        $extraData = "";      
        
        
        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd($result);
        $jsonResult = json_decode($result, true);  // decode json
    
        //Just a example, please check more in there
        return redirect($jsonResult['payUrl']);
        }  

    public function saveChargeWallet($username)
    {
        
        $username = session('username_minmovies');
        
        try {
            //Check Orderid
            //Kiểm tra checksum của dữ liệu
            if (isset($_GET['partnerCode'])) {
                //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                //
                $amount = $_GET['amount'];
                $orderId = $_GET['orderId'];
                $user = User::where('username', $username)->first();
                $user_id = $user->id;
                $wallet = Wallet::where('user_id', $user_id)->first();
                $wallet_id = $wallet->id;
                $wallet_charge = new WalletCharge();
                $wallet_charge->user_id = $user_id;
                $wallet_charge->wallet_id = $wallet_id;
                $wallet_charge->orderId = $orderId;
                $wallet_charge->money = $amount;
                $wallet_charge->save();
                $wallet->money = $wallet->money + ($amount);
                $wallet->save();
                //
                //Trả kết quả về cho VNPAY: Website TMĐT ghi nhận yêu cầu thành công
                $returnData['RspCode'] = '00';
                $returnData['Message'] = 'Confirm Success';
                $thongbao_level = 'success';
                $thongbao = "<b>Nạp tiền vào ví thành công!</b>";
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Chu ky khong hop le';
                $thongbao_level = 'danger';
                $thongbao = "<b>Nạp tiền vào ví thất bại!</b>";
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
            $thongbao_level = 'danger';
            $thongbao = "<b>Nạp tiền vào ví thất bại!</b>";
        }
        return redirect()->route('user.getWallet')->with(['thongbao_level'=>$thongbao_level,'thongbao'=>$thongbao]);
    }
    public function walletCharge(){
        $user=User::all();
        $walletCharge=WalletCharge::all();
        return view('admin.wallet_charge.list',compact('walletCharge','user'));
    }
}
