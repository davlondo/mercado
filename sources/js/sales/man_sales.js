$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
        paging:   true,
        pageLength: 250,
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
        },
        columnDefs: [
            {
                targets: [-2,-1,-3,-4],
                className: 'dt-center'
            }
          ]
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
        if (activeProds>0){
            $('#fnPrint').prop("disabled", false);
        }
        
    }

    $('#dataTables-example tbody').on( 'click', 'span.glyphicon-remove', function () {
        t
            .row( $(this).parents('tr') )
            .remove()
            .draw();

            updateSum();

            var activeProds = t.rows().count();
    
            if (activeProds<1){
                $('#fnPrint').prop("disabled", true);
            }
    } );

    var codigo0 = $('#codigo0');
  
    codigo0.keyup('input', function (e) {
  
        if ( e.keyCode == 13  || e.keyCode == 9) {
            var codigo0 = $('#codigo0').val();

            $.ajax({
                url:base_url+'index.php/Products/getProductDetails',
                method: 'post',
                data: {codigo: codigo0},
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