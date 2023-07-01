@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <div class="container mt-5" id="contatti">

        <div class="row">
            <div class="col-md-6 maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.060360274027!2d106.71160187499457!3d10.80668908934398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e0!3m2!1svi!2s!4v1688051556453!5m2!1svi!2s"
                    frameborder="0" style="border:0" allowfullscreen>
                    </iframe>
            </div>
            <div class="col-md-6">
                <h2 class="text-uppercase mt-3 font-weight-bold text-black">Contact</h2>
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Fisrt Name*" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Last Name*" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="email" class="form-control mt-2" placeholder="Email*" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Phone*" required>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Comment" id="floatingTextarea2" rows="3"></textarea>
                              </div>
                        </div>

                        <div class="col-12 mt-2 text-end">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                </form>
                <div class="text-black">
                    <h2 class="text-uppercase mt-4 font-weight-bold">Reach Us</h2>

                    <i class="fa fa-phone mt-3"></i> <a href="#">(+84) 359158077</a><br>
                    <i class="fa fa-envelope mt-3"></i> <a href="#">ank@gmail.com</a><br>
                    <i class="fa fa-globe mt-3"></i> D5, Bình Thạnh, Việt Nam<br>
                    <div class="my-4">
                        <a href="#"><i class="fa fa-facebook fa-3x fa-pull-left fa-border"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-3x fa-pull-left fa-border"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
