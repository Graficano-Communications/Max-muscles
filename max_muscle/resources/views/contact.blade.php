@extends('layouts.master')
@section('title', 'Contact us')
@section('styles')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stop
@section('content')
    <!-- contact area start -->
    <div class="contact__area"
        style="padding: 90px;background-image: url('{{ asset('assets/img/contact/Contact-us.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 justify-content-center ">
                    <div class="contact__content text-center">

                        <h2 class="text-white">Contact Us</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact__area" style="padding: 40px;">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                        <div class="contactbox">
                            <div class="contactbox__heading">
                                <h5>Contact us</h5>
                                <h2> Get in Touch for all Your Inquiries </h2>
                            </div>
                            <div class="contactbox__info pt-20">
                                <h5>Address</h5>
                                <ul>
                                    <li>Toor Abad Daska Road, Sialkot 51310 Pakistan</li>
                                </ul>
                            </div>
                            <div class="contactbox__info pt-20">
                                <h5>Phone</h5>
                                <ul>
                                    <li>+92-52-3550465</li>
                                    <li>+92-310-7777511</li>
                                </ul>
                            </div>
                            <div class="contactbox__info pt-20">
                                <h5>Contacts Email:</h5>
                                <ul>
                                    <li><a href="#">info@maxmuscle.pk</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-md-6">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form">
                            <h5>write to us</h5>
                            <form action="{{ route('SendMail') }}" method="POST">
                                <div class="c-input-group">
                                    <label>Your Email (required)</label>
                                    <input type="text" name="email" required>
                                </div>
                                <div class="c-input-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" required>
                                </div>
                                <div class="c-input-group">
                                    <label>Your Message</label>
                                    <textarea name="message" name="message" required></textarea>
                                </div>
                                @csrf
                                <div class="submit-btn">
                                    <input type="submit" value="Send">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <div class="map__area">
        <div class="google-map contact-map">
            <iframe class="w-100" height="800"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3367.2924082561753!2d74.48133101521628!3d32.438107081075636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391ec21f3a3df223%3A0x67af8c28c5a6cbcd!2sDaska%20Rd%2C%20Sialkot%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1672060290001!5m2!1sen!2s"></iframe>
        </div>
    </div>


@endsection
