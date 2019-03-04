@extends('frontend.layouts.app')

@section('main')
<section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          
            <div class="owl-carousel owl-theme home-slider">
             
              @foreach($banner as $result)
              <div>
                <a href="{{route('readbanner', $result->id )}}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ $result->image}}'); ">
                  <div class="text half-to-full">
                    <div class="post-meta">
                   
                      <span class="mr-2">{{ date('d F Y ', strtotime($result->created_at)) }} </span> &bullet;
                    </div>
                    <h3>{{ $result->title }}</h3>
                    
                    <p>
                      {!! htmlspecialchars_decode(Str::words($result->body, $limit=30, $end='....')) !!}
                    </p>

                  </div>
                </a>
                </div>
                @endforeach
              
            </div>
            
            
          </div>
        </div>
      </div>


    </section>
    <!-- END section -->

    <section class="site-section py-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-4">Latest News</h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">

                    <h3>Opps...Data Tidak Ditemukan</h3>

          </div>

          <!-- END main-content -->

         @include('frontend.layouts.sidebar')

        </div>
      </div>
    </section>

@endsection