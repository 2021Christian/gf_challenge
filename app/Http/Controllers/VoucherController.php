<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VouchersExport;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vouchers = Voucher::paginate(10);
        $vouchers = Voucher::join('brands', 'vouchers.brand_id', '=','brands.id')
            ->join('companies', 'vouchers.gsa_company_id', '=', 'companies.id')
            ->join('voucher_status', 'vouchers.voucher_status_id', '=', 'voucher_status.id')
            ->join('bookings', 'vouchers.booking_id', '=', 'bookings.id')
            ->join('users', 'vouchers.user_id', '=', 'users.id')
            ->select('vouchers.*',
                    'brands.name as brand',
                    'companies.name as accName',
                    'voucher_status.name as status',
                    'bookings.last_name as lastName',
                    'bookings.reservation as reservation',
                    'users.name as uName',
                    'users.last_name as uLastName')
            ->paginate(10);
        // dd($vouchers);
        return view( 'vouchers', [ 'vouchers' => $vouchers ]);
    }

    public function search( Request $request )
    {
        // dd("%$request->accName%");
        $vouchers = DB::table('vouchers')
            ->select('vouchers.*',
                    'brands.name as brand',
                    'companies.name as accName',
                    'voucher_status.name as status',
                    'bookings.last_name as lastName',
                    'bookings.reservation as reservation',
                    'users.name as uName',
                    'users.last_name as uLastName')
            ->join('brands', 'vouchers.brand_id', '=','brands.id')
            ->join('companies', 'vouchers.gsa_company_id', '=', 'companies.id')
            ->join('voucher_status', 'vouchers.voucher_status_id', '=', 'voucher_status.id')
            ->join('bookings', 'vouchers.booking_id', '=', 'bookings.id')
            ->join('users', 'vouchers.user_id', '=', 'users.id')
            ->where('vouchers.number', ($request->number)?$request->number:"*")
            ->where('companies.name', 'LIKE' ,"%".$request->accName."%")
            ->paginate(10);

        return view( 'vouchers', [ 'vouchers' => $vouchers ]);
    }

    /**
    * Vouchers export to CSV
    */
    public function excelExport()
    {

        return Excel::download(new VouchersExport, 'vouchers.xlsx' );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
