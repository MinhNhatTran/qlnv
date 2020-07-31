<?php
require_once ('process/dbh.php');
$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Bảng điều khiển - Quản trị</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styleemplogin.css">

</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="aloginwel.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quản trị</div>
      </a>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>
      <li class="nav-item">
        <a class="nav-link" href="aloginwel.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addemp.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thêm nhân viên</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewemp.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Danh sách nhân viên</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="assign.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Giao việc</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="assignproject.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Tình trạng dự án</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="salaryemp.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Bảng lương</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="empleave.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Nhân viên nghỉ</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thống kê</span></a>
      </li>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Trần Minh Nhật</span>
                <img class="img-profile rounded-circle" src="https://i.pinimg.com/736x/9f/14/e7/9f14e7adc6906e63d3168ccdf4fe399b.jpg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
         <!-- Begin Page Content -->
        <div class="container-fluid">
			<table>
				<tr>
					<th align = "center">Mã nhân viên</th>
					<th align = "center">Ảnh đại diện</th>
					<th align = "center">Tên</th>
					<th align = "center">Email</th>
					<th align = "center">Ngày sinh</th>
					<th align = "center">Giới tính</th>
					<th align = "center">Liên hệ</th>
					<th align = "center">NID</th>
					<th align = "center">Địa chỉ</th>
					<th align = "center">Phòng ban</th>
					<th align = "center">Trình dộ</th>
					<th align = "center">Điểm</th>
					<th align = "center">Options</th>
				</tr>
				<?php
					while ($employee = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>".$employee['id']."</td>";
						echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
						echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
						
						echo "<td>".$employee['email']."</td>";
						echo "<td>".$employee['birthday']."</td>";
						echo "<td>".$employee['gender']."</td>";
						echo "<td>".$employee['contact']."</td>";
						echo "<td>".$employee['nid']."</td>";
						echo "<td>".$employee['address']."</td>";
						echo "<td>".$employee['dept']."</td>";
						echo "<td>".$employee['degree']."</td>";
						echo "<td>".$employee['points']."</td>";

						echo "<td><a href=\"edit.php?id=$employee[id]\">Chỉnh sửa</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Xóa</a></td>";
					}
				?>
			</table>
        </div>
		<!-- End page content -->
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn đăng xuất?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn "Logout" để hết thúc phiên làm việc</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
