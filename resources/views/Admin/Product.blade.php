@extends("./Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
         </div>
          <div style="height: 60px">
           @if(Session::has('message'))
             <div class="alert mt-2">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                  {{ Session::get('message') }}
              </div>
          @endif
          </div>
          <h3>Product Table</h3><br>
            <a href="/create" type="button" class="btn btn-success">Add New Product</a>
           <div><br>
           <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-hover" id="datatables">
       <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $key =>  $product)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->qty}}</td>
                <td>
                   <div class="form-row">
                      <a href="/product/{{$product->id}}/edit" class="btn btn-warning" type="button" style="height: 40px;margin-right: 10px" >Edit</a>
                        <form action="/product/{{$product->id}}" method="POST">
                         @csrf 
                         @method('DELETE')
                         <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                   </div>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
       <div class="btn-group">
          <a href="/data" class="btn btn-secondary">Back</a>
        </div>
  <!-- /.card -->
           </div>
        <!-- /.row -->
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
