@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @include('_partials.input_flash')

                    @foreach($auctions->chunk(2) as $_auctions)
                        <div class="row">
                            @foreach($_auctions as $auction)
                                <div class="col-sm-6">
                                    <div class="panel panel-{{ rand_class() }}">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{{ $auction->name }}</h3>
                                        </div>
                                        <div class="panel-body">
                                            {{ str_limit($auction->description, 400) }}
                                        </div>
                                        <div class="panel-footer clearfix">
                                            <b>Minimum Price:</b> {{ format_price($auction->price) }}
                                            <a href="{{ route('auctions.show', $auction->id) }}" class="btn btn-success btn-sm pull-right">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
