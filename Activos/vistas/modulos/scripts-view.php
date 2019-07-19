<script src="<?php echo(SERVERURL); ?>vistas/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/sweetalert2.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/bootstrap.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/material.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/ripples.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo(SERVERURL); ?>vistas/js/main.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/assets/js/main.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/assets/js/dashboard.js"></script>
<script src="<?php echo SERVERURL ?>vistas/assets/js/widgets.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo SERVERURL ?>vistas/assets/js/init-scripts/data-table/datatables-init.js"></script>
<script> 
    $(document).on('click','', function(){
        $('#op0').attr('disabled',true);
        $('#op1').attr('disabled',true);
    })

    //ingresar valor del select en el campo de texto
    $(document).on('change',"#cmbfinca",function(){
        var cmbfinca = $(this).val();
        if (cmbfinca != 0){
            $('#txtcodigo_finca_add').val(cmbfinca);
        }
    })

    //funcion para detectar el cambio el select de responsable en la vista savesolicitud-view.php
    $(document).on("change", "#cmbtipo", function(){
        var cmbtipo = $(this).val();
        if (cmbtipo != 0){
         $.ajax({
            url: '<?php echo SERVERURL ?>ajax/combosAJAX.php',
            type: 'post',
            data: {cmbtipo_elegido:cmbtipo},
        }).done(function(data){
            var datos = JSON.parse(data);
            var html = '<label>Subtipo producto<strong style="color: black;"></strong></label><div class="form-grupo"><div class="input-group"><div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div><select name="cmbsubtipoproducto_reg" class="form-control" id="cmbgrupo"><option value="0">Seleccione el subtipo de producto</option>';
            for (var i in datos){
                var codigo = datos[i].PKId_Subtipoactivo;
                var descripcion = datos[i].Descripcion;
                html += '<option class="form-check-input" value="'+codigo+'">'+descripcion+'</option>'
            }
            html += '</select></div></div>';
            $('#respuestasubtipo').html(html);
        })
        if (cmbtipo == 10) {
            $('#computo').show()

        }
        else{
            $('#computo').hide()
        }
    }else{
        $('#respuestasubtipo').html('<label>SubTipo Producto<strong style="color: black;"></strong></label><div class="form-grupo"><div class="input-group"><div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div><select name="cmbsubtipoproducto_reg" class="form-control" id="cmbtipo"><option value="0">Seleccione SubTipo</option></select></div></div>');
    }
})



    $(document).on("change", "#cmbfinca", function(){
     var opcion = 0;
     var cmbfinca = $(this).val();
     if (cmbfinca != 0){
        opcion = 0;
      $.ajax({
         url: '<?php echo SERVERURL ?>ajax/registrosAJAX.php',
         type: 'post',
         data: {cmbfinca_opcion:cmbfinca},
     }).done(function(data){
        console.log(data)
         var datos = JSON.parse(data);
         $('#tablaactivosfinca').load('http://192.168.0.108/login/activos/vistas/contenidos/tablaactivosfincas-view.php');
     })
    }else{
        opcion = 1;
      $.ajax({
         url: '<?php echo SERVERURL ?>ajax/registrosAJAX.php',
         type: 'post',
         data: {cmbfinca_opcion:cmbfinca},
     }).done(function(data){
        console.log(data)
         var datos = JSON.parse(data);
         $('#tablaactivosfinca').load('http://192.168.0.108/login/activos/vistas/contenidos/tablaactivosfincas-view.php');
     })     
    }
})


    $(document).on("change", "#cmbfincatraslado", function(){
     var cmbfincatraslado = $(this).val();
     if (cmbfincatraslado != 0){
      $.ajax({
         url: '<?php echo SERVERURL ?>ajax/registrosAJAX.php',
         type: 'post',
         data: {cmbfincatraslado1:cmbfincatraslado},
     }).done(function(data){
        console.log(data)
         var datos = JSON.parse(data);
         $('#tablatraslado').load('http://192.168.0.108/login/activos/vistas/contenidos/tablatraslado-view.php');
     })
 }
})


    $(document).on("input", ".numero", function(e){
        this.value = this.value.replace(/[^0-9]/g,'')
    })
    
    $('.decimales').on('keypress', function(e){
        var field = $(this);
        key = e.keyCode ? e.keyCode : e.which;

        if (key == 15) return true;
        if (key > 40 && key < 60){
            if (field.val() === "") return true;
            var existepto = (/[.]/).test(field.val());
            if (existepto === false){
                regexp = /.[0-9]{19}$/;
            }else{
                regexp = /.[0-9]{3}$/;
            }   
            return !(regexp.test(field.val()));
        }
        if (key == 46){
            if (field.val() === "") return false;
            regexp = /^[0-9]+$/;
            return regexp.test(field.val());
        }
        return false;
    });

    $('#cargaractivos').hide();

    $(document).on('change','#cmbfinca1',function(){
        var pos = $(this).val()

        if (pos != 0) {
            $.ajax({
             url: '<?php echo SERVERURL ?>ajax/registrosAJAX.php',
             type: 'post',
             data: {pos:pos},
         }).done(function(data){
             $('#modalactivos').html(data);
             $('#cargaractivos').show();

         })
     }else{
        $('#cargaractivos').hide();
    }

});

    $(document).on('click','#Eliminar',function(){
        var pos = $(this).parents('tr').find('td').html()
    });

    $(document).on('click','.tblactivosfincas tbody tr', function () {
        var nsolicitud1 = $(this).find("td").html();
        nsolicitud1 = nsolicitud1.trim();
        var nsolicitud2 = $(this).find("td:nth-child(2)").html();
        nsolicitud2 = nsolicitud2.trim();
        $('#txtcodigoproducto_add').val(nsolicitud1);
        $('#txtnombreproducto_add').val(nsolicitud2);
        $('.cerrar').click();
        
    } );

    $(document).on('click','#btnagregaractivo',function(){
        var codigo_activo = $("#txtcodigoproducto_add").val();
        codigo_activo = codigo_activo.trim();
        var nombre_activo = $("#txtnombreproducto_add").val();
        var ubicacion_activo = $("#cmbtipo").val();
        var codigo_finca_origen = $('#cmbfinca1').val();
        var codigo_finca_destino = $('#cmbfinca2').val();
        var datos = [];
        datos = [codigo_activo,nombre_activo,ubicacion_activo,codigo_finca_origen,codigo_finca_destino];
        console.log(datos);
        if (codigo_activo == 0 || ubicacion_activo == 0 || codigo_finca_origen == 0 || codigo_finca_destino == 0){
            swal(
                'Error Inesperado',
                'Para agregar un activo es necesario especificar el mismo, la ubicacion correspondiente, y la finca origen y el destino del mismo',
                'error'
                );
        }else{
           $.ajax({
            url: 'http://192.168.0.108/login/activos/vistas/contenidos/tableactivos-view.php',
            type: 'post',
            data: {datos:datos},
        }).done(function(data){
            $('#cmbfinca1').attr('disabled',true);
            $('#cmbfinca2').attr('disabled',true);
            $('#cmbfinca3').attr('disabled',true);
            $("#tabla_activos").html(data);
        })
    }
}) 
    $(document).on('click','#btnelminiaritem',function(){
        var posicion_arreglo = $(this).parents("tr").find("#txtposicion_array").val();
        console.log(posicion_arreglo);
        swal({
            title: "¿Estas Seguro?",
            text: "¿Desea eliminar el registro seleccionado?",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="fa fa-check"></i> Aceptar',
            cancelButtonText: '<i class="fa fa-times"></i> Cancelar'
        }).then(function(){
            $.ajax({
                url: '<?php echo SERVERURL ?>vistas/contenidos/tableactivos-view.php',
                type: 'post',
                data: {posicion_arreglo:posicion_arreglo},
            }).done(function(data){
                $("#tabla_activos").html(data);
            })
        })
    })  

    $(document).on('change','#cmbfinca11',function(){
        var cmbfinca = $('#cmbfinca11').find('option:selected').text();
        if (cmbfinca != 'Seleccione la finca'){
            $.ajax({
                url: '<?php echo SERVERURL ?>ajax/combosAJAX.php',
                type: 'post',
                data: {cmbfinca:cmbfinca},
            }).done(function(data){
                var datos = JSON.parse(data);
                $('#txtdocumentoresponsable').val(datos.strDocumento)
                $('#txtnombre_reponsable_asignacion').val(datos.strNombre1+' '+datos.strApellido1)
            })
        }
    })

     $(document).on('change','#cmbfinca2',function(){
        var cmbfinca = $('#cmbfinca2').find('option:selected').text();
        if (cmbfinca != 'Seleccione la finca'){
            $.ajax({
                url: '<?php echo SERVERURL ?>ajax/combosAJAX.php',
                type: 'post',
                data: {cmbfinca:cmbfinca},
            }).done(function(data){
                var datos = JSON.parse(data);
                $('#txtdocumento_reponsabletrasladorecibe').val(datos.strDocumento)
                $('#txtnombre_reponsabletrasladorecibe').val(datos.strNombre1+' '+datos.strApellido1)
            })
        }
    })
       $(document).on('change','#cmbfinca3',function(){
        var cmbfinca = $('#cmbfinca3').find('option:selected').text();
        if (cmbfinca != 'Seleccione la finca'){
            $.ajax({
                url: '<?php echo SERVERURL ?>ajax/combosAJAX.php',
                type: 'post',
                data: {cmbfinca:cmbfinca},
            }).done(function(data){
                var datos = JSON.parse(data);
                $('#txtdocumentoresponsablebaja').val(datos.strDocumento)
                $('#txtnombre_reponsablerecibebaja').val(datos.strNombre1+' '+datos.strApellido1)
            })
        }
    })


        $(document).on("blur","#txtdocumentoresponsable",function(){
        var txtdocumentoresponsable = $(this).val();
              $.ajax({
            url:'<?php echo SERVERURL ?>ajax/registrosAJAX.php',
            type:'post',
            data:{txtdocumentoresponsable:txtdocumentoresponsable},
        }).done(function(data){
            console.log(data)
            var datos = JSON.parse(data);
            if (datos == false) {
                swal(
                    'Error Inesperado!!',
                    'El Documento ingresado no tiene ninguna coincidencia en la base de datos.',
                    'error'
                );
            }
            else{
            $('#txtnombre_reponsable_asignacion').val(datos.strNombre1+' '+datos.strApellido1)
            }
        })

    })
        $(document).on("blur","#txtdocumento_reponsabletrasladorecibe",function(){
        var txtdocumentoresponsable = $(this).val();
              $.ajax({
            url:'<?php echo SERVERURL ?>ajax/registrosAJAX.php',
            type:'post',
            data:{txtdocumentoresponsable:txtdocumentoresponsable},
        }).done(function(data){
            console.log(data)
            var datos = JSON.parse(data);
            if (datos == false) {
                swal(
                    'Error Inesperado!!',
                    'El Documento ingresado no tiene ninguna coincidencia en la base de datos.',
                    'error'
                );
            }
            else{
            $('#txtnombre_reponsabletrasladorecibe').val(datos.strNombre1+' '+datos.strApellido1)
            }
        })

    })
     $(document).on("blur","#txtdocumentoresponsablebaja",function(){
        var txtdocumentoresponsable = $(this).val();
              $.ajax({
            url:'<?php echo SERVERURL ?>ajax/registrosAJAX.php',
            type:'post',
            data:{txtdocumentoresponsable:txtdocumentoresponsable},
        }).done(function(data){
            console.log(data)
            var datos = JSON.parse(data);
            if (datos == false) {
                swal(
                    'Error Inesperado!!',
                    'El Documento ingresado no tiene ninguna coincidencia en la base de datos.',
                    'error'
                );
            }
            else{
            $('#txtnombre_reponsablerecibebaja').val(datos.strNombre1+' '+datos.strApellido1)
            }
        })

    })

</script>
