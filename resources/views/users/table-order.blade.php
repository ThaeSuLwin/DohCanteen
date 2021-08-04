

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
   <label for="">Tabletype</label>
  <input type="text" class="form-control" value="{{$tabletype->name}}" readonly>
   <input type="hidden" name="table_type_id" value="{{$tabletype->id}}">
   </div>
    <div class="form_group">
                <label for="">Table Number</label>
                <select name="option_id" id="" class="form_group">
                    <option value="">Select </option>
                    @foreach($tableTypeOptions as $tableTypeOption)
                    <option value="{{$tableTypeOption->id}}">{{$tableTypeOption->Option->name}}</option>
                    @endforeach
                </select>
                <!-- @foreach($tabletypeoptions as $tabletypeoption)
                <label for="">{{$tabletypeoption->Option->name}}</label>
            <input type="radio" name="option_id" value="{{$tabletypeoption->id}}">
            @endforeach
            </div> -->
            <!-- <div class="form_group">
                <label for="">Drink</label>
                <select name="drink_id" id="" class="form_group">
                    <option value="">Select </option>
                    @foreach($tabletypedrinks as $tabletypedrink)
                    <option value="{{$tabletypedrink->id}}">{{$tabletypedrink->Drink->name}}</option>
                    @endforeach
                </select>
                
            </div> -->

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
