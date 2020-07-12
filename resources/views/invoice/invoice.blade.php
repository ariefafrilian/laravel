@extends('layouts.master')

@section('title', 'Invoice')

@section('home', 'active')

@section('content-title', 'Invoice')

@section('breadcrumb')
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('transaction') }}">Transaction</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
        </div>
@endsection

@section('content')
		<div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{ $about->company }}, Inc.
                    <small class="float-right">Date: {{ $transaction->signature }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    {{ $about->country }}<br>
                    {{ $about->city }}<br>
                    {{ $about->address }}<br>
                    {{ $about->email }}<br>
                    {{ $about->phone }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $transaction->customer->first_name }} {{ $transaction->customer->last_name }}</strong><br>
                    {{ $transaction->customer->city }}<br>
                    {{ $transaction->customer->address }}<br>
                    {{ $transaction->customer->email }}<br>
                    {{ $transaction->customer->phone }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  invoice
                  <address>
                    <strong>{{ $transaction->invoice }}</strong>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial number</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{ $transaction->qty }}</td>
                      <td>{{ $transaction->inventorie->name }}</td>
                      <td>{{ $transaction->inventorie->serial }}</td>
                      <td>{{ 'Rp. ' . number_format($transaction->inventorie->price, 0, ',', '.') }}</td>
                      <td>{{ 'Rp. ' . number_format(($transaction->inventorie->price * $transaction->qty), 0, ',', '.') }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ asset('img/credit/visa.png') }}" alt="Visa">
                  <img src="{{ asset('img/credit/mastercard.png') }}" alt="Mastercard">
                  <img src="{{ asset('img/credit/american-express.png') }}" alt="American Express">
                  <img src="{{ asset('img/credit/paypal2.png') }}" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due ...</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{ 'Rp. ' . number_format(($transaction->inventorie->price * $transaction->qty), 0, ',', '.') }}</td>
                      </tr>
                      <tr>
                        <th>Tax (3%)</th>
                        <td>{{ 'Rp. ' . number_format((($transaction->inventorie->price * $transaction->qty) * 0.3), 0, ',', '.') }}</td>
                      </tr>
                      <tr>
                        <th>Points</th>
                        <td>5</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{ 'Rp. ' . number_format(($transaction->inventorie->price * $transaction->qty) + (($transaction->inventorie->price * $transaction->qty) * 0.3), 0, ',', '.') }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="javascript:void(0);" onclick="print();" class="btn btn-sm btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-sm btn-primary float-right" style="margin-right: 5px; cursor: not-allowed;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection