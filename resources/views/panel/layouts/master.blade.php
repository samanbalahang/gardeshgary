
@include('panel.layouts.header')
<div class="containerfluid px-3 lighter-dark">
    <div class="row">
             @include('panel.layouts.aside')
             @yield("main")
    </div>
</div>
@include('panel.layouts.footer')
