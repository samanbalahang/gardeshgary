@extends('thepublic.layout.master')

@section("extracss")
    <link rel="stylesheet" href="{{url('/')}}/assets/css/pages.min.css">
@endsection

<!--Main Navigation-->

@section("main")
<main class="mt-3">
<div class="container">
    <h1>عنوان</h1>
    <p>
        متن
    </p>
</div>


</main>
@endsection

@section("extrajs")
    <script src="{{url('/')}}/assets/js/pages.min.js"></script>
@endsection