
<div id="modal_delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3>هل انت متأكد ؟</h3>
            </div>
            <form method="post" class="needs-validation" novalidate="" action="../actions/delete.php">
            <div class="modal-footer" style="direction: ltr;">
                <input type="hidden" id="id_for_delete" name="id" value="">
                <input type="hidden" id="table_for_delete" name="table" value="">
                <button data-dismiss="modal" aria-label="Close" class="btn btn-danger">الغاء</button>
                <button type="submit" name="delete_adv" class="btn btn-primary">نعم , حذف</button>
            </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-services" tabindex="-1" role="dialog" aria-labelledby="modal-service" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-service">اضافة</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../actions/services.php" class="needs-validation" novalidate="" enctype="multipart/form-data" method="post">
                    <div class="row">
			          <input type="hidden" id="table_for_add" name="table" value="">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary">اسم الكتاب</h5>
                                <input type="text" name="book_name" id="book_name" class="form-control"  placeholder="" required />
                            </div>
                        </div>
						<div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary">رابط الكتاب</h5>
                                <input type="text" name="book_link" id="book_link" class="form-control"  placeholder="" required />
                            </div>
                        </div>
						 <div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary">نوع الكتاب</h5>
								
                                <select type="text" name="book_type" id="book_type" class="form-control" required>
                                <option value="كتب التنمية البشرية">كتب التنمية البشرية </option>
								 <option value="كتب الأدب والشعر">كتب الأدب والشعر </option>
								  <option value="كتب التاريخ"> كتب التاريخ</option>
								   <option value="كتب الأطفال"> كتب الأطفال</option>
								    <option value="كتب الصحة"> كتب الصحة</option>
									 <option value="كتب الطهي"> كتب الطهي</option>
									  <option value="كتب الجريمة والرعب">كتب الجريمة والرعب </option>
									   <option value="كتب الغموض"> كتب الغموض</option>
									    <option value="كتب علمية وثقافية">كتب علمية وثقافية </option>
										 <option value="كتب دينية"> كتب دينية</option>
										  <option value="كتب المغامرة"> كتب المغامرة</option>
										   <option value="كتب رومانسية">كتب رومانسية </option>
										    
                                </select>
                            </div> 
                        </div>
						
						<div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary">لغة الكتاب</h5>
                                <input type="text" name="language" id="language" class="form-control"  placeholder="" required />
                            </div>
                        </div>
						<div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary">مؤلف الكتاب</h5>
                                <input type="text" name="author" id="author" class="form-control"  placeholder="" required />
                            </div>
                        </div>
						<div class="col-sm-6">
                            <div class="form-group">
                                    <h5 class="text-primary"> الصورة </h5>
                                <input type="file"  name="image" id="image" class="form-control" required=""  placeholder="" accept="image/*"  id="img_id" />
                            </div>
                        </div>
                      <div class="col-sm-12">
                            <div class="form-group">
                                <h5 class="text-primary">وصـف الكتاب</h5>
                                <input type="text" name="description" id="description" class="form-control"  placeholder="" required />
                            </div>
                        </div>
						
                        <div class="col-sm-12">
                            <input type="hidden" id="service_id" name="book_id" value="">
                            <input type="submit" id="submit_service" name="add_book"  class="btn btn-primary" value="حفظ">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-danger">الغاء</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-users" tabindex="-1" role="dialog" aria-labelledby="modal-users" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-category">اضافة</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../actions/add_user.php" class="needs-validation" novalidate="" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary"> الاسم</h5>
                                <input type="text" name="name" id="form_title_id" class="form-control"  placeholder="" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <h5 class="text-primary"> العنوان</h5>
                                <input type="text" name="address" id="form_title_id" class="form-control"  placeholder="" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <h5 class="text-primary">البريد الالكتروني</h5>
                                <input type="email"  name="email" class="form-control" required/>
                            </div>
                        </div>
						 <div class="col-sm-6">
                            <div class="form-group">
                                    <h5 class="text-primary">رقم الهاتف</h5>
                                <input type="tel"  name="phone" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <h5 class="text-primary">كلمة السر </h5>
                                <input type="password"  name="password" class="form-control"  placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <h5 class="text-primary">تأكيد كلمة السر</h5>
                                <input type="password"  name="check_password" class="form-control" multiple="" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" id="form_id" name="form_name" value="">
                            <input type="submit" id="submit_form" name="add_user"  class="btn btn-primary" value="حفظ">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-danger">الغاء</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
