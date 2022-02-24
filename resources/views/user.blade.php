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
        <h1> Halaman User {{ $title }}</h1>
    </div>
    <div class="container">
       <table class=" table table-sm table-info">
           <thead>
               <tr>
                   <th>No</th>
                   <th></th>
                   <th></th>
               </tr>
           </thead>
           <tbody>
        <?php 
        //var_dump($listUser);exit;
        $no=1;
        foreach ($listUser as $row) {?>
         
           <tr>
                   <td>{{ $no }}</td>
                   <td>{{ $row->name }}</td>
                   <td></td>
               </tr>
        <?
        $no++;
        }
        ?>   
            
        <tr>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
           </tbody>
           <tfoot>
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
           </tfoot>
       </table>
        Page: {{ Request::segment(1) }} >
        {{ Request::segment(2) }}
        
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>