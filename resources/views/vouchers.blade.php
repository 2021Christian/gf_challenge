@extends('layouts.plantilla')
@section('contenido')
        <div class="row my-3 d-flex justify-content-between">
            <div class="col">
                <h3>Panel de administración de vouchers</h3>
            </div>
            <div class="col text-end">
                <a href="" class="btn btn-outline-secondary">
                    <i class="bi bi-printer"></i>
                    Print
                </a>
                <a href="/vouchers/excel" class="btn btn-outline-secondary">
                    <i class="bi bi-box-arrow-in-down"></i>
                    Export
                </a>
            </div>
        </div>

        <div class="card">

            <div class="card-header small">
                    <form action="/vouchers" method="POST">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <label for="number">Voucher #</label>
                                <input  name="number" type="text" placeholder="Search...">
                            </div>
                            <div class="col">
                                <label for="booking">Confirmation #</label>
                                <input  name="booking" type="text" placeholder="Search...">
                            </div>
                            <div class="col">
                                <label for="accName">Account</label>
                                <input  name="accName" type="text" placeholder="Search...">
                            </div>
                            <div class="col">
                                <label for="issuer">Issuer Account</label>
                                <input  name="issuer" type="text" placeholder="Search...">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="cba">CBA</label>
                                <input  name="cba" type="text" placeholder="Search...">
                            </div>
                            <div class="col-4">
                                <label for="lastName">Customer's Last Name</label>
                                <input  name="lastName" type="text" placeholder="Search...">
                            </div>
                            <div class="col">
                                <label for="user">User</label>
                                <input  name="user" type="text" placeholder="Search...">
                            </div>
                            <div class="col">
                                <label for="date">Create Date</label>
                                <input  name="date" type="text" placeholder="Search...">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label for="paymentStatus">Payment File Status</label>
                                <input name="paymentStatus" type="text" placeholder="Search...">
                            </div>
                            <div class="col inline">
                                <label for="brand">Brand</label>
                                <input name="brand" type="" placeholder="Search...">
                            </div>
                            <div class="col ">
                                <label for="status">Status</label>
                                <input name="status" type="text" placeholder="Search...">
                            </div>
                            <div class="col-2">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="pastDue">Past Due</label>
                                    <input class="form-check-input" type="checkbox" role="switch" name="pastDue">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-dark btn-sm mx-1">Search...</button>
                                <a href="/vouchers" class="btn btn-outline-dark btn-sm mx-1">
                                    Clear Filters
                                </a>
                            </div>
                        </div>
                    </form>
            </div>

        @if ( $vouchers->count()>0 )
            <div class="card-body">
                    <table class="table table-sm table-striped small">
                        <thead>
                            <tr>
                                <td>Voucher #</td>
                                <td>CBA</td>
                                <td>Brand</td>
                                <td>Account Name</td>
                                <td>Issuer Account</td>
                                <td>Status</td>
                                <td>Past Due</td>
                                <td>Payment File</td>
                                <td>Customer's Last Name</td>
                                <td>Confirmation #</td>
                                <td>Issue IATA</td>
                                <td>Gross Amount</td>
                                <td>GSA Net Amount</td>
                                <td>ABG Net Amount</td>
                                <td>User</td>
                                <td>Create Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $vouchers as $voucher )
                            <tr>
                                <td class="text-primary">
                                    <strong>{{ $voucher->number }}</strong>
                                </td>
                                <td>{{ $voucher->billing_account }}</td>
                                <td>{{ $voucher->brand }}</td>
                                <td>{{ $voucher->accName }}</td>
                                <td>{{ $voucher->company_id }}</td>
                                <td>{{ $voucher->status }}</td>
                                <td>
                                    {{ ($voucher->past_due == 1) ? "Past Due":"" }}
                                </td>
                                <td>{{ $voucher->payment_file_id }}</td>
                                <td>{{ $voucher->lastName }}</td>
                                <td>{{ $voucher->reservation }}</td>
                                <td>{{ $voucher->iata_code }}</td>
                                <td>
                                    {{ config("constants.MONEY_ID")." ".
                                    (config("constants.MONEY_COEF")*$voucher->gross_amount) }}
                                </td>
                                <td>
                                    {{ config("constants.MONEY_ID")." ".
                                    (config("constants.MONEY_COEF")*$voucher->gsa_comission_amount) }}
                                </td>
                                <td>
                                    {{ config("constants.MONEY_ID")." ".
                                    (config("constants.MONEY_COEF")*$voucher->abg_net_amount) }}
                                </td>
                                <td>
                                    {{ $voucher->uName ." ".$voucher->uLastName }}
                                </td>
                                <td>{{ $voucher->issue_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>

            <div class="card-footer">
                {{ $vouchers->links() }}
            </div>
            @else
            <strong>No existen registros.</strong>
        @endif


        </div>

@endsection

