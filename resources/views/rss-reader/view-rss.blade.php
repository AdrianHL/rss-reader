@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View RSS</div>
                <div class="card-body">
                    @if(empty($rssContent))
                        <p>No RSS Content based on URL provided!</p>
                        Please verify URL: <a href="{{ $rss->url }}" target="_blank">{{ $rss->url }}</a>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
