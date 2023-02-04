@extends('mainMgn.layouts.master')

@section("extracss")

@endsection

<!--Main Navigation-->

@section("main")
    <div class="col-12 col-md-10">
        <main>
            @include('mainMgn.extras.pageSettings')
            <div id="summernote">Hello Summernote</div>
        </main>
    </div>
@endsection

@section("extrajs")

@endsection