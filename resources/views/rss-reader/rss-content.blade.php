<h1>{{ $rssContent->title }}</h1>

@if(!empty($rssContent->link[0]['href']))
    <a href="{{{$rssContent->link[0]['href']}}}">Link</a>
@endif

<h2>Content</h2>

@if(empty($rssContent->entry))
    No Content
@else
    @foreach($rssContent->entry as $rssEntry)
        <li>
            <a target="blank" href="{{{ empty($rssEntry->link->attributes()['href']) ? '' : $rssEntry->link->attributes()['href']}}}">{{ $rssEntry->title }}</a>
            {{ $rssEntry->updated ? '(' . \Carbon\Carbon::parse($rssEntry->updated)->toDayDateTimeString() . ')' : ''}}
        </li>
    @endforeach
@endif