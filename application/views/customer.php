<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cargar Ganadores</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Proceso carga ganadores Inventario
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $error;?>

                                    <?php echo form_open_multipart('parts/do_parts');?>

                                        <div class="form-group">
                                            <label>Cargar archivo semanal</label>
                                            <input type="file" name="userfile" size="20">
                                        </div>
                                        <br /><br />
                                         <button type="submit" class="btn btn-default" value="upload">Cargar</button>
                                        <button type="reset" class="btn btn-default">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>