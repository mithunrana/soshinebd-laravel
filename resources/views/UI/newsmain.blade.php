@php
    $SiteProfile = App\SiteProfile::first();
@endphp

@php
    $title = "News Avtech Bangladesh | Soshine Marketing Company";
    $keywords =  "news, soshine, marketing, company, avtech, importer, bangladesh, avtech distributor in bangladesh";
    $description =  "Latest News, Soshine marketing company is the avtech importer in bangladesh, for avtech product query contact with soshine marketing company";
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
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div>
        </div>
    </div>
</section>




<!--start success history area-->
<section class="success-history clearfix pb-3 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <!--col-md-4-->
            @foreach($Newses as $News)
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1s">
                    <div style="border-radius: 0;" class="sh-box">
                        <div class="sh-img">
                            <a href="{{asset('')}}news/{{$News->Permalink}}">
                                <img src="{{asset('')}}{{$News->featuredimage1->imageurl}}" class="img-fluid" alt="{{$News->ImageAltText}}">
                                <h4 style="font-size: 19px;" class="text-custom">
                                    {{$News->NewsName}}
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
        @endforeach
        <!--col-md-4-->

        <div style="margin-top: 10px; margin-bottom: 10px;" class="">
            {{$Newses->links()}}
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
