@extends($layout)

@section('content')
<div class="container mx-auto p-4 bg-white rounded shadow w-100" style="margin-left: 200px;">

    @if(session('success'))
        <div class="alert alert-success" role="alert" style="margin-left: 200px;"> 
            {{ session('success') }}
        </div>
    @endif

    <div class="row" style="margin-left: 200px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Event List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success btn-sm mb-2" href="{{ route('event.create') }}"><i class="fa fa-plus"></i> Create New Event</a>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('welcome') }}"><i class="fa fa-arrow-left"></i> Goto Homepage</a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto" style="margin-left: 200px; width: 80%">        
        @if (count($events) > 0)
        <table class="table table-bordered">
            <tr>
                <th width="35px">#</th>
                <th width="200px">Name</th>
                <th width="200px">Start Date and Time</th>
                <th width="250px">Location</th>
                <th width="210px">Action</th>
            </tr>
                @php
                    $i=0;
                @endphp
                @foreach ($events as $key => $event)    
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y h:i A') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('event.show',$event->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('event.edit',$event->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form method="POST" action="{{ route('event.destroy',$event->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th width="35px">#</th>
                        <th width="200px">Name</th>
                        <th width="150px">Start Date and Time</th>
                        <th width="250px">Location</th>
                        <th width="210px">Action</th>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center border px-4 py-4">
                            <h2>No events found.</h2>
                        </td>
                    </tr>
                </table>
            @endif
    </div>
</div>
@endsection

