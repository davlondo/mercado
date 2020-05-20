<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inventario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Información Inventario
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Total</th>
                                        <th>Usados</th>
                                        <th>Disponibles</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($allInventory as $item){?>
									<tr class="gradeA">
										<td><?php echo $item['name'];?></td>
										<td><?php echo $item['total'];?></td>
                                        <td><?php echo $item['used'];?></td>
                                        <td><?php echo $item['available'];?></td>
                                        <td><a href="<?php echo site_url('inventory/Edit/'.$item['item']);?>"><i class="fa fa-wrench fa-fw"></i></a></td>
                                    </tr>
                               	<?php }?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
                  language:  {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    </script>