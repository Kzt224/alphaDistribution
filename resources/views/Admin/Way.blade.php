@extends("./Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div style="height: 60px" class="py-2">
           @if(Session::has('message'))
             <div class="alert mt-2">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  {{ Session::get('message') }}
              </div>
          @endif
          </div><br>
          <h3>Way Table</h3><br>
          
          <a href="/way/detail" class="btn btn-success">View all ways in a week</a>
           <div><br>
           <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
       <p>Today is <span style="font-weight:bold;color: green">{{$way->day}} day and {{$way->city->name}} way.</span></p>
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


