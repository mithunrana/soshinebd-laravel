@php
    $SiteProfile = App\SiteProfile::first();
@endphp


@php
    $title = "Avtech Solutions In Bangladesh | Soshine Marketing Company";
    $keywords = "avtech, solutions, soshine marketing company, avtech bangladesh";
    $description = "avtech solutions, Luxury Hotel , Germany, Hypermarket in Taiwan, Popular shopping malls in Australia, Four-star Camping Resort, Czech Republic, Branches of International Hotel";
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
                    <li class="breadcrumb-item">
                        <a href="{{asset('')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Solution</li>
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
                    <h3 class="mb-4" style="color: #555;">Avtech is the world's largest supplier of Solutions</h3>
                    AVTECH creates a broad range of high quality security solutions for all industries</br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end page header area-->

<!--start solution area-->
<section class="main-solution-area clearfix wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            @foreach(\App\Solutions::orderBy('id','DESC')->where('ActiveStatus',1)->skip(0)->take(9)->get() as $Solution)
            <div class="col-lg-4 col-md-6 wow fadeInDown" data-wow-duration="1s">
                <div style="border-radius: 0;" class="sh-box sh-solution">
                    <div class="sh-img sh-img-solution">
                        <a href="{{asset('')}}solutions/{{$Solution->Permalink}}">
                            <img src="{{asset('')}}{{$Solution->featuredimage1->imageurl}}" class="img-fluid" alt="{{$Solution->ImageAltText}}">
                        </a>
                        <h5 style="margin-top: 5px;margin-left: 5px;" class="text-custom">
                            <a style="color:#d30411" href="{{asset('')}}solutions/{{$Solution->Permalink}}">{{$Solution->SolutionsName}}</a>
                        </h5>
                    </div>
                    <div class="sh-txt sh-txt-solution">
                        <a style="color:#d30411" href="{{asset('')}}solutions/{{$Solution->Permalink}}">Learn More →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--end solution area-->


@include('UI.inc.footerbar')


<!--Social icon-->
@include('UI.inc.sidebarsocialnumber')
<!--Social icon-->

@include('UI.inc.footersource')

</body>
</html>
