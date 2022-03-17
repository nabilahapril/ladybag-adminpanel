<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\Category;
use App\User;
use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Exports\PendapatanExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
     public function __construct()
     {
        $this->middleware('auth');
     }

    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $users = User::count();
        $payments = Payment::whereYear('created_at','=', date('Y'))->where('status_id','=',3)->sum('total');
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
        $category = Category::orderBy('name', 'DESC')->get();
        $product = $product->paginate(5);
        $trans = Payment::with(['district','status'])->orderBy('created_at', 'DESC');
        $trans= $trans->paginate(5);
        $jan = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '1')->where('status_id','=',3)->sum('total');
        $feb = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '2')->where('status_id','=',3)->sum('total');
        $mar = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '3')->where('status_id','=',3)->sum('total');
        $apr = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '4')->where('status_id','=',3)->sum('total');
        $mei = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '5')->where('status_id','=',3)->sum('total');
        $jun = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '6')->where('status_id','=',3)->sum('total');
        $jul = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '7')->where('status_id','=',3)->sum('total');
        $ag= Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '8')->where('status_id','=',3)->sum('total');
        $sep = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '9')->where('status_id','=',3)->sum('total');
        $okt = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '10')->where('status_id','=',3)->sum('total');
        $nov = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '11')->where('status_id','=',3)->sum('total');
        $des = Payment::whereYear('created_at','=', date('Y'))->whereMonth('created_at', '12')->where('status_id','=',3)->sum('total');

        return view('dashboard', compact('trans','products','categories','payments','users','product','category','jan','feb','mar','apr','mei','jun','jul','ag','sep','okt','nov','des'));
    }

    public function orderReport()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') ;
            $end = Carbon::parse($date[1])->format('Y-m-d') ;
        }

        $payments = Payment::with(['district'])
        ->where('status_id', 3)
        ->whereBetween('created_at', [$start, $end])->get();
        return view('report.order', compact('payments'));
    }

    public function orderReportPdf($daterange)
    {
        $date = explode('+', $daterange);
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $payments = Payment::with(['district'])
        ->where('status_id', 3)
        ->whereBetween('created_at', [$start, $end])->get();
        $pdf = PDF::loadView('report.order_pdf', compact('payments', 'date'));
        return $pdf->stream();
    }
    public function orderReportExcel($daterange)
    {
        return Excel::download(new PendapatanExport($daterange), 'Pendapatan.xlsx');
    }

    
}
