@include('mainMgn.layouts.header')

<div class="container-fluid">
    <div class="row">
        @include('mainMgn.layouts.aside') 

        @yield("main")

    </div>
</div>
    

@include('mainMgn.layouts.footer')    