<?php
include "../includes/navbar.php";
?>
    <div class="card margins">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0 float-right"> كتب PDF  </h3>
                <div>
                  <button type="button" id="services_modal" class="float-left btn btn-danger mb-3 add_services" data-toggle="modal" data-target="#modal-service"><i class="fa fa-plus">اضافة كتاب</i></button>
                </div>
            </div>
            <?php show_messages() ?>
            <div class="table-responsive py-4">
              <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                <div class="col-sm-12 col-md-6"><div id="datatable-basic_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                  <tr role="row">
                    <th>#</th>
                    <th> اسم الكتاب</th>
                    <th>نوع الكتاب</th>
                    <th></th>
                    </tr> 
                </thead>
                <tbody>
                <?php
                    $row=get_services();
                    $i=1;
                    foreach ($row as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo $value->book_name;  ?></td>
                    <td><?php echo $value->book_type;  ?></td>
                    <td>
                        <button type="button" id="<?php echo $value->id ?>" class="del_click btn remove_services btn-icon btn-secondary" data-toggle="modal" data-target="#modal_delete">
                            <i class="far fa-trash-alt f-28"></i> 
                        </button>
                        <button type="button" id="<?php echo $value->id;?>" class="btn btn-icon btn-secondary update_services"  data-toggle="modal" data-target="#modal-services"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                <?php } ?>
               </tbody>
              </table></div></div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "../includes/footer.php"; ?>

<script>
   $(document).on('click', '.add_services', function () {
        $('#table_for_add').val("books");
    });
    $(document).on('click', '.remove_services', function () {
        var id = $(this).attr("id");
        $('#id_for_delete').val(id);
        $('#table_for_delete').val("books");
    });

    $(document).on('click', '.update_services', function () {
        var id = $(this).attr("id");
        $('#modal-services').modal('show');
        $('#modal-title-service').html("تعديل");
        $('#submit_service').val('تعديل');
        $('#service_id').val(id);
        $.ajax({
            url: "../includes/fetch_record_data.php",
            method: "POST",
            data: { id: id , type : 'books' },
            dataType: "json",
            success: function (data) {
                 $('#table_for_add').val("books");
                $('#book_name').val(data.book_name);
				$('#book_link').val(data.pdf_book);
		        $('#description').val(data.description);
                $('#language').val(data.language);
		        $('#author').val(data.author);
		        $('#image').val(ReadersCommunity/images/data.image);
		        $('#book_type').val(data.book_type);
				
            }
        })
    });

    $(document).on('click', '#services_modal', function () {
        $('#modal-services').modal('show');
        $('#modal-title-service').html("اضافة");
        $('#submit_service').val('اضافة');
        $('#service_id').val('');
        $('#book_name').val('');
		$('#book_link').val('');
		$('#description').val('');
        $('#language').val('');
		$('#author').val('');
		$('#image').val('');
		$('#book_type').val('');
    });
</script>
