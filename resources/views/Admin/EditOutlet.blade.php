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
          <h3>Edit Outlet</h3><br>
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
             <form action="/outlet/{{$outlet->id}}" method="POST" enctype="multipart/form-data">
              @csrf 
              @method('PUT')
               <div class="mb-3">
                <Label for="name">Outlet Name</Label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{$outlet->name}}" required>
               </div>
               <div class="mb-3">
                <Label for="wayname">Adderess </Label><br>
                  <select name="city_id" class="form-Select w-50" id="wayname">
                    @foreach($cities as $city)
                      <option value="{{$city->id}}" {{ $city->id == $outlet->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                    @endforeach
                  </select>
               </div>
               <div class="mb-3">
                <Label for="ph">Phone_Number</Label>
                <input type="number" class="form-control" placeholder="ph no" id="ph" name="ph_number" value="{{$outlet->Phone_Number}}" required>
               </div>
                  <br><br>
                 <button class="btn btn-success" type="submit" style="width: 100px">Save</button>
                 <a href="/outlet" type="button" class="btn btn-primary">Back</a>
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



