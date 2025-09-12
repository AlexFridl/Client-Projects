
            <!--::footer_part start::-->
            <footer class="footer_part">
                <div class="footer_iner" style="background-color: #fff" >
                    <div class="container">
                        <div class="row justify-content-between align-items-center" >
                            <div class="col-md-8">
                                <div class="footer_menu">
                                    {{-- <div class="footer_logo"> --}}
                                    <!-- <a href="index.html"><img src="{{asset('/')}}img/logo.png" alt="#"></a> -->
                                    {{-- </div> --}}
                                    <div class="footer_menu_item">
                                        <h3>Adresa</h3>
                                        <h5>{{$podaci->ulica}}</h5>
                                        <h5>{{$podaci->mesto}}</h5>
                                        </br>
                                        <h3>Kontakt</h3>
                                        <h5>{{$podaci->kontakt_tel}}</h5>
                                        </br>
                                    </div>
                                    <div class="mapaGoogle">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2851.2461701684742!2d20.2532178153921!3d44.38706817910303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a01f97a69cdcd%3A0xb7d79b4f72361456!2sVeljka%20Vlahovi%C4%87a%2010%2C%20Lazarevac!5e0!3m2!1sen!2srs!4v1632580762983!5m2!1sen!2srs" width="600" height="450" style="border:1px solid #FFDEAD;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                    </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="social_icon">
                                    <a href="https://www.facebook.com/ipl.epilacija" style="background-color: #FFDEAD;hover:#000;"><i class="fab fa-facebook-f" style="color: #152e15;"></i></a>
                                    <a href="https://www.instagram.com/kozmetickisalon_spela/?fbclid=IwAR2nDYfYseVTq4b-JfUaJRlCfJ1pMpD7UecNj1J2wQBJwqeVdvraO5SzXCY" style="background-color: #FFDEAD;"><i class="fab fa-instagram" style="color: #152e15;"></i></a>
                                    <a href="https://www.youtube.com/channel/UC69bXX-AhSV67-Lg-QyyFnw/featured" style="background-color: #FFDEAD;;"><i class="fab fa-youtube"  style="color: #152e15;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="copyright_part">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="copyright_text">
                                    <p>
                                        Copyright Špela Beauty | Design by AFridl &copy;<script>document.write(new Date().getFullYear());</script>
                                    </p>
                                    <div>
                                        @if(!session()->has('user'))
                                            <a href="{{route('logovanje')}}" class="nav-link" id="logovanje">Logovanje</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--::footer_part end::-->

            <!-- jquery plugins here-->
            <script src="{{asset('/')}}js/jquery-1.12.1.min.js"></script>
            <!-- popper js -->
            <script src="{{asset('/')}}js/popper.min.js"></script>
            <!-- bootstrap js -->
            <script src="{{asset('/')}}js/bootstrap.min.js"></script>
            <!--Lightbox-->
            <script src="{{asset('/')}}js/lightbox.js"></script>
            <!-- easing js -->
            <script src="{{asset('/')}}js/jquery.magnific-popup.js"></script>
            <!-- swiper js -->
            <script src="{{asset('/')}}js/swiper.min.js"></script>
            <!-- swiper js -->
            <script src="{{asset('/')}}js/mixitup.min.js"></script>
            <!-- particles js -->
            <script src="{{asset('/')}}js/owl.carousel.min.js"></script>
            <script src="{{asset('/')}}js/jquery.nice-select.min.js"></script>
            <!-- slick js -->
            <script src="{{asset('/')}}js/slick.min.js"></script>
            <script src="{{asset('/')}}js/jquery.counterup.min.js"></script>
            <script src="{{asset('/')}}js/waypoints.min.js"></script>
            <script src="{{asset('/')}}js/contact.js"></script>
            <script src="{{asset('/')}}js/jquery.ajaxchimp.min.js"></script>
            <script src="{{asset('/')}}js/jquery.form.js"></script>
            <script src="{{asset('/')}}js/jquery.validate.min.js"></script>
            <script src="{{asset('/')}}js/mail-script.js"></script>
            <!-- custom js -->
            <script src="{{asset('/')}}js/custom.js"></script>
            <script src="{{asset('/')}}js/dropdown_custom.js"></script>
            <script src="{{asset('/')}}js/script.js"></script>


            <script type="text/javascript">
                const baseUrl = '<?php echo e(route("index")); ?>';
                const token = '<?php echo e(csrf_token()); ?>';
            </script>
        </div>
    </body>

</html>
