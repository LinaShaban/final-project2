<?php
include "../includes/navbar.php";
?>
    <div class="card margins">
            <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0 float-right">الاعلانات</h3>
            
        </div>
        <?php show_messages() ?>
        <div class="table-responsive py-4">
            <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
            <div class="col-sm-12 col-md-6"><div id="datatable-basic_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12">
            <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                <thead class="thead-light">
                    <tr role="row">
                    <th>#</th>
                    <th>اسم المعلن</th>
                    <th>التفاصيل</th> 
                    <th>الموقع</th>
                    <th>ألـسعر</th>
                    <th></th>
                    </tr> 
                </thead>
                <tbody>
                    <?php
                        $row=get_advertises();
                        $i=1;
                        foreach ($row as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $i++;  ?></td>
                        <td><?php echo $value->Full_Name ?></td>
                        <td><?php echo $value->description  ?></td>
                        <td><?php echo $value->address  ?></td>
                        <td><?php echo $value->price  ?></td>
                        <td>
                            
                            <button type="button" id="<?php echo $value->ID ?>" class="del_click btn remove_advertise btn-icon btn-secondary" data-toggle="modal" data-target="#modal_delete">
                                <i class="far fa-trash-alt f-28"></i> 
                            </button>
                            
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table></div></div>
        </div>
    </div>
    </div>
</div>
</div>
<?php
include "../includes/footer.php";
?>

<script>
    $(document).on('click', '.remove_advertise', function () {
        var id = $(this).attr("id");
        $('#id_for_delete').val(id);
        $('#table_for_delete').val("advertisments");
    });

    

    $(document).on('click', '#button_modal', function () {
        $('#modal-default').modal('show');
        $('#modal-title-default').html("اضافة");
        $('#submit_adv').text('اضافة');
		        $('#book-name').val(data.book-name);
                $('#price').val('');
                $('#description').val('');
				$('#status').val('');
				$('#author').val('');
				$('#book-type').val('');
				$('#address').val('');
				$('#language').val('');
				$('#image').val('');
        
    });

</script>