@extends("./Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div style="height: 60px" class="mt-2">
           @if(Session::has('message'))
             <div class="alert mt-2">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  {{ Session::get('message') }}
              </div>
          @endif
          </div><br>
          <h3>All ways on a week</h3><br>
          <a href="/way" class="btn btn-primary">Back</a>
           <div><br>
           <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-bordered" id="datatable">
            </table>
            <table class="table table-bordered table-hover" id="datatables">
         <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Date</th>
                  <th scope="col">Way</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ways as $key => $way)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td scope="row">{{$way->day}}</td>
                  <td scope="row">{{$way->city->name}}</td>
                  <td>
                     <div class="form-row">
                        <a href="/way/{{$way->id}}" class="btn btn-warning" type="button" style="height: 40px;margin-right: 10px" >Edit</a>
                     </div>
                   </td>
                 </tr>
                 @endforeach
              </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
           </div>
          <!-- row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <br><br><br><br>

  <!-- /.content-wrapper -->

@endSection
<script src="../dist/js/pages/dashboard2.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>

<script>
  $(function () {
    $('#datatables').DataTable({
      "pageLength": 3,
      "responsive": true,
    });
  });
</script>


