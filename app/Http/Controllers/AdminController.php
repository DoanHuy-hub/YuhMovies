<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use App\Comment;
use App\Cabinet;
use App\Cate;
use App\Nation;
use App\Year;
use App\Language;
use App\Payment;
use App\WalletCharge;
use Auth;
use Illuminate\Support\Carbon;
use PDF;

class AdminController extends Controller
{
    //
    public function index()
    {
        # code...
        
        $movie = Movie::all();
        $user = User::all();
        $comment = Comment::all();
        $cabinet = Cabinet::all();
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        $language = Language::all();
        $wallet_charge = WalletCharge::all();
        $payment = Payment::all();
        return view('admin.index', compact('movie', 'user', 'cabinet', 'comment', 'cate', 'nation', 'year', 'language', 'wallet_charge', 'payment'));
    }

    public function getLogin()
    {
        if (Auth::user()) {
            return redirect()->route('admin.index');
        }
        return view('admin.admin_login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->push('username_minmovies', Auth::user()->username);
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.getLogin')->with(['thongbao_level' => 'danger', 'thongbao_admin' => "<b>Sai tài khoản hoặc mật khẩu!</b>"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('username_minmovies');
        return redirect()->route('admin.getLogin')->with(['thongbao_level' => 'success', 'thongbao_admin' => "<b>Đăng xuất thành công!</b>"]);;
    }

    public function checkLogin()
    {
        if (Auth::user()) {
            return redirect()->route('admin.index');
        } else
            return redirect()->route('admin.getLogin');
    }
    public function statisticPayment()
    {
        $movie = Movie::all();
        $payment2 = Payment::all()->unique('movie_id');
        $payment = Payment::all();
        return view('admin.statistic.payment', compact('payment', 'payment2', 'movie'));
    }

    public function sortPayment(Request $request)
    {
        $movie = Movie::all();
        $payment2 = Payment::all()->unique('movie_id');
        if($request->sortID && $request->sortIDYear)
        {
            $sortID=$request->sortID;
            $sortIDYear=$request->sortIDYear;
            $payment = Payment::whereYear('created_at', $request->sortIDYear)->whereMonth('created_at', $request->sortID)->get();
            return view('admin.statistic.payment', compact('payment', 'payment2', 'movie','sortID','sortIDYear'));
        }
        else if ($request->sortID) {
            $sortID=$request->sortID;
            $payment = Payment::whereMonth('created_at', $request->sortID)->get();
            return view('admin.statistic.payment', compact('payment', 'payment2', 'movie','sortID'));
        }
        else if ($request->sortIDYear) {
            $sortIDYear=$request->sortIDYear;
            $payment = Payment::whereYear('created_at', $request->sortIDYear)->get();
            return view('admin.statistic.payment', compact('payment', 'payment2', 'movie','sortIDYear'));
        }
        else
        {
            $payment = Payment::all();
            return view('admin.statistic.payment', compact('payment', 'payment2', 'movie'));
        }

    }

    public function statisticCharge()
    {
        $user = User::all();
        $charge2 = WalletCharge::all()->unique('user_id');        
        $charge = WalletCharge::all();
        return view('admin.statistic.charge', compact('charge', 'charge2', 'user'));
    }
    public function sortCharge(Request $request)
    {
        
        $user = User::all();
        $charge2=WalletCharge::all()->unique('user_id');
        if($request->sortID && $request->sortIDYear)
        {
            $sortID=$request->sortID;
            $sortIDYear=$request->sortIDYear;
            $charge = WalletCharge::whereYear('created_at', $request->sortIDYear)->whereMonth('created_at', $request->sortID)->get();
            return view('admin.statistic.charge', compact('charge', 'charge2', 'user','sortID','sortIDYear'));
        }
        else if ($request->sortID) {
            $sortID=$request->sortID;
            $charge = WalletCharge::whereMonth('created_at', $request->sortID)->get();
            return view('admin.statistic.charge', compact('charge', 'charge2', 'user','sortID'));
        }
        else if ($request->sortIDYear) {
            $sortIDYear=$request->sortIDYear;
            $charge = WalletCharge::whereYear('created_at', $request->sortIDYear)->get();
            return view('admin.statistic.charge', compact('charge', 'charge2', 'user','sortIDYear'));
        }
        else
        {
            $charge = WalletCharge::all();
            return view('admin.statistic.charge', compact('charge', 'charge2', 'user'));
        }

    }

    public function printStatistic(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printStatisticConvert());
        return $pdf->stream();
    }

    public function printStatisticConvert(){
        $admin = Auth::user()->name;
        $user = User::all();
        $charge2 = WalletCharge::all()->unique('user_id');        
        $charge = WalletCharge::all();

        $output = '';

        $output.='<style>body{
            font-family: DejaVu Sans;
        }        
        .table-styling{
            border: 1px solid #000;
        }
        .table-styling th {
            border: 1px solid #000;
        }
        .table-styling td {
            border: 1px solid #000;
        }
        .float-right {
            position: fixed;
            right: 0;
        }
        .right {
            margin-top: 70px;
            position: fixed;
            right: 0;
        }
        .name {
            margin-top: 5px;
        }

        </style>
        <h1><center>Web xem phim YuhMovies</center></h1>
        <h2><center>Thống kê doanh thu nạp ví năm 2022</center></h2>        
        <table class="table-styling" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:1em;">STT</th>
                    <th>Người dùng</th>
                    <th>Số tiền</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>';
            $i=1;
            $total=0;
            foreach ($charge as $item)
            foreach ($user as $item2)
            if ($item->user_id==$item2->id){
                \Carbon\Carbon::setLocale('vi');
                $commentTime=$item->created_at;
                $commentTime=\Carbon\Carbon::parse($commentTime);
                $total+= $item->money;
                date_default_timezone_set("Asia/Ho_Chi_Minh");
        $output.='
                <tr>
                    <td>'.$i++.'</td>
                    <td>'.$item2->name.'</td>
                    <td>'.number_format(round($item->money)).'đ'.'</td>
                    <td>'.$commentTime->format('d/m/Y H:i:s').'</td>
                </tr>';
            }

        $output.='    
            </tbody>
        </table>
        <div class="float-right"><h2>Tổng tiền đã nạp: '.number_format(round($total)).'VNĐ</h2>   </div>
        <div class="right">            
            <h3>Tp.HCM, ngày '.date("d").' tháng '.date(('m')).' năm '.date("Y").'</h3>         
            <h2><center>Người lập</center></h2>
            <h3 class="name"><center>'.$admin.'</center></h3>
        </div>
        
        ';
        
        return $output;
    }
}
