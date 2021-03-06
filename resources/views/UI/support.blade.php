@php
    $SiteProfile = App\SiteProfile::first();
@endphp

@php
    $title = "Avtech Support In Bangladesh | Soshine Marketing Company";
    $keywords = "avtech, support, bangladesh, avtech, distrubutor, importer";
    $description = "Avtech Support In Bangladesh, Contact with Soshine Marketing Company";
@endphp

@include('UI.inc.headersource')

<!--start header-->
@include('UI.inc.menubar')
<!--End Header-->




<!--start mega trading header area-->
<section class="mega-trading-header clearfix py-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-header-img wow fadeInDown" data-wow-duration="1s">
                    <img style="width: 100%;" src="{{asset('')}}UI/images/support.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col wow fadeInDown" data-wow-duration="1s">
                <ol class="breadcrumb mb-0 mt-2">
                    <li class="breadcrumb-item"><a href="{{asset('')}}">Home</a></li>
                    <li class="breadcrumb-item active">Support</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--end mega trading header area-->




<!--start mega trading area-->
<section class="mega-trading clearfix pb-3 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div style="background-color: white;" class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                <div class="row">
                    <h3 style="background-color: #d71920;color: white;margin-bottom: 0;border-radius: 4px;padding: 3px;width: 100%;">Software / Firmware</h3>
                    <ul style="width: 100%;" class="list-group">
                        @foreach(\App\SoftwareList::orderBy('id','DESC')->where('ActiveStatus',1)->get() as $Software)
                        <li class="list-group-item">
                            <a style="color: #337ab7;text-decoration: none;font-weight: bold;" href="{{asset('')}}{{$Software->DownloadLink}}" download>{{$Software->SoftwareName}}</a>
                            <a style="float: right;color:white;" class="btn btn-danger" href="{{asset('')}}{{$Software->DownloadLink}}" download>Download</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                <h3 style="background-color: #d71920;color: white;margin-bottom: 0;border-radius: 4px;padding: 3px;width: 100%;">Video Tutorial</h3>
                <div class="row">
                    @foreach($Tutorials as $Tutorial)
                        @php
                            $video_id = explode("?v=", $Tutorial->VideoURL);
                            $video_id = $video_id[1];
                            $thumbnail="https://img.youtube.com/vi/".$video_id."/mqdefault.jpg";
                        @endphp
                        <div style="margin-top: 5px;" class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <a style="color:#6d6e71;" href="{{asset('')}}tutorial/{{$Tutorial->Permalink}}">
                           <img style="width:100%" src="{{$thumbnail}}" alt="{{$Tutorial->ImageAltText}}" title="{{$Tutorial->ImageTitleText}}">
                            </a>
                            <p style="font-size: 19px;margin-top: 5px;">
                                <a style="color:#d71920" href="{{asset('')}}tutorial/{{$Tutorial->Permalink}}">{{$Tutorial->BlogName}}</a>
                            </p>
                        </div>
                    @endforeach
                </div>

                <div style="margin-top: 10px; margin-bottom: 10px;" class="">
                    {{$Tutorials->links()}}
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!--end mega trading area-->


@include('UI.inc.footerbar')

<!--Social icon-->
@include('UI.inc.sidebarsocialnumber')
<!--Social icon-->

@include('UI.inc.footersource')

</body>
</html>
