@extends('layouts.app')

@push('scripts')
    <script>

    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Auction: {{ $auction->name }}</div>

                    <div class="panel-body">
                        @include('_partials.input_flash')

                        {{ $auction->description }}

                        <div class="clearfix" style="margin-top: 20px;">
                            <p class="pull-left">
                                Min Bid: {{ format_price($auction->price) }}
                            </p>
                            @if($bid)
                                <p class="pull-right"><b>You have already placed a bid of: {{ format_price($bid->fee) }}</b></p>
                            @else
                                <button class="btn btn-default pull-right"  data-toggle="modal" data-target="#myModal">Place Bid</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ url('bid/'.$auction->id) }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Place Bid</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $auction->name }}</p>
                            <p>
                                Min Bid: {{ format_price($auction->price) }}
                            </p>

                            <input name="price" type="number" min="{{ $auction->price }}" class="form-control" value="{{ $auction->price }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Place Bid</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
