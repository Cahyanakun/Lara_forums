@extends('frontend.layouts.app')

@section('main')
<section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-5">Contact Us</h1>
            <h3  class="mb-5"><img src="{{ asset('profile/9ILKOM.jpg')}}" alt="" style="width:800px; height:380px;"></h3>
            <h6 class="text-center">Web Portal Mahasiswa dibuat dibawah Otoritas</h6>
            <h5 class="text-center"><a href="http://pasim.ac.id/" target="_blank">Universitas Nasional PASIM</a></h5>
            <h5 class="text-center">Jalan Dakota No.8a Sukaraja Bandung</h5>
            <h5 class="text-center">informasi@pasim.ac.id</h5>
            <h5 class="text-center">022-607486</h5>
          </div>

          <!-- END main-content -->

         

         @include('frontend.layouts.sidebar')
         

        </div>
      </div>
    </section>
    @endsection