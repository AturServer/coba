<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1> Halaman {{ $title }}</h1>
        <!-- Button trigger modal -->
<button type="button rounded-0" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Add Data
</button>
{{-- menampilkan error validasi --}}
  @if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
       @endforeach
     </ul>
     </div>
   @endif
@if (session('status'))
<p class="fs-1 text-success">{{ session('status') }}</p>    
@endif
<form method="post" action="/post/action">
     {{ csrf_field() }}
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <label>Title</label>
          <input class="form-control" name="title">
          <label>Description</label>
       <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
    </div>
    <div class="container">
        Page: {{ Request::segment(1) }} >
        {{ Request::segment(2) }}
    <div class="col-12" style="overflow-x:auto;">
       <table class=" table table-sm table-info" style="width:100%">
           <thead>
               <tr>
                   <th>No</th>
                   <th>Title</th>
                   <th>Arcticle</th>
                   <th></th>
               </tr>
           </thead>
           <tbody>
        <?php 
        //var_dump($listUser);exit;
        $no=1;
        foreach ($listUser as $row) {?>
         
           <tr>
                   <td style="font-size:small;">{{ $no }}.{{ $row->created_at }}.{{ $row->updated_at }}</td>
                   <td>{{ $row->title }}</td>
                   <td style="text-align:justify;max-width:300px;" >
                    <div class="text-wrap col-12">{{ $row->description }}
                    </div>
                  </td>
                  <td>
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#id{{ $row->id }}">
 Edit
</button>


<form method="post" action="/post/action">
     {{ csrf_field() }}
<!-- Modal -->
<div class="modal fade bg-dark" id="id{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <input class="form-control" name="id" value="{{ $row->id}}" type="hidden" hidden>

          <label>Title</label>
          <input class="form-control" name="title" value="{{ $row->title }}">
          <label>Description</label>
       <textarea class="form-control" name="description" row="20">{{ $row->description }}</textarea>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
                      
                  </td>
               </tr>
        <?
        $no++;
        }
        ?>   
            
     
           </tbody>
           <tfoot>
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
           </tfoot>
       </table>
    </div>    
        
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>