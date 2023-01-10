@extends('frontend.layouts.app')


@section('content')

<div class="main-content">
  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide main-slider" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/sliders/slider1.png') }}" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h3>Kitob almashish platformangizga xush kelibsiz</h3>
          <p>
            <a href="{{route('register')}}" class="btn btn-primary slider-link">
              Hozir boshlang
            </a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/sliders/slider2.png') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Kitob almashish platformangizga xush kelibsiz</h3>
          <p>
            <a href="" class="btn btn-primary slider-link">
              Yangi hisob
            </a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/sliders/slider3.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Kitob almashish platformangizga xush kelibsiz</h3>
          <p>
            <a href="" class="btn btn-primary slider-link">
              Hozir qarz oling
            </a>
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Oldingi</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Keyingi</span>
    </a>
  </div>
  <!-- Carousel -->


  <div class="top-body pt-4 pb-4">
    <div class="container">
      
      @if(Session::has('status'))
        <div class="alert alert-success">
            <p>
                {{ Session::get('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </p>

        </div>
    @endif

      <div class="row">

        <div class="col-md-3">
          <div class="card card-body single-top-link" onclick="location.href='{{ route('login') }}'">
            <h4>Tizimga kirish</h4>
            <i class="fa fa-sign-in-alt"></i>
            <p>
              Kitoblaringizni almashishni boshlash uchun tizimga kiring
            </p>
          </div> <!-- Single Item -->
        </div> <!-- Single Col -->

        <div class="col-md-3">
          <div class="card card-body single-top-link"  onclick="location.href='{{ route('register') }}'">
            <h4>Yangi yaratish</h4>
            <i class="fa fa-user"></i>
            <p>
              Yangi hisob yaratish
            </p>
          </div> <!-- Single Item -->
        </div> <!-- Single Col -->

        <div class="col-md-3">
          <div class="card card-body single-top-link">
            <h4>Kitob qarz</h4>
            <i class="fa fa-cart-plus"></i>
            <p>
              Kerakli kitoblaringizni qarzga oling
            </p>
          </div> <!-- Single Item -->
        </div> <!-- Single Col -->


      </div>
    </div>
  </div> <!-- End Top Body Links -->

  <div class="advance-search">
    <div class="container">
      <h3>Kengaytirilgan qidiruv</h3>
      <form action="{{ route('books.search.advance') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Kitob nomi/tavsif</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kitob nomi/tavsif" name="t">
              </div>
          </div>
          {{-- <div class="col-md-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Author</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Book Author">
              </div>
          </div> --}}
          <div class="col-md-3d">
            <div class="form-group">
                <label for="exampleInputEmail1">Nashr</label>
                <select class="form-control" name="p"> 
                  <option value="">Nashriyotchini tanlang</option>
                  @foreach ($publishers as $pub)
                    <option value="{{ $pub->id }}">{{ $pub->name }}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Nashriyotchini tanlangy</label>
                <select class="form-control" name="c"> 
                  <option value="">Kategoriyani tanlang</option>
                  @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="col-md-2 mt-4">
                <p class="mt-2">
                  <button type="submit" class="btn btn-success btn-lg" name="">
                  <i class="fa fa-search"></i> Qidirmoq
               </button>
                </p>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="book-list-sidebar">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          <h3>Oxirgi yuklangan kitoblar</h3>

          @include('frontend.pages.books.partials.list')

          <div class="books-pagination mt-5">
            {{ $books->links() }}
          </div>

        </div> <!-- Book List -->

        <div class="col-md-3">
          <div class="widget">
            <h5 class="mb-2 border-bottom pb-3">
              Kategoriyalar
            </h5>

            @include('frontend.pages.books.partials.category-sidebar')

          </div> <!-- Single Widget -->

        </div> <!-- Sidebar -->

      </div>
    </div>
  </div>
</div>

@endsection