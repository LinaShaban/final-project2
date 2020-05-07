<?php include 'header.php';

$user=$user=$_SESSION['User_Type'];
  if($user=='Manager')  ?>  {
	 
    
  


 <?php echo" <nav class='sidenav navbar navbar-vertical fixed-right navbar-expand-xs navbar-inverse bg-white' id='sidenav-main'>
	<div>
   
    	<div class='sidenav-header d-flex align-items-right'>
			<a class='navbar-brand' href='../admin/home.php'>
        <h2 style='margin-top:-8px;'>Readers Community</h2>
			</a>
			<div>
			
				<div class='sidenav-toggler d-none d-xl-block active' data-action='sidenav-unpin' data-target='#sidenav-main'>
					<div class='sidenav-toggler-inner'>
						<i class='sidenav-toggler-line'></i>
						<i class='sidenav-toggler-line'></i>
						<i class='sidenav-toggler-line'></i>
					</div>
				</div>
        	</div>
      	</div>
      	<div class='navbar-inner'>
   
        <div class='collapse navbar-collapse' id='sidenav-collapse-main'>
          
          	<ul class='navbar-nav'>
				<li class='nav-item'>
					<a class='nav-link' href='home.php'>
						<i class='ni ni-shop text-primary'></i>
						<span class='nav-link-text' >الرئيسية</span>
					</a>
				</li>
            <li class='nav-item'>
				        <a class='nav-link' href='advertises.php'>
                <i class='ni ni-ungroup text-orange'></i>
                <span class='nav-link-text'>الاعلانات</span>
              </a>
            </li>
            
            <li class='nav-item'>
				        <a class='nav-link' href='services.php'>
                <i class='ni ni-single-copy-04 text-pink'></i>
                <span class='nav-link-text'>كتب الPDF</span>
              </a>
            </li>
            <li class='nav-item'>
				        <a class='nav-link' href='audios.php'>
                <i class='ni ni-single-copy-04 text-pink'></i>
                <span class='nav-link-text'>الكتب الصوتية</span>
              </a>
            </li>
           
            <li class='nav-item'>
              <a class='nav-link' href='users.php'>
                <i class='ni ni-single-02 text-default'></i>
                <span class='nav-link-text'>المستخدمين</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
    <div class='scroll-element scroll-x scroll-scrolly_visible'><div class='scroll-element_outer'>
	<div class='scroll-element_size'></div><div class='scroll-element_track'></div><div class='scroll-bar'
	style='width: 0px; left: 0px;'></div>
	</div></div><div class='scroll-element scroll-y scroll-scrolly_visible'><div class='scroll-element_outer'>
	<div class='scroll-element_size'></div><div class='scroll-element_track'></div><div class='scroll-bar'
	style='height: 203px; top: 0px;'></div></div></div></div>
  </nav>
  <div class='main-content' id='panel'>
  <nav class='navbar navbar-top navbar-expand navbar-dark primary-color border-bottom'>
      <div class='container-fluid'>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
       
          <div class='navbar-nav align-items-center ml-md-auto'>
          </div>
          <ul class='navbar-nav align-items-center ml-auto ml-md-0'>
            <li class='nav-item dropdown'>
              <a class='nav-link pr-0' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <div class='media align-items-center'>
                  <span class='avatar avatar-sm rounded-circle'>
                    <img alt='Image placeholder' src='./assets/img/theme/team-4.jpg'>
                  </span>
                  <div class='media-body ml-2 d-none d-lg-block'>
                    <span class='mb-0 text-sm  font-weight-bold'></span>
                  </div>
                </div>
              </a>
              <div class='dropdown-menu dropdown-menu-left'>
                <div class='dropdown-header noti-title'>
                  <h6 class='text-overflow m-0'></h6>
                </div>
                
                <div class='dropdown-divider'></div>
                <a href='../admin/logout.php' class='dropdown-item'>
                  <i class='ni ni-user-run'></i>
                  <span>تسجيل الخروج</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> "; ?>

      