 <!-- Content Wrapper. Contains page content -->
 @extends('layouts.master')
 @section('link')
 <link rel="stylesheet" href="{{('storage/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{('storage/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 @endsection
 @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">কালেকশন</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">কালেকশন</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card ">
            <div class="card-header bg-dark">
              <div class="card-title">কালেকশন <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modal" data-whatever="@mdo">নতুন</button></div>
            </div>
            <div class="card-body">
              <table class="table text-center" id="datatable">
                <thead>
                  <tr>
                    <th>আইডি</th>
                    <th>নাম</th>
                    <th>মোট</th>
                    <th>ঠিকানা</th>
                    <th>এ্যাকশন</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
      </div><!-- /.container-fluid -->
      {{-- modal --}}
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">নতুন কালেকশন</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">দাতা:</label>
                      <select  class="form-control" id="donor" >
                        <option value="">select</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-6"> 
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">স্বস্ত্যয়নী:</label>
                      <input type="text" class="form-control" id="sostoyoni" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">ইষ্টভৃতি:</label>
                      <input type="text" class="form-control" id="istovriti" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">দক্ষিনা:</label>
                      <input type="text" class="form-control" id="dokkhina" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">সংগঠনী:</label>
                      <input type="text" class="form-control" id="songothoni" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">প্রনামী:</label>
                      <input type="text" class="form-control" id="pronami" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">প্রচার ও প্রকাশন:</label>
                      <input type="text" class="form-control" id="advertisement" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">শ্রীমন্দির নির্মান:</label>
                      <input type="text" class="form-control" id="mandir_construction" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">বিবিধ:</label>
                      <input type="text" class="form-control" id="various" placeholder="0.00">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <h5 class="text-center">ঋত্বিকী সিলেক্ট করুন</h5>
                    <table class="table table-sm text-center">
                      <tbody id="render_rittiki">
                       
                      </tbody>
                    </table>
                    <button class="btn btn-primary" onclick="event.preventDefault();newRittiki()"><i class="fa fa-plus"></i></button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="event.preventDefault();formRequest()">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- endmodal --}}
    </section>
  @endsection

  @section('script')
  <script src="{{('storage/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{('storage/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{('storage/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{('storage/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  @include('backend.collection.internal-assets.js.script')

  @endsection