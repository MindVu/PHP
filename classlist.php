<?php
session_start();
require 'includes/db_connection.php';
if(isset($_POST['class_search']))
{
  $valuetosearch=$_POST['valuetosearch'];
  $sql="SELECT * FROM class WHERE id_teacher = " . $_SESSION['userid'] . " AND CONCAT(id, name) LIKE '%".$valuetosearch."%'";
  $result = mysqli_query($conn, $sql);
}else
{
  $sql="SELECT * FROM class WHERE id_teacher = " . $_SESSION['userid'] ."";
  $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Danh sách lớp</title>

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
  <link rel="stylesheet" href="css/style.css">
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
body{
  background: rgb(239,250,253);
background: linear-gradient(90deg, rgba(239,250,253,1) 100%, rgba(74,139,223,1) 100%);
}
  </style>
</head>

<body>
  <!-- Start your project here-->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(74,139,223);
background: radial-gradient(circle, rgba(74,139,223,1) 0%, rgba(22,41,66,1) 0%);">
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
          <a class="nav-link left-link" aria-current="page" href="mainpage.php">
            <div>
              <i class="fas fa-home fa-lg mb-1"></i>
            </div>
            Home
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1 dropdown">
          <a class="nav-link left-link dropdown-toggle" aria-current="page" id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false">
            <div>
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            Class
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="classlist.php">Danh sách lớp</a>
            </li>
            <li>
              <a class="dropdown-item" href="request.php">Danh sách lớp yêu cầu</a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link left-link" aria-current="page" href="studentlist.php">
            <div>
              <i class="fas fa-user-graduate"></i>
            </div>
            Students
          </a>
        </li>
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
<div style="text-align: center; color:#162942"><h2 >Danh sách lớp của bạn</h2></div>
<hr>
<div style="text-align: center; font-weight: bold;">
<form action="classlist.php" method="post">
  <div class="input-group">
  <input type="search" name="valuetosearch" placeholder="Tìm lớp theo ID hoặc môn học" class="form-control w-25" aria-label="Search" aria-describedby="search-addon" style="text-align: center; margin-left: 460px; border-color: #FAFAFA; border: solid;">
  <button type="submit" name="class_search" class="btn btn-outline-primary" style="background: rgb(60,132,171);
background: linear-gradient(45deg, rgba(60,132,171,1) 100%, rgba(255,120,164,0) 100%); color: #FAFAFA; border: none; text-align: left; margin-right: 460px;">
<i class="fas fa-search"></i>
</button>
</div>
</form>
<p>
  <?php
  $query="SELECT COUNT(*) AS count FROM class WHERE id_teacher = '" . $_SESSION['userid'] ."'";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($res);
  echo "Số lớp hiện có: ".$row["count"]."";
  mysqli_free_result($res);
  ?>
</p>
<a class="btn btn-primary btn-lg btn-floating" type="button" href="addclass.php" title="Tạo lớp mới"><i class="fas fa-plus"></i></a>
</div>
<br>

<table class="table table-hover td">
  <thead>
    <tr style="background: rgb(133,205,253);
background: linear-gradient(45deg, rgba(133,205,253,1) 100%, rgba(255,120,164,0) 100%);">
      <th scope="col">Mã lớp</th>
      <th scope="col">Môn học</th>
      <th scope="col">Thứ</th>
      <th scope="col">Tín chỉ</th>
      <th scope="col">Bắt đầu</th>
      <th scope="col">Kết thúc</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($result))
{
  echo "<tr >
  <th scope='row'>" . $row["id"] . "</th>
  <td>" . $row["name"] . "</td>
  <td>" . $row["day"] . "</td>
  <td>" . $row["credit"] . "</td>
  <td>" . $row["start_time"] . "</td>
  <td>" . $row["end_time"] . "</td>
  <td>
  <a href='viewclass.php?id=" . $row['id']
  . "'title='Danh sách lớp'>
  <span class='fas fa-eye'>&nbsp;&nbsp</span></a>
  <a href='updateclass.php?id=" . $row['id']
  . "'title='Chỉnh sửa'>
  <span class='fas fa-edit'>&nbsp;&nbsp</span></a>
  <a href='transferclass.php?id=" . $row['id']
  . "'title='Chuyển lớp'>
  <span class='fas fa-exchange-alt'>&nbsp;&nbsp</span></a>
  <a href='deleteclass.php?id=" . $row['id']
  . "'title='Xóa lớp'>
  <span class='fas fa-trash'></span></a>
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