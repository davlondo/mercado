$( "#fnPrint" ).click(function() {
        
    $('#myBtn').click();
    $("#myModal").css("display","block")
    $(".modal-header h2").append($('#total').text());
    //pagando= $('#pago').focus();
});

// When the user clicks on <span> (x), close the modal
$( ".close" ).click(function() {
    $("#myModal").css("display","none")
    
});

$("#lastPrint").click(function() {

    
});

function payment(){

    var pagando= $('#paySale').val();
    var suma =$('#total').text();
    var diferencia = Number(pagando) - Number(suma);
    
    if(Number(pagando)<Number(suma)){
        alert("Pago no suficiente");
        pagando= $('#paySale').focus();
    }else{
        $(".modal-footerD h2").append(diferencia);
    }

};

var pagoItem = $('#paySale');

    pagoItem.keydown(function(e){

      if ( e.keyCode == 13  && !e.shiftKey) {
        e.preventDefault();
        payment();
      }
    });