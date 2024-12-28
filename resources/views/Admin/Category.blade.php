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
          <h3>Category Table</h3><br>
            <a href="/category/create" type="button" class="btn btn-success">Add New Category</a>
           <div><br>
           <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-hover" id="datatables">
          <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
              </tr>
          </thead>
           <tbody>
               @foreach($categories as $key =>  $category)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$category->name}}</td>
                <td>{{date_format($category->created_at,'Y/m/d H:i:s')}}</td>
                <td>
                   <div class="form-row">
                      <a href="/category/{{$category->id}}/edit" class="btn btn-warning" type="button" style="height: 40px;margin-right: 10px" >Edit</a>
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


