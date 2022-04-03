<section class="service section-padding">
    <div class="container">
        <p>Estimado <strong><?php echo ucwords(strtolower($nombre)); ?></strong>,<br><br> A continuación le presentamos la cotización de su evento <strong><?php echo $evento; ?></strong> con su respectiva descripción y precios:</p>
        <div class="table-responsive-md">
            <table class="table table-bordered table-sm text-center align-middle">
            <thead style="background-color: #AA0606; color: #fff; font-weight: bold;">
                <tr>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php $subtotal= 0; $impuesto= 0; $total = 0;
                    foreach ($input as $serviceTitle => $title) {
                    if ($serviceTitle == "siteEventTitle") {
                        $detail = $service->getDetailSite($title);
                        $serviceTitle = $title;
                    } else {
                        $detail = $service->getDetailService($serviceTitle);
                    }
                    if ($detail != "") {
                        if ($detail['unitStandar'] == "Por invitado") {
                            $price = $detail['standar'];
                            $priceTotal = $price * $personas;
                            $price = "$". number_format($price, 0,'.','.');
                            if ($serviceTitle == "Menú") {
                                $cantidad = $personas . " Servicios";
                            } else if ($serviceTitle == "Ponque") {
                                $cantidad = $personas . " Porciones";
                            } else {
                                $cantidad = $personas;
                            }
                        } else if ($detail['unitStandar'] == "Personas") {
                            $cantidad = "1";
                            if ($personas <= 100) {
                                if ($serviceTitle == "Personal") {
                                    $cantidad = "1 Equipo";
                                }
                                $price = $detail['standar'];
                            } else  if ($personas >= 101 && $personas <= 300){
                                if ($serviceTitle == "Personal") {
                                   $cantidad = "2 Equipo";
                                }
                               $price = $detail['medium'];     
                            } else if($personas >= 301 && $personas <= 500){
                                if ($serviceTitle == "Personal") {
                                   $cantidad = "3 Equipo";
                                }
                               $price = $detail['gold'];     
                            }
                            if ($serviceTitle == "Tematicas") {
                                $cantidad = "1 decoración";
                            }
                            $priceTotal = $price;
                            $price = "$". number_format($price, 0,'.','.');
                        } else if ($detail['unitStandar'] == "c/u") {
                            $cantidadMesas = $personas / 10;
                            $totalMesas = $cantidadMesas + 3;
                            if ($detail['standar'] > 0 && $detail['medium'] > 0 && $detail['title'] == "Mobiliario") {
                                $totalSillas = $personas;
                                $price = "Mesas $" .  number_format($detail['medium'], 0,'.','.') .", Sillas $" .  number_format($detail['standar'], 0,'.','.');
                                $priceTotal = ($totalMesas * $detail['medium']) + ($detail['standar'] * $totalSillas);
                                $cantidad = $totalMesas + $totalSillas;
                            } else if ($detail['standar'] > 0 && $detail['medium'] == 0) {
                                if ($serviceTitle == "Menaje") {
                                    $price = $detail['standar'];
                                    $priceTotal = $price * $personas;
                                    $price = "$". number_format($price, 0,'.','.');
                                    $cantidad = $personas;
                                } else {
                                    $price = $detail['standar'];
                                    $priceTotal = $totalMesas * $price;
                                    $price = "$". number_format($price, 0,'.','.');
                                    $cantidad = $totalMesas;
                                }
                            }
                        } else if ($detail['unitStandar'] == "Site") {
                            $price = $detail['standar']; 
                            $price = "$". number_format($price, 0,'.','.'); 
                            $priceTotal = $detail['standar'];
                        }
                    ?><tr>
                        <td class="cotiza"><?php echo $serviceTitle; ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>$<?php echo number_format($priceTotal,0,'.','.'); ?></td>
                    </tr>
                    <?php } 
                    $subtotal = $subtotal+$priceTotal;
                    }
                    $impuesto = $subtotal * 0.19;
                    $total = $impuesto + $subtotal;
                    ?>
                <tr class="table-cotizaborde">
                    <td></td>
                    <td></td>
                    <td class="cotiza-right">Subtotal</td>
                    <td class="cotiza-center">$<?php echo number_format($subtotal,0,'.','.'); ?></td>
                </tr>
                <tr class="table-cotizaborde">
                    <td></td>
                    <td></td>
                    <td class="cotiza-right">Impuesto</td>
                    <td class="cotiza-center">$<?php echo number_format($impuesto,0,'.','.'); ?></td>
                </tr>
                <tr class="table-cotizaborde">
                    <td></td>
                    <td></td>
                    <td class="cotiza-right">Total</td>
                    <td class="cotiza-center"><strong>$<?php echo number_format($total,0,'.','.'); ?></strong></td>
                </tr>
            </tbody>
            </table>
        </div><hr>
        <form action="" id="formBudget">
        <?php if (array_key_exists("Menú",$input)) {?>
        <h3>Seleccione su menú</h3>
            <p>Todos  los  platos  incluyen  ,  arroz,dos  carnes, papa, ensalada, postre, y bebida. A continuación puede seleccionar su menú:</p>
            <div class="menu">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php foreach ($menuCategory as $category) {
                        $menuitems = $service->getMenu($category['title']);
                        if ($menuitems->num_rows > 0) {?>
                    <div class="col">
                        <div class="card">
                            <img style= "max-height:180px; min-width: 100%;" src="<?=PATH?>public/img/<?php echo $category['cover']; ?>" class="card-img-top" alt="<?php echo $category['title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center font-title-menu"><?php echo ucfirst($category['title']); ?></h5><hr>
                                <?php if ($category['title'] == "Pasabocas"): ?>
                                    <p class="tex-justify text-small">Los pasabocas tienen costo adicional, Sujetos  a  contratación  de  menú  en  el  evento  y/o cantidad solicitada. Consulte un asesor. </p>
                                <?php elseif($category['title'] == "Especial"): ?>
                                    <p class="tex-justify text-small">Los platos especiales tienen costo adicional, Sujetos  a  contratación  de  menú  en  el  evento  y/o cantidad solicitada. Consulte un asesor. </p>
                                <?php elseif ($category['title'] == "Infantil"): ?>
                                    <p class="tex-justify text-small">Cambio por menú adulto sin costo adicional, se prepara un mínimo de 5</p>
                                <?php endif ?>
                                <select name="menu[]" id="menu" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                  <option selected disabled value="">Seleccione su <?php echo strtolower($category['title']); ?></option>
                                  <?php foreach ($menuitems as $item) {?>
                                  <option value="<?php echo $item['id']; ?>"><?php echo ucfirst($item['name']); ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <?php } } ?>
                </div>
                    <p>Conozca nuestra carta menú dando click <a href="/servicios/menuCard" target="_blank">Aquí</a></p><hr>
            </div><br>
        <?php } ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <h4>Datos de la reserva</h4><hr>
                <p><strong>Nombre: </strong><?php echo ucwords(strtolower($nombre)); ?></p>
                <p><strong>Email: </strong><?php echo $email; ?></p>
                <p><strong>Teléfono: </strong><?php echo $telefono; ?></p>
                <p><strong>Fecha del evento: </strong><?php echo $fecha; ?></p>
                <p><strong>Hora del evento: </strong><?php echo $hora; ?></p>
                <?php if ($input['siteEventTitle'] != "0") {?>
                <p><strong>Lugar del evento: </strong><?php echo $input['siteEventTitle']; ?></p>
                <?php } ?>
                <p><strong>Cantidad de invitados: </strong><?php echo $personas; ?></p>
                <p><strong>Tipo de evento: </strong><?php echo $evento; ?></p>
                <?php $servici=""; foreach ($input as $ServiceC => $title) {
                    if ($ServiceC != "siteEventTitle") {
                        $servici .= $ServiceC . ", "; 
                        $servicio = substr(trim($servici), 0,-1);
                    }
                } ?>
                <p><strong>Servicios contratados: </strong><?php echo $servicio; ?></p>
                <p><strong>Precio total: </strong>$<?php echo number_format($total,0,'.','.'); ?></p>
            </div>
            <div class="col">
                <div class="alert alert-primary" role="alert">
                    <h4>Importante</h4><hr>
                    <strong>Forma de pago</strong>
                    <p>1 pago - 10% a la firma del contrato<br>2 pago - 60% diez días antes del evento<br>3 pago - 30% el día del evento antes de iniciar</p>
                    <p>** Propuesta sujeta a cambios de precio sin previo aviso, antes de una contratación formal<br>** Puede modificar su evento según el portafolio de la empresa, consulte un asesor.<br>** Aplican condiciones, algunos servicios requieren transporte adicional o gastos extra asumidos por el cliente.</p>
                </div>      
            </div>
        </div><br>
        <?php $eventService = json_encode($input);$eventService = str_replace("\"", "'", $eventService);?>
        <input type="text" hidden="" class="form-control" id="evento" name="evento" value="<?php echo $evento; ?>">
        <input type="text" hidden="" class="form-control" id="nombre" name="nombre" value="<?php echo ucwords(strtolower($nombre)); ?>">
        <input type="text" hidden="" class="form-control" id="firstname" name="firstname" value="<?php echo ucwords(strtolower($firstname)); ?>">
        <input type="text" hidden="" class="form-control" id="lastname" name="lastname" value="<?php echo ucwords(strtolower($lastname)); ?>">
        <input type="text" hidden="" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        <input type="text" hidden="" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
        <input type="text" hidden="" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
        <input type="text" hidden="" class="form-control" id="hora" name="hora" value="<?php echo $hora; ?>">
        <input type="text" hidden="" class="form-control" id="personas" name="personas" value="<?php echo $personas; ?>">
        <input type="text" hidden="" class="form-control" id="servicios" name="servicios" value="<?php echo $eventService; ?>">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success" id="editBudget">Editar</button>
            </div>
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-danger" id="addBudget">Reservar</button>
            </div>
        </div> 
        </form>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="successfull" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h4>Reserva exitosa por favor revise su correo eléctronico, para consultar los detalles de su reserva</h4>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#addBudget').click(function(){
            data=$('#formBudget').serialize();
            $.ajax({
                type:"POST",
                data:data,
                url:"/helpers/newBudget.php",
                success:function(r){
                    if (r==1) {
                        $("#successfull").modal("show");
                        setTimeout(function(){ $('#successfull').modal('hide');},4000);
                        setTimeout(function(){window.location='index'}, 4200);
                    } else {
                        if (r == 3) {
                            alertify.error("Error, no se reservo el evento por que ya tiene un evento reservado para esta fecha");    
                        } else {
                            alertify.error("Error, intente de nuevo en un momento");
                        }
                    }
                }
            });
        });
        $('#editBudget').click(function(){
          window.history.back();      
        });
    });
</script>