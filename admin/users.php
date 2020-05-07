<?php
include "../includes/navbar.php";
?>
    <div class="card margins">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0 float-right">المستخدمين</h3>
              <!-- <div class="col-sm-6 text-left">
                    <button class="btn btn-primary btn-sm btn-round has-ripple" id="client_add_button"  data-toggle="modal" data-target="#modal-client"><i class="fa fa-plus"></i> اعلان</button>
                </div> -->
                <div>
                  <button type="button" id="button_modal" class="float-left btn btn-danger mb-3" data-toggle="modal" data-target="#modal-users"><i class="fa fa-plus">مدير للموقع</i></button>
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
                    <th>الاسم</th>
                    <th>البريد الالكتروني</th> 
                    <th>نوع المستخدم</th>
                    </tr> 
                </thead>
                <tbody>
                <?php
                    $row=get_users();
                    $i=1;
                    foreach ($row as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo $value->Full_Name  ?></td>
                    <td><?php echo $value->Email  ?></td>
                    <td><?php echo $value->user_type  ?></td>
                    <!-- <td>
                        <a href="details.php?id=<php echo $value->id ?>&type=1"><button type="button" class="btn btn-icon btn-success"><i class="fa fa-image"></i></button></a>
                        <button type="button" id="<php echo $value->id ?>" class="del_click btn remove_advertise btn-icon btn-danger" data-toggle="modal" data-target="#modal_delete">
                            <i class="far fa-trash-alt f-28"></i> 
                        </button>
                        <button type="button" id="<php echo $value->id;?>" class="btn btn-icon btn-primary update_adv"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button>
                    </td> -->
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
        $('#table_for_delete').val("advertise");
    });

    $(document).on('click', '.update_adv', function () {
        var id = $(this).attr("id");
        $('#modal-default').modal('show');
        $('#modal-title-default').html("تعديل");
        $('#submit_adv').text('تعديل');
        $.ajax({
            url: "../includes/fetch_record_data.php",
            method: "POST",
            data: { id: id , type : 'advertise' },
            dataType: "json",
            success: function (data) {
                $('#title').val(data.title);
                $('#loc').val(data.location);
                $('#desc').val(data.description);
                $('#adv_id').val(data.id);
            }
        })
    });
</script>