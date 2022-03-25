<?php


$insert=false;

$servername="localhost";
$username="root";
$password="";
$database="crud";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failes to connect: ". mysqli_connect_error());
}

exit();
if($_SERVER['REQUEST_METHOD']== 'POST'){
if(isset($_POST['snoEdit'])){
  $title=$_POST["titleedit"];
  $note=$_POST["noteedit"];
  $sql="UPDATE `notes` SET `notes` = ' $title' AND  `notes`= '$note'WHERE `notes`.`sno` = '$sno'; ";
    $result=mysqli_query($conn,$sql);
}
else{
    

    $sql="INSERT INTO `notes` ( `title`, `notes`) VALUES ( '$title', '$note')";
    $result=mysqli_query($conn,$sql);

    if($result){
        $insert=true;
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Your Note is not added for some technical issue.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
            $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>

    <title>Hello, world!</title>
  </head>
  <body>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit Modal
</button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="crudapp.php" method="POST">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="mb-3">
            <label for="title"  class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Title" id="titleedit" name="title" aria-describedby="emailHelp">
          </div>
          <div class="form-floating">
          <textarea class="form-control" placeholder="Enter Your Notes" id="noteedit" name="noteedit" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Enter Your Notes</label>
        </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Crud App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>






<!-- Form -->
<?php
if($insert){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You note has been inserted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<div class="container mt-4">
    <h2>Enter Your Notes Here</h2>
<form action="crudapp.php" method="POST">
  <div class="mb-3">
    <label for="title"  class="form-label">Title</label>
    <input type="text" class="form-control" placeholder="Title" id="title" name="title" aria-describedby="emailHelp">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Enter Your Notes" id="note" name="note" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Enter Your Notes</label>
</div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>


<div class="container mt-5 my-4">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Notes</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
 


  <tbody>
  <?php
     $sql="SELECT * FROM `notes` ";
     $result=mysqli_query($conn,$sql);
     $num=mysqli_num_rows($result);
     if($num>0){
         $no=1;
        while($row=mysqli_fetch_assoc($result)){
            echo"<tr>
            <th scope='row'>" .$no."</th>
            <td>".$row['title']."</td>
            <td>".$row['notes']."</td>
            <td><button type='button' class='btn btn-primary mx-4 edit' id=".$row['sno'].">Edit</button>
            <button type='button' class='btn btn-primary'>Delete</button></td>
          </tr>";
          $no++;
        }
     }
    ?>
  </tbody>
</table>
</div>



<script>
  edits=document.getElementsByClassName('edit');
  Array.from(edits).forEach((element)=>{
    element.addEventListener("click",(e)=>{
      console.log("edit", e.target.parentNode.parentNode);
      tr=e.target.parentNode.parentNode;
      title=tr.getElementsByTagName("td")[0].innerText;
      note=tr.getElementsByTagName("td")[1].innerText;
      console.log(title,note);
      titleedit.value=title;
      noteedit.value=note;
      snoEdit.value=e.target.id;
      console.log(e.target.id)
      $('#editModal').modal('toggle');
    })
  })
</script>














    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>