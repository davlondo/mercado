<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Manejo Productos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Productos
                            <button id="addRow" style="float: right;">Nuevo Producto</button>
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Activo</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tfooter>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Activo</th>
                                        <th>Editar</th>
                                    </tr>
                                </tfooter>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        <script src="<?php echo base_url().'sources/js/products/man_products.js'?>"></script>