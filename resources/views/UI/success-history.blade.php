@php
    $SiteProfile = App\SiteProfile::first();
@endphp

@php
    $title = "Success History Avtech Bangladesh | Soshine Marketing Company";
    $keywords =  "portfolio, avtech, soshine marketing company, success history, avtech project bangladesh";
    $description =  "Success History of Avtech Bangladesh, avtech recent completed project in bangladesh overview";
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
                    <li class="breadcrumb-item active">Portfolio</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<!--start success history header area-->
<section class="success-history-header clearfix wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="sh-header-img">
                    <h3 class="mb-4" style="color: #555;">Avtech is the world's largest supplier of video surveillance products and Solutions</h3>
                    <p style="color: #555;">The company makes a speciality of video police investigation technology, also as coming up with and producing a full-line of innovative CCTV and video police investigation product.
                        the merchandise line ranges from cameras and DVRs to video management computer code. Since its organisation in 1996,
                        Avtech has quickly achieved a number one worldwide market position within the security business. Avtech Is Taiwan Brand Its Made & Origin Taiwan</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end success history header area-->


<!--start success history area-->
<section class="success-history clearfix pb-3 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 style="text-align: center; margin: 20px 0; margin-top: 40px; font-size: 32px; font-weight: 400;">Some Success History Of Avtech Bangladesh</h3>
            </div>
        </div>
        <div class="row">
            <!--col-md-4-->
            @foreach($Portfolios as $Portfolio)
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box">
                    <div class="sh-img">
                        @if($Portfolio->Permalink=="#")
                           <a href="{{asset('')}}portfolio">
                        @else
                           <a href="{{asset('')}}portfolio/{{$Portfolio->Permalink}}">
                        @endif
                            <img src="{{asset('')}}{{$Portfolio->featuredimage1->imageurl}}" class="img-fluid" alt="{{$Portfolio->ImageAltText}}">
                            <h4 class="text-custom">
                                {{$Portfolio->ProjectName}}
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            <!--col-md-4-->

            <div style="margin-top: 10px; margin-bottom: 10px;" class="">
                {{$Portfolios->links()}}
            </div>

        </div>
    </div>
</section>
<!--end success history area-->


@include('UI.inc.footerbar')


<!--Social icon-->
@include('UI.inc.sidebarsocialnumber')
<!--Social icon-->

@include('UI.inc.footersource')

</body>
</html>
