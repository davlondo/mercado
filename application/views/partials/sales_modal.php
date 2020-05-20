<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Modal Core CSS -->
<link href="<?php echo base_url().'sources/css/modal.css'?>" rel="stylesheet">

<!-- Trigger/Open The Modal -->
<span id="myBtn"></span>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            
            <span class="close">&times;</span>
            
            <h2>Total: </h2>
            
        </div>
        <div class="modal-body">
        <h2><span class="span-pagar">Pagado: </span> <textarea id="paySale" autofocus rows="1" cols="10" class="textarea-modal"></textarea>
        <span id="lastPrint" class="span-footerD">Finalizar</span></h2>
        </div>
        <div class="modal-footerD">
            <h2>Cambio: </h2>
        </div>
  </div>
</div>
<script src="<?php echo base_url().'sources/js/sales/sales_modal.js'?>"></script>