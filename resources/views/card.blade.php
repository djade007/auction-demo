@extends('layouts.app')

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/js/card.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Complete your registration by entering your card details</div>

                    <div class="panel-body">
                        @include('_partials.input_flash')


                        <div class="panel-body">
                                <form method="post" id="payment-form">
                                    <div class="form-row">
                                        <label for="card-element" style="margin-bottom: 20px;">
                                            Credit or debit card
                                        </label>

                                        <div id="card-element">
                                            <!-- a Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors -->
                                        <div class="alert alert-danger" style="display: none;" id="card-errors" role="alert"></div>
                                    </div>

                                    <button id="card-button" class="btn btn-success pull-right" style="margin-top: 20px;">Add Card</button>
                                </form>
                                <form style="display: none" method="post" id="token-form">
                                    <input type="hidden" name="token" id="token">
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
