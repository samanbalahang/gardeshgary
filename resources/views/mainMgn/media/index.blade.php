@extends('mainMgn.layouts.master')

@section("extracss")




@endsection

<!--Main Navigation-->

@section("main")      
<div class="col-12 col-md-7 p-0 bg-gray">
        <main class="tab-content" id="A" style="margin-top: 58px">
            <div class="tab-content" id="myTabContent0">
                <header>
                    <div class="help-container">
                        <!-- Collapsed content -->
                        <div class="collapse mt-3 bg-black border-thin border-gold p-3" id="collapseExample">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident.
                        </div>
                        <!-- Buttons trigger collapse -->
                        <a class="btn btn-black has-arrow-up" data-mdb-toggle="collapse"  href="#collapseExample" role="button" aria-expanded="false"  aria-controls="collapseExample">
                            تنضیمات صفحه
                            <i class="fas fa-angle-up"></i>
                        </a>
                        <button class="btn btn-black has-arrow-up" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                           راهنما
                            <i class="fas fa-angle-up"></i>
                        </button>
                    </div>
                </header>
                <section id="mainForm">
                    <section class="formTitle">
                        <h1>
                            مدیاها
                        </h1>
                    </section>
                    <section class="addbtn my-3">
                        <a href="{{route('media.create')}}" class="btn btn-yellow w-100"><i class="fas fa-plus px-3"></i> افزودن مدیا</a>
                    </section>
                    @php
                        $i = 0;
                    @endphp
 
                    <table id="showMenu" class="display datatable w-100">
                                    <thead>
                                        <tr>
                                            <th class="nosearch">id</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th class="nosearch">مدیریت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                            <td></td>
                                            @foreach ($medias as $media)                                               
                                                @if($i< 5)
                                                    <td><img src="{{url('/')}}/{{$media->image_path}}" alt="{{$media->photo_alt}}" class="w-100">
                                                    <br/>
                                                    {{$i}}
                                                </td>
                                                @else
                                                
                                                <td>
                                          
                                                         <div class="d-flex justify-content-center w-100">
                                                             <a href="edit-adminPanel.html" class="btn btn-warning p-2">ویرایش</a>
                                                           <form action="" methode="POST">
                                                                 <input type="submit" value="حذف" class="btn btn-danger p-2">
                                                             </form>
                                                         </div>
                                                     </td>
                                                  </tr>
                                                @if($medias->count()>5)
                                                  <tr>
                                                  <td></td>
                                                  <td><img src="{{url('/')}}/{{$media->image_path}}" alt="{{$media->photo_alt}}" class="w-100">
                                                    <br/>
                                                    {{$i}}
                                                  </td>
                                                  @endif
                                                  @php
                                                        $i=0;
                                                  @endphp
                                                @endif
                                                @php
                                                $i++;    
                                                @endphp
                                                         <!-- <td>
                                                         <div class="d-flex justify-content-center w-100">
                                                             <a href="edit-adminPanel.html" class="btn btn-warning p-2">ویرایش</a>
                                                           <form action="" methode="POST">
                                                                 <input type="submit" value="حذف" class="btn btn-danger p-2">
                                                             </form>
                                                         </div>
                                                     </td>
                                                 </tr> -->
                      
                                            @endforeach
                                           
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیا:</th>
                                            <th>مدیریت</th>
                                        </tr>
                                    </tfoot>
                                </table>
                </section>
            </div>
        </main>
    </div>
    @include("mainMgn.layouts.leftside")
@endsection

@section("extrajs")
<script src="{{url('/')}}/mainMgn/assets/js/datatabledet.js"></script>
<script>
$(function(){
    $('.data-table thead th').each( function () {
        var title = $(this).text();
        if(title != 'No' && title != 'عملیات') {
            $(this).html('<input type="text" placeholder="'+title+'" />');
        }
    } );

    var reportsTable = $(".data-table").DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        language: {
            "url": "<?=url('/')?>/lang/fa.json"
        }
    } );
    reportsTable.on( 'order.dt search.dt', function () {
        var i=1;
        reportsTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i=1) {
            if(i<9){
                cell.innerHTML ="0"+ (i + 1);
            }else {
                cell.innerHTML = i + 1;
            }
        });
    }).draw();
});
</script>


@endsection