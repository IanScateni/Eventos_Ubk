<?php 
if (!isset($_SESSION['identity'])) {
    header("Location:".PATH.'usuario/login');
}?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<section class="service section-padding">
    <div class="container">
        <?php if ($reservation->num_rows > 0) {?>
            <p>Estimado <strong><?php echo ucwords(strtolower($_SESSION['identity']->firstname ." ". $_SESSION['identity']->lastname)); ?></strong>,<br><br> A continuación le presentamos los detalles de su reserva:</p>
            <?php foreach ($reservation as $data) {
                if ($data['type'] == '0') {?>
                    <p><strong>Evento: </strong><?php echo $data['evento'];?></p>
                    <p><strong>Fecha del evento: </strong><?php echo $data['fecha'];?></p>
                    <p><strong>Hora del evento: </strong><?php echo $data['hour'];?></p>
                    <?php $servicesL = json_decode($data['servicios']);
                        foreach ($servicesL as $ServiceCL => $titleL) {
                            if ($ServiceCL == "siteEventTitle") {?>
                                <p><strong>Lugar del evento: </strong><?php echo $titleL;?></p>
                           <?php }
                        } ?>
                    <p><strong>Cantidad de invitados: </strong><?php echo $data['personas'];?></p>  
                    <?php $servici=""; $services = json_decode($data['servicios']); 
                         foreach ($services as $ServiceC => $title) {
                            if ($ServiceC != "siteEventTitle") {
                                $servici .= $ServiceC . ", "; 
                                $servicios = substr(trim($servici), 0,-1);
                                $servicios = str_replace("Menu00fa", "Menú", $servicios);
                            }
                        }
                        $personas = $data['personas'];
                    ?>
                    <p><strong>Servicios contratados: </strong><?php print_r($servicios);?></p>
                    <?php if (strstr($servicios, "Menú")) {
                            $oMenu = json_decode($data['menu']);
                            $dataMenu = "<ol>";
                            foreach ($oMenu as $idMenu ) {
                                $aMenu = $oReservation->getMenu($idMenu);
                                $dataMenu .= "<li>". $aMenu[0] . "</li>"; 
                            } $dataMenu .= "</ol>"; ?>
                            <p><strong>Menú Seleccionado: </strong><br> </p>
                            <div class="alert alert-success" role="alert">
                                <div class="container">
                                    <?php echo $dataMenu;?>
                                </div>
                            </div>
                            <hr>
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
                                        foreach ($services as $serviceTitle => $title) {
                                            if ($serviceTitle == "siteEventTitle") {
                                                $detail = $service->getDetailSite($title);
                                                $serviceTitle = $title;
                                            } else {
                                                $serviceTitle = str_replace("Menu00fa", "Menú", $serviceTitle);
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
                                </table><hr> 
                        <?php } else {?>
                            <hr>
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
                                        foreach ($services as $serviceTitle => $title) {
                                            if ($serviceTitle == "siteEventTitle") {
                                                $detail = $service->getDetailSite($title);
                                                $serviceTitle = $title;
                                            } else {
                                                $serviceTitle = str_replace("Menu00fa", "Menú", $serviceTitle);
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
                                </table><hr> 
                      
                    <?php }
                } else if ($data['type'] == '1'){
                    $servi = new Servicios();
                    $detailservice =  $servi->getDetailService($data['evento']);
                    if ($detailservice['standar'] == $data['servicios']) {
                        $paquete = "Paquete 1";
                    } else if ($detailservice['medium'] == $data['servicios']) {
                        $paquete = "Paquete 2";
                    } else {
                        $paquete = "Paquete 3";
                    } ?>
                    <p><strong>Evento: </strong><?php echo $data['evento'];?></p>
                    <p><strong>Fecha del servicio: </strong><?php echo $data['fecha'];?></p>
                    <p><strong>Paquete contratado: </strong><?php echo $paquete;?></p>
                    <hr>
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-sm text-center align-middle">
                            <thead style="background-color: #AA0606; color: #fff; font-weight: bold;">
                                <tr>
                                    <th>Servicio</th>
                                    <th>Plan</th>
                                    <th>Subtotal</th>
                                    <th>Impuesto</th>
                                    <th>Precio total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0; $impuesto = 0;
                                    $impuesto = $data['servicios'] * 0.19;
                                    $subtotal = $data['servicios'] - $impuesto;
                                ?>
                                <td><?php echo $data['evento']; ?></td>
                                <td><?php echo $paquete; ?></td>
                                <td><?php echo "$". number_format($subtotal, 0, '.', '.') ?></td>
                                <td><?php echo "$". number_format($impuesto, 0, '.', '.') ?></td>
                                <td><?php echo "$". number_format($data['servicios'], 0, '.','.') ?></td>
                            </tbody>    
                        </table><hr>   
                    </div>
                    <div class="serviceEvent">
                        <strong>Descripción del servicio:</strong><br><br>
                        <p><?php echo $detailservice['description']; ?></p>
                    </div><hr>
        <?php } } ?>               
        </div>
        <?php } else {?>
        <div style="height:80vh;" class="alert alert-danger" role="alert">
            <center>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <p class="mb-0">La reserva que intenta ver no existe.</p>
            </center>
        </div>
        <?php } ?>
        <div class="d-grid gap-2 col-4 mx-auto">
            <a class="btn btn-danger" type="button" href="javascript:close_tab();">Volver a mis reservas</a>
        </div>
    </div><br>
</section>
<script type="text/javascript">
    function close_tab() {
        window.close();
    }
</script>
