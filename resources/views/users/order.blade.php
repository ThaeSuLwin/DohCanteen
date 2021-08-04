

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous ">
    <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <div class="card-body">
    <form action="{{url('Admin/order')}}" method="POST">
    @csrf
 
   
   <div class="form-group">
   <label for="">Menu</label>
  <input type="text" class="form-control" value="{{$subcategory->name}}" readonly>
   <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
   </div>
    <!-- <div class="form_group">
                <label for="">Option</label>
                <select name="option_id" id="" class="form_group">
                    <option value="">Select </option>
                    @foreach($subcategoryoptions as $subcategoryoption)
                    <option value="{{$subcategoryoption->id}}">{{$subcategoryoption->Option->name}}</option>
                    @endforeach
                </select> -->
                <div class="form_group">
                <label for="">Option</label>
                </br>
                @foreach($subcategoryoptions as $subcategoryoption)
                <label for="">{{$subcategoryoption->Option->name}}</label>
            <input  type="checkbox" name="option_id[]" value="{{$subcategoryoption->id}}">
            @endforeach
            </div>



            <div class="form_group">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label  for="">Addition</label>
              
                <select name="addition_id" id="" class="custom-select">
                    <option value="">Select </option>
                 
                    @foreach($subcategoryadditions as $subcategoryaddition)
                    <option value="{{$subcategoryaddition->id}}">{{$subcategoryaddition->Addition->name}}</option>
                    @endforeach
                </select>
            </div>
</div>

           <div class="form_group">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label  for="">Table Number</label>
                <select name="table_id" id="" class="custom-select">
                    <option value="">Select</option>
                 @foreach($tables as $table)
                 <option value="{{$table->id}}">{{$table->name}}:{{$table->Tabletype->name}}</option>
                 @endforeach
                </select>
            </div>
            <input type="hidden" name="canteeninfo_id" value="{{$table->canteeninfo_id}}">
</div>





<div class="form-group  col-md-12">
<button type= submit class="btn btn-success"> Submit</button>
</div>
</form>
</div>
</div>
</div>

<script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymouss"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
