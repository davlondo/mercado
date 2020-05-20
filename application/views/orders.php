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
            <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            paging:   true,
            pageLength: 10,
            ordering: false, 
            fixedHeader: true,
            scrollCollapse: true, 
            scrollY:        "500px", 
            scroller: true,         
            language:  {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ingrese productos",
                "sInfo":           "Total productos: _MAX_ ",
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

        var t = $('#dataTables-example').DataTable();
       
        
        function addRow(retrieve){
            console.log(retrieve);
            var nextRow = t.rows().count()+1;
           
            t.row.add( [
                retrieve[0].codigo,
                retrieve[0].nombre,
                retrieve[0].cantidades,
                retrieve[0].precio,
                retrieve[0].precioXCant,
                '<span class="glyphicon glyphicon-remove"></span>'
            ] ).node().id = nextRow;
            t.draw( false );

            updateSum();
             
            var activeProds = t.rows().count();
        
            if (activeProds>2){
                t.scroller.toPosition( activeProds );
            }

           
        }

        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-remove', function () {
            t
                .row( $(this).parents('tr') )
                .remove()
                .draw();

                updateSum();
        } );
    
        var codigo0 = $('#codigo0');
      
        codigo0.keyup('input', function (e) {
      
            if ( e.keyCode == 13  || e.keyCode == 9) {
                var codigo0 = $('#codigo0').val();

                $.ajax({
                    url:"<?php echo base_url().'index.php/Products/getProductDetails'?>",
                    method: 'post',
                    data: {codigo: codigo0,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
                    dataType: 'json',
                    success: function(response){
                        console.log(response)
                        addRow(response);
                    }
                });
            }
                
        });

        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
            return this.flatten().reduce( function ( a, b ) {
                if ( typeof a === 'string' ) {
                    a = a.replace(/[^\d.-]/g, '') * 1;
                }
                if ( typeof b === 'string' ) {
                    b = b.replace(/[^\d.-]/g, '') * 1;
                }
        
                return a + b;
            }, 0 );
        } );

        function updateSum(){
        var subTotal= t.column( 4 ).data().sum();
            console.log(subTotal);
            $('#total').text(subTotal);
       }
            
    });
    </script>