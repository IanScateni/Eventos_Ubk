<div class="container-sm">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <div id="detailAllServiceTable"></div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<!-- Modal -->
<div class="modal fade" id="editDetailService" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Actualizar Detailles del servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="updateDetailService">
            <div class="mb-3">
                <input type="text" hidden="" id="idUsS" name="idUsS">
                <label for="exampleInputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="titleUsS" name="titleUsS" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripUsS" name="descripUsS" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputText" class="form-label">Valor</label>
                <input onblur="validaNumericos();"  type="text" class="form-control" id="valueU" name="valueU" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnDetailServiceUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successfullDetailService">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Detalles del servicio actualizados exitosamente</h4>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#detailAllServiceTable').load('/views/administrator/detailAllServiceTable.php');
    }); 
    $("#valueU").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
            $(event.target).val(function (index, value ) {
                return value.replace(/\D/g, "")
                            .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
            });
        }
    });
    function updateDetailService(id_service){
        $.ajax({
            type: "POST",
            data: "id_service=" + id_service,
            url: "/helpers/getDetailService.php",
            success:function(r){
                event=jQuery.parseJSON(r);
                $('#idUsS').val(event['id']);
                $('#titleUsS').val(event['title']);
                $('#descripUsS').val(event['description']);
                $('#valueU').val(event['value']);
            }
        });
    }
    function deleteDetailService(id_service){
        alertify.confirm('Eliminar el servicio', '¿Seguro de eliminar este servicio?', function(){
            $.ajax({
                type: "POST",
                data: "id_service=" + id_service,
                url: "/helpers/deleteDetailService.php",
                success:function(r){
                   if (r==1) {
                        $('#detailAllServiceTable').load('/views/administrator/detailAllServiceTable.php');
                        alertify.success("Eliminado con exito");
                   } else {
                        alertify.error("No se pudo eliminar");
                   }
                }
            });
        }
        , function(){
        }).set('labels', {ok: 'Eliminar', cancel:'Cerrar'});
    }
    $(document).ready(function() {
        $('#btnDetailServiceUpdate').click(function(){
            var title = $('#titleUsS').val();
            var description = $('#descripUsS').val();
            var value = $('#valueU').val();
            if (title == "" && description == "" && value =="") {
                alertify.error("Debe ingresar toda la información");
            } else {
                if (title=="") {
                    alertify.error("Debe ingresar el titulo del servicio");
                } else {
                    if (description =="") {
                            alertify.error("Debe ingresar la descripción del servicio");
                    } else {
                        if (value == "") {
                            alertify.error("Debe ingresar el valor del servicio");
                        } else {
                            data=$('#updateDetailService').serialize();
                            $.ajax({
                                type:"POST",
                                data:data,
                                url:"/helpers/updateDetailService.php",
                                success:function(r){
                                    if (r==1) {
                                        $("#editDetailService").modal("hide"); 
                                        $('#detailAllServiceTable').load('/views/administrator/detailAllServiceTable.php');
                                        $("#successfullDetailService").modal("show");
                                       setTimeout(function(){ $('#successfullDetailService').modal('hide');},2000);
                                    } else {
                                        alertify.error("Error, fallo al actualizar");
                                    }
                                }
                            });
                        }
                    }
                }
            }
        });
    });
</script>