<!DOCTYPE html>
<html>
<head>
    <title>Gamma Alpha Chapter Directory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Testing the generation of PDF of chapter directory</p>

    <br />
  
    <table class="table table-bordered" id="profileTable">
  <tr>
     <th width="100px">Image</th>
     <th width="500px">Information</th>
  </tr>

    @foreach ($profiles as $profile)

        @if (empty($profile->profile_image))
            @php 
                $url = 'storage/profiles/user-placeholder.png';
                $image = public_path ($url);
            @endphp
        @else
            @php 
                $url = 'storage/'.$profile->profile_image;
                $image = public_path ($url);
            @endphp
        @endif

  <tr>
        <td><!-- Profile Image -->
            <img src="{{ $image }}" alt="No Profile Image Uploaded" style="width: 100px; height: 100px; object-fit: cover;" class="img-fluid rounded-circle"></td> 
        <td>
            Name: {{ $profile->last_name }}, {{ $profile->first_name }}<br />
            Address: {{ $profile->address1 }}<br />
                    {{ $profile->city }}, {{ $profile->state}} {{ $profile->zip_code }}<br />            
            Email: {{ $profile->user->email }}
        </td>
    </tr>

    @endforeach

</table>
  
</body>
</html>
