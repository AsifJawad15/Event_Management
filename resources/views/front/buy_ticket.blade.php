@extends('front.layout.master')

@section('title', 'Buy Ticket | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image: url('{{ asset($banner->background) }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Buy Ticket for {{ $package->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.pricing') }}">Pricing</a></li>
                            <li class="breadcrumb-item active">Buy Ticket for {{ $package->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="price-section" class="pt_50 pb_70 gray prices">
    <div class="container">
        <div class="row">
            <form class="form" method="post" action="{{ route('payment') }}">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <input type="hidden" name="package_name" value="{{ $package->name }}">
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="contact">
                    <h3 class="mb_15 fw600">Billing Information</h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input name="billing_name" type="text" class="form-control" placeholder="Name *" value="{{ Auth::guard('web')->user()->name ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_email" type="text" class="form-control" placeholder="Email *" value="{{ Auth::guard('web')->user()->email ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_phone" type="text" class="form-control" placeholder="Phone *" value="{{ Auth::guard('web')->user()->phone ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_address" type="text" class="form-control" placeholder="Address *" value="{{ Auth::guard('web')->user()->address ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_country" type="text" class="form-control" placeholder="Country *" value="{{ Auth::guard('web')->user()->country ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_state" type="text" class="form-control" placeholder="State *" value="{{ Auth::guard('web')->user()->state ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_city" type="text" class="form-control" placeholder="City *" value="{{ Auth::guard('web')->user()->city ?? '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="billing_zip" type="text" class="form-control" placeholder="Zip Code *" value="{{ Auth::guard('web')->user()->zip ?? '' }}">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea rows="3" name="billing_note" class="form-control" placeholder="Note (Optional)"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3 class="mb_15 fw600">Ticket Information</h3>
                <div class="table-responsive">
                    <table class="table table-bordered cart">
                        <tr>
                            <td class="w_150">Ticket Price</td>
                            <td><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{ number_format($package->price, 0) }}</td>
                        </tr>
                        <tr>
                            <td>Total Tickets</td>
                            <td>
                                <input type="hidden" name="unit_price" id="ticketPrice" value="{{ $package->price }}">
                                <input type="number" min="1" max="100" name="quantity" class="form-control" value="1" id="numPersons" oninput="calculateTotal()">
                            </td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>
                                <input type="text" name="total_price" class="form-control" id="totalAmount" value="৳{{ number_format($package->price, 0) }}" readonly>
                            </td>
                        </tr>
                    </table>
                </div>

                <script>
                    function calculateTotal() {
                        const ticketPrice = parseFloat(document.getElementById('ticketPrice').value);
                        const numPersons = parseInt(document.getElementById('numPersons').value);
                        const totalAmount = ticketPrice * numPersons;
                        document.getElementById('totalAmount').value = `৳${totalAmount}`;
                    }
                </script>

                <h3 class="mt_25 mb_15 fw600">Payment Method</h3>
                <select name="payment_method" class="form-control">
                    <option value="bKash">bKash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Bank">Bank Transfer</option>
                </select>
                <div class="mt_20">
                    <button type="submit" class="btn btn-primary">Buy Ticket</button>
                </div>
            </div>
        </div>
        <div class="row">
            </form>
        </div>
    </div>
</div>

@endsection
