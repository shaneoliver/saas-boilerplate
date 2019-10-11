@extends('account.base')

@section('account.content')

    <div class="card">
        <div class="card-header">
            {{ __('Subscription') }}
        </div>
        <div class="card-body">
            <form action="{{ route('account.billing.store') }}" method="post" id="payment-form">
                @csrf
                <input id="card-holder-name" class="form-control" type="text" value="{{ auth()->user()->name }}">

                <div class="form-group">
                    <label class="" for="card-element">Credit or debit card</label>
                    <!-- A Stripe Element will be inserted here. -->
                    <div id="card-element" class="form-control"></div>
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" class="alert alert-danger mt-4" role="alert"></div>

                <button id="card-button" class="btn btn-primary" data-secret="{{ $intent->client_secret }}">Submit Payment</button>
            </form>
        </div>
    </div>
    
    @push('scripts')
        <script>
            const STRIPE_KEY = "{{ env('STRIPE_KEY') }}";
        </script>
        <script src="https://js.stripe.com/v3/"></script>
    @endpush
@endsection
