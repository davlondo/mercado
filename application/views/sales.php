<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="float: center;">TOTAL: <span id="total">0</span></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <button id="fnPrint" style="float: right;" disabled>Pagar</button>
                        <p class="alignleft" style="float: left;">Código
                <input type="text" value="" id="codigo0" class="sum"></input></p><br>
                
                
                        </div>
                
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover compact" id="dataTables-example">
                                <thead style="font-size: 18px;">
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Valor Unidad</th>
                                        <th>Valor Total</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 18px;" >
                               <!-- <?php /* foreach($allOrders as $order){?>-->
									<tr class="gradeA">
										<td><?php echo $order['fecha'];?></td>
										<td><?php echo $order['regalo'];?></td>
                                        <td><?php echo $order['cliente'];?></td>
                                        <td><?php echo $order['address'];?></td>
                                        <td><?php echo $order['phone'];?></td>
                                        <td><?php echo $order['distrito'];?></td>
                                        <td><?php echo $order['movil'];?></td>
                                        <td><?php echo $order['email'];?></td>
                                    </tr>
                               <!--	<?php }*/?> -->
                                </tbody>
                                <tfoot style="font-size: 18px;">
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Valor Unidad</th>
                                        <th>Valor Total</th>
                                        <th>Borrar</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?=$sales_modal?>
            <script src="<?php echo base_url().'sources/js/sales/man_sales.js'?>"></script>