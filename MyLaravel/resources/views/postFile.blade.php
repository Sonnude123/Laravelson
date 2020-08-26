<form action="{{route('postfile')}}" method="post" enctype="multipart/form-data">
@csrf

<input type="file" name="myFile"id="myFile">
<input type="submit">

</form>