@extends('layouts.app')

@section('title', 'Beaty')

@section('content')
    <br>
    <div class="container-fluid">
        <header class="py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder  mb-2">A Bootstrap 5 template for modern businesses</h1>
                            <p class="lead fw-normal text-50 mb-4">Quickly design and customize responsive mobile-first
                                sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-success btn-lg px-4 me-sm-3 m-3" href="{{ Route('register') }}">User
                                    Register</a>
                                <a class="btn btn-warning btn-lg px-4 m-3" href="{{ Route('chef.register_index') }}">Chef
                                    Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                            src="http://whatsupcairo.cairowestmag.com/wp-content/uploads/2018/10/43770160_2775970659095661_5252599764393918464_n.jpg"
                            alt="..." /></div>
                </div>
            </div>
        </header>
        {{-- <header class=" py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder  mb-2">A Bootstrap 5 template for modern businesses</h1>
                            <p class="lead fw-normal mb-4">Quickly design and customize responsive mobile-first
                                sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start ml-5">
                                <a class="btn btn-success btn-lg px-4 me-sm-3 ml-5" href="{{ Route('register') }}">User
                                    Register</a>
                                <a class="btn btn-outline-dark btn-lg px-4 ml-2"
                                    href="{{ Route('chef.register_index') }}">Chef
                                    Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                            src="http://whatsupcairo.cairowestmag.com/wp-content/uploads/2018/10/43770160_2775970659095661_5252599764393918464_n.jpg"
                            alt="food imgage" /></div>
                </div>
            </div>
        </header> --}}
        <header class="py-5" id="aboutUS">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Our mission is to make building websites easier for everyone.</h1>
                            <p class="lead fw-normal text-muted mb-4">Start Bootstrap was built on the idea that quality,
                                functional website templates and themes should be available to everyone. Use our open
                                source, free products, or support us by purchasing one of our premium products or services.
                            </p>
                            <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="py-5" id="scroll-target">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0"
                            src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                            alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Our founding</h2>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae
                            et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0"
                            src="https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                            alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Growth &amp; beyond</h2>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae
                            et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
