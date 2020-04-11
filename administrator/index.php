<!DOCTYPE html>
<?php session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']) AND empty($_SESSION['level'])=='admin' AND empty($_SESSION['level'])=='operator' ){
include "form_login.php";
}
else {
?>
<html lang="en">
  <head>
    <meta name="description" content="Sistem Rekrutmen">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Sistem Rekrutmen">
    <title>Backend - Administrator</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
    <style>
    .ui-datepicker-calendar {
        display: none;
        }
    </style>

  </head>
  <body class="app sidebar-mini rtl">
     <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">Job Vacancy</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu -->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="?page=profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
  <?php if (($_SESSION['level'])=='admin'){ ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/user.png" width="25%" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?=$_SESSION['nama']?></p>
          <p class="app-sidebar__user-designation"><?=$_SESSION['level']?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-industry"></i><span class="app-menu__label">Perusahaan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?page=input-perusahaan"><i class="icon fa fa-circle-o"></i> Tambah Perusahaan</a></li>
            <li><a class="treeview-item" href="?page=list-perusahaan"><i class="icon fa fa-circle-o"></i> Data Perusahaan</a></li>
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Lowongan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?page=input-lowongan"><i class="icon fa fa-circle-o"></i> Tambah Lowongan</a></li>
            <li><a class="treeview-item" href="?page=list-lowongan"><i class="icon fa fa-circle-o"></i> Data Lowongan</a></li>
          </ul>
        </li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Pelamar</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?page=list-pelamar"><i class="icon fa fa-circle-o"></i> Data Pelamar</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Kandidat</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?page=list-kandidat"><i class="icon fa fa-circle-o"></i> Data Kandidat</a></li>
             <li><a class="treeview-item" href="?page=list-kandidat-lolos"><i class="icon fa fa-circle-o"></i> Kandidat Yang Lolos</a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="?page=laporan"><i class="icon fa fa-circle-o"></i> Lap. Pelamar</a></li>
            </ul>
        </li>
      </ul>
    </aside> <?php } ?>

    <main class="app-content">
      <div id="isi">
   <?php
if(!isset($_GET['page']))
{
include "home.php";
}
else if($_GET['page'] == 'input-perusahaan')
{
include "form_perusahaan.php";
}
else if($_GET['page'] == 'input-lowongan')
{
include "form_lowongan.php";
}
else if($_GET['page'] == 'list-perusahaan')
{
include "perusahaan.php";
}
else if($_GET['page'] == 'list-lowongan')
{
include "lowongan.php";
}
else if($_GET['page'] == 'detail-lowongan')
{
include "detail_lowongan.php";
}
else if($_GET['page'] == 'edit-lowongan')
{
include "form_edit_lowongan.php";
}
else if($_GET['page'] == 'detail-perusahaan')
{
include "detail_perusahaan.php";
}
else if($_GET['page'] == 'edit-perusahaan')
{
include "form_edit_perusahaan.php";
}
else if($_GET['page'] == 'detail-kandidat')
{
include "detail_kandidat.php";
}
else if($_GET['page'] == 'list-pelamar')
{
include "pelamar.php";
}
else if($_GET['page'] == 'detail-pelamar')
{
include "detail_pelamar.php";
}
else if($_GET['page'] == 'edit-pelamar')
{
include "form_edit_pelamar.php";
}
else if($_GET['page'] == 'list-kandidat')
{
include "kandidat.php";
}
else if($_GET['page'] == 'list-kandidat-lolos')
{
include "kandidat_lolos.php";
}
else if($_GET['page'] == 'profile')
{
include "form_profile.php";
}
else if($_GET['page'] == 'laporan')
{
include "laporan_pelamar.php";
}
else {
include "error.php";
} 
      ?>
</div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui.min.css">
        <script type="text/javascript">
        $(function() {
            $('.date-picker').datepicker( {
                changeDays:true,
                changeMonth: true,
                changeYear: true,
                
                dateFormat: 'yy-mm-dd',
                onClose: function(dateText, inst) { 
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });
        </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
     <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
   $(document).ready( function () {
  
  var table = $('#sampleTable').DataTable({
    "order": [[ 0, "asc" ]],
    "oLanguage": {
      "sInfo": "Showing _START_ to _END_ of _TOTAL_ items."
    }
  });

    $("#sampleTable tfoot th").each( function ( i ) {
    
    if ($(this).text() !== '') {
          var isStatusColumn = (($(this).text() == 'Status') ? true : false);
      var select = $('<select><option value=""></option></select>')
              .appendTo( $(this).empty() )
              .on( 'change', function () {
                  var val = $(this).val();
          
                  table.column( i )
                      .search( val ? '^'+$(this).val()+'$' : val, true, false )
                      .draw();
              } );
      
      // Get the Status values a specific way since the status is a anchor/image
      if (isStatusColumn) {
        var statusItems = [];
        
                /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
        table.column( i ).nodes().to$().each( function(d, j){
          var thisStatus = $(j).attr("data-filter");
          if($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
        } );
        
        statusItems.sort();
                
        $.each( statusItems, function(i, item){
            select.append( '<option value="'+item+'">'+item+'</option>' );
        });

      }
            // All other non-Status columns (like the example)
      else {
        table.column( i ).data().unique().sort().each( function ( d, j ) {  
          select.append( '<option value="'+d+'">'+d+'</option>' );
            } );  
      }
          
    }
    } );
  
  
  
  
} );
  </script>
    <!--<script type="text/javascript">$('#sampleTable').DataTable();</script>-->
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script src="asset/js/jquery.printThis.js"></script>
	<script src="js/excel/FileSaver.min.js"></script>
	<script src="js/excel/jszip.min.js"></script>
	<script src="js/excel/seringpinjam.js"></script>	
    <script type="text/javascript">
      var data = {
        labels: ["January", "February", "March", "April", "May", "June","July","August","September","October","November","December"],
        datasets: [
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [ <?php
              $tahun = date('Y');
              $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-01-01' and '".$tahun."-01-31';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-02-01' and '".$tahun."-02-28';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-03-01' and '".$tahun."-03-31';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-04-01' and '".$tahun."-04-30';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-05-01' and '".$tahun."-05-31';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-06-01' and '".$tahun."-06-30';");
              echo mysql_result($result, 0); ?>, <?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-07-01' and '".$tahun."-07-31';");
              echo mysql_result($result, 0); ?>,<?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-08-01' and '".$tahun."-08-31';");
              echo mysql_result($result, 0); ?>,<?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-09-01' and '".$tahun."-09-30';");
              echo mysql_result($result, 0); ?>,<?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-10-01' and '".$tahun."-10-31';");
              echo mysql_result($result, 0); ?>,<?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-11-01' and '".$tahun."-11-30';");
              echo mysql_result($result, 0); ?>,<?php $result = mysql_query("SELECT COUNT(*) FROM laporan where tgl_lamar between '".$tahun."-12-01' and '".$tahun."-12-31';");
              echo mysql_result($result, 0); ?>]
          }
        ]
      };
      var pdata = [
        {
          value: 50,
          color:"#F7464A",
          highlight: "#FF5A5E",
          label: "In-Progress"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);

    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
    <!-- Cetak Printer -->
	<script type="text/javascript">
		$(document).ready(function(e) {
			$("button#btn_print").on("click", function(e)  {
				$("#div_to_print").printThis({
					exclude: [".do_not_print", ".print_exclude" ] 
					// stylesheets links											
				});
			}); 
		});
	</script>
	<!-- Cetak Printer -->
  <script type="text/javascript">
        $('#my_modal').on('show.bs.modal', function(e) {
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[name="bookId"]').val(bookId);
        var bookNama = $(e.relatedTarget).data('book-nama');
        $(e.currentTarget).find('input[name="bookNama"]').val(bookNama);
        var bookUsia = $(e.relatedTarget).data('book-usia');
        $(e.currentTarget).find('input[name="bookUsia"]').val(bookUsia);
        var bookEmail = $(e.relatedTarget).data('book-email');
        $(e.currentTarget).find('input[name="bookEmail"]').val(bookEmail);
        var bookPendidikan = $(e.relatedTarget).data('book-pendidikan');
        $(e.currentTarget).find('input[name="bookPendidikan"]').val(bookPendidikan);
        var bookLowongan = $(e.relatedTarget).data('book-lowongan');
        $(e.currentTarget).find('input[name="bookLowongan"]').val(bookLowongan);
        });
    </script>

    <script type="text/javascript">
    // Popup window code
    function newPopup(url) {
      popupWindow = window.open(
        url,'popUpWindow','height=400,width=400,left=500,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
    </script>


    <script>
      
    $('#sub_marks').click(function (event) {
        event.preventDefault();
        var checkboxes = document.getElementsByName('myCheckbox[]');
        var vals = "1";
        for (var i=0, n=checkboxes.length;i<n;i++) 
        {
            if (checkboxes[i].checked) 
            {
                vals += ","+checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);

        //alert(vals.substring(1));

          $.ajax({
                url:"http://localhost/jobvacancy/administrator/multiple_update.php",
                method:"POST",
                data:{name:vals.substring(1)},
                success:function()
                {
                    alert('Data Updated');window.location='index.php?page=list-kandidat'
                }
            })

    })

    </script>
  </body>
</html>
<?php
}
?>