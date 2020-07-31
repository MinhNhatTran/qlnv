<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
   $empName = ($employeen['firstName']);
   $pic = $employeen['pic'];

	$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

	//echo "$sql";
	$result = mysqli_query($conn, $sql);
	$result1 = mysqli_query($conn, $sql1);
	$result2 = mysqli_query($conn, $sql2);
	$result3 = mysqli_query($conn, $sql3);
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
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">

</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="eloginwel.php?id=<?php echo $id?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quản trị</div>
      </a>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>
      <li class="nav-item active">
        <a class="nav-link" href="eloginwel.php?id=<?php echo $id?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myprofile.php?id=<?php echo $id?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thông tin cá nhân</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="empproject.php?id=<?php echo $id?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dự án</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="applyleave.php?id=<?php echo $id?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Xin nghỉ</span></a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$empName"; ?></span>
                <img class="img-profile rounded-circle" src="process/<?php echo $pic;?>"">
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
			<div>
				<h2>Welcome <?php echo "$empName"; ?> </h2>
				<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>
				<table>
					<tr bgcolor="#000">
						<th align = "center">STT</th>
						<th align = "center">Mã nhân viên</th>
						<th align = "center">Tên</th>
						<th align = "center">Điểm</th>
					</tr>
					<?php
						$seq = 1;
						while ($employee = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>".$seq."</td>";
							echo "<td>".$employee['id']."</td>";					
							echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";					
							echo "<td>".$employee['points']."</td>";
							$seq+=1;
						}
					?>
				</table>
				<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Projects</h2>
				<table>
					<tr>
						<th align = "center">Tên dự án</th>
						<th align = "center">Hạn nộp</th>
					</tr>
					<?php
						while ($employee1 = mysqli_fetch_assoc($result1)) {
							echo "<tr>";					
							echo "<td>".$employee1['pname']."</td>";					
							echo "<td>".$employee1['duedate']."</td>";
						}
					?>
				</table>
				<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Trạng thái lương</h2>
				<table>
					<tr>	
						<th align = "center">Lương cơ bản</th>
						<th align = "center">Thưởng</th>
						<th align = "center">Lương tổng</th>	
					</tr>
					<?php
						while ($employee = mysqli_fetch_assoc($result3)) {
							echo "<tr>";										
							echo "<td>".$employee['base']."</td>";
							echo "<td>".$employee['bonus']." %</td>";
							echo "<td>".$employee['total']."</td>";					
						}
					?>
				</table>
				<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Trạng thái xin nghỉ</h2>
				<table>
					<tr>				
						<th align = "center">Ngày bắt đầu</th>
						<th align = "center">Ngày kết thúc</th>
						<th align = "center">Tổng số ngày</th>
						<th align = "center">Lý do</th>
						<th align = "center">Trạng thái</th>
					</tr>
					<?php
						while ($employee = mysqli_fetch_assoc($result2)) {
							$date1 = new DateTime($employee['start']);
							$date2 = new DateTime($employee['end']);
							$interval = $date1->diff($date2);
							$interval = $date1->diff($date2);
							echo "<tr>";
							echo "<td>".$employee['start']."</td>";
							echo "<td>".$employee['end']."</td>";
							echo "<td>".$interval->days."</td>";
							echo "<td>".$employee['reason']."</td>";
							echo "<td>".$employee['status']."</td>";
						}
					?>
				</table>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>
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
          <a class="btn btn-primary" href="elogin.php">Logout</a>
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
