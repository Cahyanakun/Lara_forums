<div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <div class="well well-sm bg-primary text-center" style="padding:5px; color:#FFF; border-radius:5px; font-size:18px;;">
                  Profile Me
              </div>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <img src="/upload/photouser/AHYARUDIN.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                  <h2>AHYAR RUDIN</h2>
                  <p>Aplikasi web portal yang dibuat ini untuk memenui persyaratn dalam menempuh jenjang studi S1 Teknik Informatika di Universitas Nasional Pasim Bandung.</p>
                  <!-- <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p> -->
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
       

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
              @foreach($cates as $category)
                <li><a href="{{ route('category', $category) }}">{{ $category->name }}<span>({{ $category->posts()->count() }})</span></a></li>
              @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->

          </div>
          <!-- END sidebar -->