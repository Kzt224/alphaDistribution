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
          <h3>Edit Category</h3><br>
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
             <form action="/user/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf 
              @method('PUT')
               <div class="mb-3">
                <Label for="name">User Name</Label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{$user->name}}" required>
               </div>
               <div class="mb-3">
                <Label for="email">Email</Label>
                <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{$user->email}}" required>
               </div>
               <div class="mb-3">
                <Label for="pass">Password </Label>
                <input type="password" class="form-control" placeholder="Password" id="pass" name="password" value="{{$user->password}}" required>
               </div>
               <div class="mb-3">
                <Label for="role">Admin</Label><br>
                <input type="checkbox" id="role" name="role"
                     value="{{$user->role}}"
                     {{$user->role == "1" ? "checked" : ''}}
                    style="width: 20px;height: 20px;">
               </div>
                  <br><br>
                 <button class="btn btn-success" type="submit" style="width: 100px">Save</button>
                 <a href="/user" type="button" class="btn btn-primary">Back</a>
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



