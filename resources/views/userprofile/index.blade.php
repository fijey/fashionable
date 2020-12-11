@extends('layout.dashboard')
@section('title', 'My Profile')
@section('content')
<style>
  .logo-commerce {
    width: 128px;
    height: 50px;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->profile->img_profile }}"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"><i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}</h3>
            <p class="text-center"><i class="fas fa-store ml-1 mr-2"></i>{{ Auth::user()->profile->store->store_name }}
            </p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                @if (Auth::user()->profile->age == Null)
                <b>Umur</b> <a class="float-right">Belum diisi</a>
                @else
                <b>Umur</b> <a class="float-right">{{ Auth::user()->profile->age }}</a>
                @endif
              </li>
              <li class="list-group-item">
                @if (Auth::user()->profile->address == null)
                <b>Alamat</b> <a class="float-right">belum diisi</a>
                @else
                <b>Alamat</b> <a class="float-right">{{ Auth::user()->profile->address }}</a>
                @endif
              </li>
              <li class="list-group-item">
                @if (Auth::user()->profile->handphone == Null)
                <b>Handphone</b> <a class="float-right">belum diisi</a>
                @else
                <b>Handphone</b> <a class="float-right">{{ Auth::user()->profile->handphone }}</a>
                @endif
              </li>
            </ul>

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Toko Saya</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Nama Toko</strong>

            <p class="text-muted">
              {{ Auth::user()->profile->store->store_name }}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Toko</strong>

            <p class="text-muted"> {{ Auth::user()->profile->store->store_address }}</p>

            <hr>

            <strong><i class="fas fa-store-alt mr-1"></i> Alamat Profile E-Commerce</strong><br><br>

            <p class="text-muted">
              <table>
                <tr>
                  @if (Auth::user()->profile->store->store_lazada != null)
                  <a href="{{ Auth::user()->profile->store->store_lazada }}">
                    <img class="logo-commerce img-fluid" src="/img/lazada.png" /> </a>
                  @else
                  <td> <img class="logo-commerce img-fluid" src="/img/lazadanull.png" /></td>
                  @endif
                </tr>
                <tr>
                  @if (Auth::user()->profile->store->store_bukalapak != null)
                  <a href="{{ Auth::user()->profile->store->store_bukalapak }}">
                    <img class="logo-commerce img-fluid" src="/img/bukalapak.png" /> </a>
                  @else
                  <td> <img class="logo-commerce img-fluid" src="/img/bukalapaknull.png" /> </td>
                  @endif
                </tr>
                <tr>
                  @if (Auth::user()->profile->store->store_tokopedia != null)
                  <td> <a class="float-center" href="{{ Auth::user()->profile->store->store_tokopedia }}"><img
                        class="logo-commerce img-fluid" src="/img/tokopedia.png" /> </a> </td>
                  @else
                  <img class="logo-commerce img-fluid" src="/img/tokopedianull.png" />
                  @endif
                </tr>
                <tr>
                  @if (Auth::user()->profile->store->store_tokopedia != null)
                  <td><a class="float-center" href="{{ Auth::user()->profile->store->store_shopee }}"><img
                        class="logo-commerce img-fluid" src="/img/shopee.png" /> </a> </td>
                  @else
                  <img class="logo-commerce img-fluid" src="/img/shopeenull.png" />
                  @endif
                </tr>
              </table>

            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Tentang Toko</strong>
            @if(Auth::user()->profile->store->store_about == Null)
            <p class="text-muted">Belum Diisi</p>
            @else
            <p class="text-muted">{{ Auth::user()->profile->store->store_about }}</p>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              {{-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Store Activity</a></li> --}}
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">My Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#mystore" data-toggle="tab">My Store</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" method="POST" action="/editprofile" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                        id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">age</label>
                    <div class="col-sm-10">
                      <input type="text" name="age" class="form-control" value="{{ Auth::user()->profile->age }}"
                        id="inputEmail" placeholder="Age">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">city</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" value="{{ Auth::user()->profile->city }}"
                        id="inputName2" placeholder="city">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Handphone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="handphone"
                        value="{{ Auth::user()->profile->handphone }}" id="inputName2" placeholder="Handphone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">address</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="address"
                        id="inputExperience">{{ Auth::user()->profile->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Gambar Profile</label>
                    <div class="col-sm-10">
                      <input type="file" name="img_profile" id="inputName2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Edit Profile</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="mystore">
                <form class="form-horizontal" method="POST" action="/editstore" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama Toko</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_name" value="{{ Auth::user()->profile->store->store_name }}"
                        class="form-control" id="inputName" placeholder="Nama Toko">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Alamat Toko</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_address" value="{{ Auth::user()->profile->store->store_address }}"
                        class="form-control" id="inputEmail" placeholder="alamat toko">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">URL Profile Lazada</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_lazada" class="form-control"
                        value="{{ Auth::user()->profile->store->store_lazada }}" id="inputEmail"
                        placeholder="URL Profile Lazada">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">URL Profile Tokopedia</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_tokopedia" class="form-control"
                        value="{{ Auth::user()->profile->store->store_tokopedia }}" id="inputEmail"
                        placeholder="URL Profile Tokopedia">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">URL Profile Shopee</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_shopee" class="form-control"
                        value="{{ Auth::user()->profile->store->store_shopee }}" id="inputEmail"
                        placeholder="URL Profile Shopee">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">URL Profile Bukalapak</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_bukalapak" class="form-control"
                        value="{{ Auth::user()->profile->store->store_bukalapak }}" id="inputEmail"
                        placeholder="URL Profile bukalapak">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Tentang Toko</label>
                    <div class="col-sm-10">
                      <input type="text" name="store_about" class="form-control"
                        value="{{ Auth::user()->profile->store->store_about }}" id="inputEmail"
                        placeholder="Tentang Toko">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Gambar Toko</label>
                    <div class="col-sm-10">
                      <input type="file" name="store_img" id="inputName2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Edit Store</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection