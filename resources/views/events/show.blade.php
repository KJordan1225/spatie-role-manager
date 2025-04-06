@extends($layout)

@section('content')

<div class="container-xl" >

<div class="row" style="margin-left: 250px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Event</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="container" style="margin-left: 250px;">
    {!! $event->content !!}
</div>

<div class="row" style="margin-left: 250px;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $event->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong>
            {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y h:i A') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong>
            {{ \Carbon\Carbon::parse($event->end_date)->format('F d, Y h:i A') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Location:</strong>
            {{ $event->location }}
        </div>
    </div>
</div>

</div>
@endsection
