@extends('header')
@section('student')

@if(Session::has('message'))
<p class="message">{{Session::get('message')}}</p>
<script>
$(document).ready(function(){
    $(".message").delay(3000).slideUp(500);
});
</script>
@endif

<body>
    <h1>hello</h1>
</body>


@endsection

