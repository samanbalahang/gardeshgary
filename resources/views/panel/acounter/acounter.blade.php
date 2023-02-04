@extends('panel.layouts.master')

@section("extracss")




@endsection

<!--Main Navigation-->

@section("main")
<div class="col-12 col-md-10 bg-gray">
    <main class="tab-content" id="A" style="margin-top: 58px">
            <div class="tab-content" id="myTabContent0">
                <!-- dashboard -->
                <div aria-labelledby="home-tab0" class="tab-pane fade show active p-3" id="home0" role="tabpanel">

                    <!-- Section: Main chart -->
                    <section class="mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h5 class="mb-0 text-center"><strong>Sales</strong></h5>
                            </div>
                            <div class="card-body">
                                <canvas class="my-4 w-100" height="380" id="myChart"></canvas>
                            </div>
                        </div>
                    </section>
                    <!-- Section: Main chart -->

                    <!--Section: Sales Performance KPIs-->
                </div>
            </div>
        </main>
</div>
@endsection

@section("extrajs")



@endsection