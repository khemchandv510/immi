<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

<?php 
include("file-link.php")
?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php 
    
    include("sidebar.php")
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
      <?php 
      
      include("navigation.php")
      ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="container my-5">
        <form action="company_info.php ">
          <div class="row">
                
            <div class="col-md-6"></div>
            <div class="col-md-4"><input type="search" class="form-control" placeholder="search"></div>
            <div class="col-md-2"><input type="submit" class="btn-danger btn" placeholder="search"></div>
           

        </div>
    </form>
    <div class="container my-3">
    <div class="row">
           <table class="table table-hover table-responsive-md table-responsive-lg table-responsive-sm table-responsive-xs">
              <thead class="k0listenqury">
              <tr>
                  <th>Name</th>
                  <th>D.O.B </th>
                  <th>Email Id </th>
                  <th>Contact no :</th>
                   <th>View</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <td>Kaushik</td>
                      <td>23/05/2019</td>
                      <td>klifftechnologies.net@gmail.com</td>
                      <td>8965745896</td>
                      <td><a href="Enquiry-Form.php"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                    </tr>
                  </tbody>
              </table>
              </div>
            </div>
    </div>
        <!-- /.container-fluid -->
       
      </div>
      <!-- End of Main Content -->

     <?php 
        include("footer.php")
     ?>
</body>

</html>
