<!-- start site-footer -->
<footer class="site-footer">
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-md-3 col-sm-6">
                    <div class="widget about-widget">
                        <div class="footer-logo"><img src="/front/images/logo.jpg" alt></div>
                        <ul class="contact-info">
                            <li><i class="fa fa-home"></i> {{ $appContent->address }}</li>
                            <li><i class="fa fa-phone"></i> {{ $appContent->support_mobile }}</li>
                            <li><i class="fa fa-home"></i> Working Hours: <br>Mon-Sat (10 am - 7 pm)</li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget service-links-widget">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="javascript:void(0);">Corrugated Box</a></li>
                            <li><a href="javascript:void(0);">Courier Bags</a></li>
                            <li><a href="javascript:void(0);">Stretch Film</a></li>
                            <li><a href="javascript:void(0);">BOPP Tape</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget quick-links-widget">
                        <h3>Navigation</h3>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('user.aboutUs') }}">About Us</a></li>
                            <li><a href="{{ route('user.contactUs') }}">Contact Us</a></li>
                            <li><a href="{{ route('user.faq') }}">FAQ</a></li>
                            <li><a href="{{ route('user.termsCondition') }}">Terms &amp; Conditions</a></li>
                        </ul>
                        <ul>
                            <li><a href="javascript:void(0);">Gallery</a></li>
                            <li><a href="javascript:void(0);">Contact Us</a></li>
                            <li><a href="javascript:void(0);">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-md-3 col-sm-6">
                    <div class="widget twitter-feed-widget">
                        <h3>Twitter Feed</h3>
                        <ul>
                            <li>
                                <div class="text">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Ed quia con sequuntur magni dolores.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="javascript:void(0);">@Mark Wahlberg</a></strong>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Ed quia con sequuntur magni dolores.</p>
                                </div>
                                <div class="info-box">
                                    <i class="fa fa-twitter"></i>
                                    <strong><a href="javascript:void(0);">@Mark Wahlberg</a></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end upper-footer -->
    <div class="copyright-info">
        <div class="container">
            <p>2018-{{ date('Y') }} &copy; All Rights Reserved by <a href="http://adgraphicshub.com" target="_blank">Ad Graphics Hub</a></p>
        </div>
    </div>
</footer>
        <!-- end site-footer -->