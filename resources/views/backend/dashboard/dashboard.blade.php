 <!-- Content Wrapper. Contains page content -->
 @php
 use Rakibhstu\Banglanumber\NumberToBangla;
$bangla=new NumberToBangla;
 @endphp
 @extends('layouts.master')
 @section('content')
 
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ড্যাশবোর্ড</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">ড্যাশবোর্ড</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('istovriti'),2,'.',''))}}</h3>
                  <p><strong>ইষ্টভৃতি</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('sostoyoni'),2,'.',''))}}</h3>
  
                  <p><strong>স্বস্ত্যয়নী</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('dokkhina'),2,'.',''))}}</h3>
  
                  <p><strong>দক্ষিনা</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('songothoni'),2,'.',''))}}</h3>
  
                  <p><strong>সংগঠনী</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('pronami'),2,'.',''))}}</h3>
  
                  <p><strong> প্রনামী</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('advertise'),2,'.',''))}}</h3>
  
                  <p><strong>বিজ্ঞাপন</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('mandir_construction'),2,'.',''))}}</h3>
                  <p><strong>মন্দির তৈরী</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-muted">
                <div class="inner">
                  <h3>{{$bangla->bnNum(number_format($data->sum('various'),2,'.',''))}}</h3>
  
                  <p><strong>বিবিধ</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-money-bill-wave"></i>
                </div>
                <a href="{{URL::to('/collection')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ./col -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
  @endsection