<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
  <!--   <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div> -->
    <div class="sidebar-brand-text mx-3">HMS Dashboard</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Strona główna</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Panel zarządzania
</div>

 <!-- Nav Item - Charts -->
 <li class="nav-item">
    <a class="nav-link" href="computers.php">
    <i class="fa fa-desktop" aria-hidden="true"></i>
        <span>Komputery</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="employees.php">
    <i class="fa fa-user-circle" aria-hidden="true"></i>
        <span>Użytkownicy</span></a>
</li>
         
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-cog" aria-hidden="true"></i>
        <span>Ustawienia</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>         -->

<!-- Divider -->
<!-- <hr class="sidebar-divider d-none d-md-block"> -->

</ul>
<!-- End of Sidebar -->
   
    <!-- <script>
        $('li.nav-item').click(function(){
            alert("XD");   
        });
    </script> -->
     
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function() {
            var CurrentUrl= document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            console.log(CurrentUrlEnd);
            $( "li a" ).each(function() {
                var ThisUrl = $(this).attr('href');
                var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();

                if(ThisUrlEnd == CurrentUrlEnd){
                    $(this).closest('li').addClass('active')
                }
            });
        });
    </script>
