@php
    $SiteProfile = App\SiteProfile::first();
@endphp

@php
    $title = "About | Soshine Marketing Company";
    $keywords =  "about, soshine, marketing, company, avtech, bangladesh, avtech dealer in bangladesh";
    $description =  "Soshine marketing company has been successfully operating its business since 2005. Soshine Marketing Company is the sole agent of AVTECH in Bangladesh";
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
                    <li class="breadcrumb-item active">About Soshine Marketing Company</li>
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
            <div class="col">
                <div class="mt-box card-body card" style="border-radius: 0;">
                    <div class="row">
                        <div class="col">
                            <div class="mt-header">
                                <h3 class="text-custom">Soshine Marketing Company</h3>
                                <p>Soshine marketing company has been successfully operating its business since 2005. Soshine Marketing Company is the sole
                                    agent of AVTECH in Bangladesh and also has partnership with different renowned global brands like Hundure, Zkteco etc. It consists of young,
                                    dynamic and highly motivated professionals. We combine excellence with top quality,
                                    integrity and timeliness to provide 24/7 quality service specially designed to facilitate our users experience beyond expectation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mega-trading-item mt-4" style="border-bottom: 2px solid #d30411;padding: 0 20px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mt-txt pr-2">
                                    <h4>Good technical support:</h4>
                                    <p style="font-size: 14px;">Our technician is usually out there over the phone or in saleroom to answer any queries that client might need. we have a tendency to even have product specifications area unit created out there to transfer.</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-img">
                                    <img src="{{asset('')}}UI/images/service.jpg" class="img-fluid mb-2" alt="service">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mega-trading-item mt-4" style="border-bottom: 2px solid #d30411;padding: 0 20px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mt-txt pr-2">
                                    <h4>Quality product:</h4>
                                    <p style="font-size: 14px;">We use our 7 years of in depth technical experience and knowledge to pick and style the most effective value quality product for our customer. All our product bear internal control before commerce to customer</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-img">
                                    <img src="{{asset('')}}UI/images/mega-trading-quality.jpg" class="img-fluid mb-2" alt="quality">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mega-trading-item mt-4" style="border-bottom: 2px solid #d30411;padding: 0 20px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mt-txt pr-2">
                                    <h4>Our Mission</h4>
                                    <p style="font-size: 14px;">Be the Best technology automation service and security solutions provider through genuine facilities.</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-img">
                                    <img src="{{asset('')}}UI/images/mega-trade-mission.jpg" class="img-fluid mb-2" alt="mission">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mega-trading-item mt-4" style="border-bottom: 2px solid #d30411;padding: 0 20px;">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mt-txt pr-2">
                                    <h4>Our Vission</h4>
                                    <p style="font-size: 14px;">Develop the optimal automation solutions and add value for customers’ enrichments. Deliver business assistances to clients through technological expertise and consultancy.
                                        Achieve supreme customer satisfaction through our products excellence and solutions.</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-img">
                                    <img src="{{asset('')}}UI/images/mega-trade-vission.jpg" class="img-fluid mb-2" alt="vision">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center">Soshine Marketing Company is committed to R&amp;D and innovation</h3>
        <div class="small-width" style="text-align: center;">
            <p>Soshine Marketing Company possess the world's largest R&amp;D team and state-of-art development facilities;
                both allow Soshine Marketing Company customers the benefit of world-class software that are designed with
                cutting-edge technology. As further commitment to its customers,Soshine Marketing Company annually
                reinvests 7% of its revenue into R&amp;D for continued product innovation and improvement.</p>
            </p>
            <br>
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
