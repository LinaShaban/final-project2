<?php
include "../includes/navbar.php";
?>
  <div class=" margins">
    <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">الاعلانات</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo get_count("SELECT * FROM advertisments "); ?></span>
                    </div>
                   <div class="col-auto">
                      <div class=" icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-ungroup "></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">المستخدمين</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo get_count("SELECT * FROM users"); ?></span>
                    </div>
                     <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div> 
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">كتب الPDF </h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo get_count("SELECT * FROM books"); ?></span>
                    </div>
                    <div class="col-auto">
                     <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-single-copy-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">كتب صوتية</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo get_count("SELECT * FROM audio_books"); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-single-copy-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
    </div>
    <img src="../admin/assets/build.png" alt="" style="margin-right:100px" />
</div>
<?php
include "../includes/footer.php";
?>
