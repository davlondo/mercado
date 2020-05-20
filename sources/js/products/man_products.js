
    $(document).ready(function() {
        
        $('#dataTables-example').DataTable({
            responsive: true,
            //serverSide: true,
            processing: true,
            type : 'GET',
            /*
            rowCallback : function( row, data ) {
                console.log(data);
            },
            */
            dataSrc: 'data',
            dataType: 'json',
            ajax: base_url+'index.php/Products/getAllProducts',
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
            },
            columns:[
                { "data": "codigo" }, 
                { "data": "nombre" }, 
                { "data": "precio" },
                { "data": "activo" }, 
                { "data": "editar" }, 
            ],
            columnDefs: [
                {
                    targets: [-2,-1,-3],
                    className: 'dt-center'
                }
              ]
        });
        
        var t = $('#dataTables-example').DataTable();

        var col2;
        var col3;
        var col4;

        $('#dataTables-example tbody').on( 'click', 'tr', function () {          
            //console.log( t.row( this ).data());
   
        } );

        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-edit', function () {
            console.log($(this).closest('tr').attr("id"));
            var elId=$(this).closest('tr').attr("id");
            var currentRow=$(this).closest("tr");
            $('#activo_'+elId).prop("disabled", false);
            
            //var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
            col4=currentRow.find("td:eq(3)").val(); // get current row 3rd TD
            col4=currentRow.find("td:eq(4)").val(); // get current row 4rd TD

            currentRow.find("td:eq(1)").html('<input type="text" id="newName'+elId+'" value="'+col2+'"></input><span id="reqName'+elId+'" style="display: none;">Requerido</span>');
            currentRow.find("td:eq(2)").html('<input type="text" id="newPrice'+elId+'" value="'+col3+'"></input><span id="reqPrice'+elId+'" style="display: none;">Requerido</span>');
            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-ok"></span>   <span class="glyphicon glyphicon-remove"></span>');
                      
        } );

        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-ok', function () {
            var elId=$(this).closest('tr').attr("id");
            var currentRow=$(this).closest("tr");
            
            var col2New=currentRow.find("#newName"+elId).val(); // get current row 2nd TD
            var col3New=currentRow.find("#newPrice"+elId).val(); // get current row 3rd TD
            var col4New=currentRow.find("#activo_"+elId).prop("checked");; // get current row 3rd TD
            console.log("OE");
            console.log(elId);

            confirmed= checkfields(1,elId);

            if(confirmed){
                
                $.ajax({
                    url: base_url+'index.php/Products/updateProduct',
                    method: 'post',
                    data: {codigo: elId,
                           nombre: col2New,
                           precio: col3New,
                           activo: col4New,
                        },
                    dataType: 'json',
                    success: function(response){
                        console.log("FU");
                        console.log(response)
                        $("#"+elId).addClass('selected');
                        if(response){
                            currentRow.find("td:eq(1)").html(col2New);
                            currentRow.find("td:eq(2)").html(col3New);
                            $('#activo_'+elId).prop("disabled", true);
                            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-edit">   Exitoso <span class="glyphicon glyphicon-thumbs-up">');
                            alert("Actualizado correctamente");
                        }else{
                            currentRow.find("td:eq(4)").append('   Error <span class="glyphicon glyphicon-thumbs-down">');
                            alert("Error en BD. Contactar al administrador");
                        }

                        setTimeout(function(){ 
                             $("#"+elId).removeClass('selected');
                             if(response){
                                currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-edit">');
                             }else{
                                currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-ok"></span>   <span class="glyphicon glyphicon-remove"></span>');   
                             }
                            }, 3000);
                        //addRow(response);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("FU2");
                        console.log(errorThrown);
                      } //EINDE error
                });
            }            
            
            
        } );



        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-share', function () {
            //var sending= t.row( this ).data();
            //console.log(sending);

            var currentRow=$(this).closest("tr");
            
            var col1Create=currentRow.find("#newCode").val(); // get current row 2nd TD
            var col2Create=currentRow.find("#newName").val(); // get current row 2nd TD
            var col3Create=currentRow.find("#newPrice").val(); // get current row 3rd TD
            console.log(col1Create);

            var confirmed= checkfields(0,null);

            if(confirmed){
                
                $.ajax({
                    url: base_url+'index.php/Products/createProduct',
                    method: 'post',
                    data: {codigo: col1Create,
                           nombre: col2Create,
                           precio: col3Create,
                            },
                    dataType: 'json',
                    success: function(response){
                        console.log("FU");
                        console.log(response)
                        $("#row_-1").addClass('selected');
                        if(response.status){
                            
                            var d = t.row( currentRow ).data();
                            d.DT_RowId=col1Create;
                            d.codigo=col1Create;
                            d.nombre=col2Create;
                            d.precio=col3Create;
                            var newId=d.DT_RowId;
                            console.log("REGIO");
                            t
                            .row( currentRow )
                            .data( d );
                            currentRow.find("td:eq(0)").html(col1Create);
                            currentRow.find("td:eq(1)").html(col2Create);
                            currentRow.find("td:eq(2)").html(col3Create);
                            currentRow.find("td:eq(3)").html('<input type="checkbox" name="activo_row_'+newId+'" id="activo_row_'+newId+'" value="S" checked disabled></input>');
                            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-edit">  Exitoso <span class="glyphicon glyphicon-list-alt">');
                            alert("Creado correctamente");
                        }else{
                            currentRow.find("td:eq(0)").html('<input type="text" id="newCode" value="'+col1Create+'"></input><span id="reqName" style="display: none;">Requerido</span>');
                            currentRow.find("td:eq(1)").html('<input type="text" id="newName" value="'+col2Create+'"></input><span id="reqName" style="display: none;">Requerido</span>');
                            currentRow.find("td:eq(2)").html('<input type="text" id="newPrice" value="'+col3Create+'"></input><span id="reqPrice" style="display: none;">Requerido</span>');
                            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-share"></span>   <span class="glyphicon glyphicon-trash"></span>');
                            if(response.existing){
                                currentRow.find("td:eq(4)").append('   Ya existe el código <span class="glyphicon glyphicon-exclamation-sign">');
                                alert("Código ya existe");
                            }
                            if(response.error){
                            currentRow.find("td:eq(4)").append('   Error <span class="glyphicon glyphicon-exclamation-sign">');
                            alert("Error en BD. Contactar al administrador");
                            }
                        }

                        setTimeout(function(){ 
                             
                             if(response.status){
                                $("#"+col1Create).removeClass('selected');
                                currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-edit">');
                             }
                             if((response.existing)||(response.error)){
                                $("#row_-1").removeClass('selected');
                                currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-share"></span>   <span class="glyphicon glyphicon-trash"></span>');
                             }
                            
                            }, 3000);
                        //addRow(response);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("FUAAAA");
                        console.log(errorThrown);
                      } //EINDE error
                });
            }  
    /*
            var input=$("#newCode");
            var is_name=input.val();
            if(is_name){$("#reqCode").css("display", "none");}
            else{$("#reqCode").css({"display":"block", "color":"red"});}

            var input=$("#newName");
            var is_name=input.val();
            if(is_name){$("#reqName").css("display", "none");}
            else{$("#reqName").css({"display":"block", "color":"red"});}

            var input=$("#newPrice");
            var is_name=input.val();
            if(is_name){$("#reqPrice").css("display", "none");}
            else{$("#reqPrice").css({"display":"block", "color":"red"});}
*/
         });

        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-remove', function () {
            var elId=$(this).closest('tr').attr("id");
            var currentRow=$(this).closest("tr");

            currentRow.find("td:eq(1)").html(col2);
            currentRow.find("td:eq(2)").html(col3);
            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-edit">');
            $('#activo_'+elId).prop("disabled", true);
           
        } );

        function checkfields(processType,elementId){

            $pass=true;

            if (processType==0){
                var input=$("#newCode");
                var is_name=input.val();
                if(is_name){$("#reqCode").css("display", "none");}
                else{$("#reqCode").css({"display":"block", "color":"red"});$pass=false;}
            }

            if (elementId===null){
                var inputName=$("#newName");
                var inputPrice=$("#newPrice");
                var jsReqName=$("#reqName");
                var jsReqPrice=$("#reqPrice");
            }else{
                var inputName=$("#newName"+elementId);
                var inputPrice=$("#newPrice"+elementId);
                var jsReqName=$("#reqName"+elementId);
                var jsReqPrice=$("#reqPrice"+elementId);
            }
            //console.log(inputName);

            var is_nameName=$(inputName).val();
            if(is_nameName){$(jsReqName).css("display", "none");}
            else{$(jsReqName).css({"display":"block", "color":"red"});$pass=false;}
            
            var is_namePrice=$(inputPrice).val();
            if(is_namePrice){$(jsReqPrice).css("display", "none");}
            else{$(jsReqPrice).css({"display":"block", "color":"red"});$pass=false;}

            return $pass;
        }

        function addRow(){
           // console.log(retrieve);
    
            t.row.add({"codigo": '-1',"nombre": ' ',"precio": ' ',"activo": " ","editar": ' ','DT_RowId': 'row_-1'});
            t.order([0, 'asc']).draw(false);

           // console.log(t.row( curRow ).data());
            var currentRow=$("#row_-1");

            currentRow.find("td:eq(0)").html('<input type="text" id="newCode" value="" placeholder="Ingrese Código"></input><span id="reqCode" style="display: none;">Requerido</span>');
            currentRow.find("td:eq(1)").html('<input type="text" id="newName" value="" placeholder="Ingrese Nombre"></input><span id="reqName" style="display: none;">Requerido</span>');
            currentRow.find("td:eq(2)").html('<input type="text" id="newPrice" value="" placeholder="Ingrese Precio"></input><span id="reqPrice" style="display: none;">Requerido</span>');
            currentRow.find("td:eq(3)").html('<input type="checkbox" name="activo_row_-1" id="activo_row_-1" value="S" checked disabled>');
            currentRow.find("td:eq(4)").html('<span class="glyphicon glyphicon-share"></span>   <span class="glyphicon glyphicon-trash"></span>');
           
        }

        $('#dataTables-example tbody').on( 'click', 'span.glyphicon-trash', function () {
            t
                .row( $(this).parents('tr') )
                .remove()
                .draw(false);

        } );
    

        $( "#addRow" ).click(function() {
            addRow();
        });

        /*
        LIFE SAVER
        function editRow ( t, nRow )
        {
            var aData = t.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" value="'+aData[0]+'">';
            jqTds[1].innerHTML = '<input type="text" value="'+aData[1]+'">';
            jqTds[2].innerHTML = '<input type="text" value="'+aData[2]+'">';
            jqTds[3].innerHTML = '<input type="text" value="'+aData[3]+'">';
            jqTds[4].innerHTML = '<input type="text" value="'+aData[4]+'">';
            jqTds[5].innerHTML = '[Save]()';
        }
       */

    });
