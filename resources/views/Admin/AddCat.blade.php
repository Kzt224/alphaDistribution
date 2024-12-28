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
          <h3>Add New Category</h3><br>
           <div><br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
             <div class="form-group" style="width: 600px">
             <form action="/category" method="post" enctype="multipart/form-data">
              @csrf 
               <div class="mb-3">
                <Label for="name">Cateory Name</Label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{old('name')}}" required>
               </div>
                  <br><br>
                 <button class="btn btn-success" type="submit" style="width: 100px">Add</button>
                 <a href="/category" type="button" class="btn btn-primary">Back</a>
              </form>
             </div>
           </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endSection



