<?php

namespace App\Exports;

use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class VouchersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Voucher::all()->chunk(size:1000);
        /* return Voucher::join('brands', 'vouchers.brand_id', '=','brands.id')
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
            ->paginate(1000) */;
    }
}
