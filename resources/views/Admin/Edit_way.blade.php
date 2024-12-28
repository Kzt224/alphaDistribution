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
          <h3>Edit Way</h3><br>
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
             <form action="/way/{{$way->id}}/update" method="POST" enctype="multipart/form-data">
              @csrf 
               <div class="mb-3">
                <Label for="name">Way Date</Label>
                <input type="text" class="form-control"  id="name" name="day" value="{{$way->day}}" required readonly>
               </div>
               <div class="mb-3">
                <Label for="wayname">Way Name</Label><br>
                  <select name="way_id" class="form-Select w-50" id="wayname">
                    @foreach($cities as $city)
                      <option value="{{$city->id}}" {{ $city->id == $way->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                    @endforeach
                  </select>
               </div>
                  <br><br>
                 <button class="btn btn-success" type="submit" style="width: 100px">Save</button>
                 <a href="/way/detail" type="button" class="btn btn-primary">Back</a>
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



