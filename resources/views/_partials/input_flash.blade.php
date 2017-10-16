@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p>{!! session('error') !!}</p>
    </div>
@elseif(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <p>{{ session('success') }}</p>
    </div>
@elseif(isset($_info))
    <div class="alert alert-info">
        {{ $_info }}
    </div>
@endif
