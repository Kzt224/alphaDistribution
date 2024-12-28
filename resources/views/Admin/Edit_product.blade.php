@extends("Admin.Templete.layout")

@section("content")

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        </div>
          <h3>Edit Prouct</h3><br>
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
             <form action="/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
              @csrf 
              @method('PUT')
               <div class="mb-3">
                <Label for="name">Product Name</Label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{$product->name}}">
               </div>
               <div class="mb-3">
                <Label for="description">Description </Label>
                <input type="text" class="form-control" placeholder="Description" id="description" name="description" value="{{$product->description}}">
               </div>
               <div class="mb-3">
                <Label for="category">Category Name</Label><br>
                  <select name="category" class="form-Select w-50" id="category">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
               </div>
               <div class="mb-3">
                <Label for="Qty">Qty </Label>
                <input type="number" class="form-control" id="Qty" name="qty" value="{{$product->qty}}">
               </div>
               <div class="mb-3">
                <Label for="Price">Price </Label>
                <input type="number" class="form-control" id="Price" name="price" value="{{$product->price}}" >
               </div>
               <div class="mb-3">
                <Label for="">Current Image </Label><br>
                <img src="{{url('/images/'.$product->image_name)}}" alt="image" width="150px">
               </div>
               <div class="Image">
                <Label for="Image">Image </Label>
                <input type="file" id="Image" name="product_image">
                </div><br><br>
                 <button class="btn btn-success" type="submit" style="width: 100px">Save</button>
                 <a href="/" type="button" class="btn btn-primary">Back</a>
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



