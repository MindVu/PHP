<?php
session_start();
if(isset($_GET['id']) && !empty(trim($_GET['id'])))
{
  require_once 'includes/db_connection.php';
  $ClassID=trim($_GET['id']);
  $_SESSION['classid']=trim($_GET['id']);
  $sql="SELECT * FROM student s
  JOIN student_class sc ON sc.id_student=s.id
  WHERE sc.id_class = " . $ClassID .";";
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
}else
{
  echo "<h1>Something wrong bro...</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <style>
    .left-link{
      color:#d3d3d3;
      transition: opacity 0.15s;
    }
    .left-link:hover{
      color:#e0396f;
      opacity: 0.8;
    }
    .left-link:active{
      color:#ff78a4;
      opacity: 0.5;
    }
    .td {
  text-align: center;
}
  </style>
</head>

<body>
  <!-- Start your project here-->
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(29,38,113);
background: linear-gradient(45deg, rgba(29,38,113,1) 0%, rgba(195,55,100,1) 100%);">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler left-link"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <!-- Left links -->
      <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
      <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="classlist.php">
            <div>
              <i class="fas fa-arrow-left"></i>
            </div>
          </a>
        </li>
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <div style="color:white;"><?php echo "Hi, ".$_SESSION['username']."&nbsp;&nbsp;&nbsp;"; ?></div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
            class="rounded-circle"
            height="40"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
        <li>
            <a class="dropdown-item" href="changename.php">Đổi tên</a>
          </li>
          <li>
            <a class="dropdown-item" href="changepwd.php">Đổi mật khẩu</a>
          </li>
          <li>
            <a class="dropdown-item" href="includes/logout.php">Đăng xuất</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<br>
<table class="table table-hover td">
  <thead>
    <tr style="background: rgb(29,38,113);
background: linear-gradient(45deg, rgba(29,38,113,0.3491771708683473) 0%, rgba(255,120,164,0.32396708683473385) 100%);">
      <th scope="col">Mã sinh viên</th>
      <th scope="col">Tên</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">SĐT</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($result))
{
  echo "<tr>
  <th scope='row'>" . $row["id"] . "</th>
  <td>" . $row["name"] . "</td>
  <td>" . $row["gender"] . "</td>
  <td>" . $row["dob"] . "</td>
  <td>" . $row["phone"] . "</td>
  <td>
  <a href='mark.php?Stuid=" . $row['id']
  . "&Classid=".$ClassID."'title='Chấm điểm'>
  <span class='fas fa-highlighter' style='color: green'></span>&nbsp;&nbsp</a>
  <a href='kick.php?id=" . $row['id']
  . "'title='Xóa khỏi lớp'>
  <span class='fas fa-user-slash' style='color: red'></span></a>
  </tr>";
}
mysqli_free_result($result);
?>
</tbody>
</table>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>
