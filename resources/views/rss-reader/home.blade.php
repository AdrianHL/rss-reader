@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My RSS Index</div>
                @if(empty($rssList))
                    <div class="card-body">
                       No RSS Added Yet!
                    </div>
                @else
                    @foreach($rssList as $rssItem)
                    <div class="card-body">
                        <a href="{{ $rssItem->url}}">{{ $rssItem->url }}</a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
