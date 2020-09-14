@php
    $SiteProfile = App\SiteProfile::first();
@endphp

@php
    $title = "Avtech Importer In Bangladesh | Soshine Marketing Company";
    $keywords =  "avtech importer in bangladesh, avtech importer in bangladesh, avtech dealer in bangladesh";
    $description =  "Soshine marketing company is the avtech importer in bangladesh, for avtech product query contact with soshine marketing company";
@endphp

@include('UI.inc.headersource')

<!--start header-->
@include('UI.inc.menubar')
<!--End Header-->


<section class="brrr bg-light wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <ol style="background: transparent;" class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{asset('')}}">Home</a></li>
                    <li class="breadcrumb-item active">Importer</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!--start page header area-->
<section class="success-history-header clearfix wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="sh-header-img">
                    <h3 class="mb-4" style="color: #555;">we are the most avtech products importer in bangladesh. all avtech products</h3>
                    <p style="color: #555;">we import avtech NVR, DVR, Access Control, Network Camera, Analog Camera, Network Video Recorder, Network PTZ Camera, HD Camera - 720p, HD Camera - 1080p,
                        Digital Video Recorder, Keyboards, Accessories, Encoders and Decoders. We Import Avtech Products From
                        <a target="_blank" class="text-custom" href="https://www.avtech.com/tw/">Taiwan</a>
                    </p>
                    <p style="color: #555;">avtech importer in bangladesh, soshine marketing company is the sole agent and avtech importer in bangladesh.
                        AVTECH, founded in 1996, is one of the world’s leading CCTV manufacturers. With stably increasing revenue and practical
                        business running philosophy, AVTECH has been ranked as the largest public-listed company among the Taiwan surveillance industry.
                        <a href="http://www.avtech.com.tw/" target="_blank">AVTECH</a> makes every effort on the innovation of technology, product and implementation.
                        Based on years of research and industry experience, AVTECH has obtained a leading position on mobile platform support
                        and provides a full range of surveillance products.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page header area-->

<!--start importer area-->
<section class="importer-area clearfix pb-3 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="text-align: center; margin: 20px 0; margin-top: 40px; font-size: 32px; font-weight: 400;">Avtech Importer In Bangladesh</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-custom" style="">We Import In This Category Products</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <!--col-md-4-->
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        <a href="#">
                            <img src="{{asset('')}}UI/images/ptz-camera.png" class="img-fluid" alt="image">
                            <h4 class="text-custom">PTZ Camera</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--col-md-4-->
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        <a href="#">
                            <img src="{{asset('')}}UI/images/avtech-ip-camera.jpg" class="img-fluid" alt="image">
                            <h4 class="text-custom">Avtech Network Camera</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--col-md-4-->
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        <a href="#">
                            <img src="{{asset('')}}UI/images/avtech-nvr.jpg" class="img-fluid" alt="image">
                            <h4 class="text-custom">Network Video Recorder(NVR)</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--col-md-4-->
            <div class="col-md-4 wow  fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        <a href="#">
                            <img src="{{asset('')}}UI/images/avtech-hd-camera.jpg" class="img-fluid" alt="avtech hd camera">
                            <h4 class="text-custom">Avtech HD Camera</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!--col-md-4-->
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        <a href="#">
                            <img src="{{asset('')}}UI/images/avtech-dvr.jpg" class="img-fluid" alt="avtech dvr">
                            <h4 class="text-custom">Digital Video Recorder(DVR)</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <p>Avtech Imported Product List Bangladesh</p>
        <div class="row">
            @foreach(\App\ProductsPrimaryCategory::get() as $Categorry)
            <div style="text-align: center;padding-right: 5px;padding-left: 5px;" class="col-2 col-sm-3 col-md-3 col-lg-2">
                <h6>{{$Categorry->CategoryName}}</h6>
                @foreach($Categorry->SecondaryCategory as $SecondaryCategory)
                    @foreach($SecondaryCategory->ProductsList as $Products)
                        @if($Products->BrandId==4)
                        <a style="color:#d30411;" href="{{asset('')}}{{$Products->Permalink}}">
                            <p>
                            <strong>{{$Products->Model}}</strong>
                            </p>
                        </a>
                        @endif
                    @endforeach
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--end importer area-->


@include('UI.inc.footerbar')


<!--Social icon-->
@include('UI.inc.sidebarsocialnumber')
<!--Social icon-->

@include('UI.inc.footersource')

</body>
</html>
