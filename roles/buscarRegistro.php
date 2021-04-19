<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Motor de busqueda de fomope SICON</title>

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />

  <!--   Fonts and icons   -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.js"></script>
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569818907/jquery.table2excel.min.js"></script>

</head>
<body>

<?php 
    include "configuracion.php";
    $busqueda = $_GET['search'];
    $usuarioSeguir =  $_GET['usuario_rol'];
    $elanio =  $_GET['elanio'];
    $laqnia =  $_GET['laqnia'];

    if($laqnia>=1 AND $elanio>=1){
      $sql = "SELECT * FROM fomope WHERE (quincenaAplicada LIKE '%$laqnia%' AND anio LIKE '%$elanio%')";
      
    }elseif($laqnia>=1 OR $elanio>=1){
      $sql = "SELECT * FROM fomope WHERE (quincenaAplicada LIKE '%$laqnia%' OR anio LIKE '%$elanio%')";
    }else{
    $sql = "SELECT * FROM fomope WHERE (id_movimiento LIKE '%$busqueda%' OR color_estado LIKE '%$busqueda%' OR usuario_name LIKE '%$busqueda%' OR unidad LIKE '%$busqueda%' OR rfc LIKE '%$busqueda%' OR curp LIKE '%$busqueda%' OR apellido_1 LIKE '%$busqueda%' OR apellido_2 LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR fechaIngreso LIKE '%$busqueda%' OR oficioEntrega LIKE '%$busqueda%' OR tipoEntrega LIKE '%$busqueda%' OR tipoDeAccion LIKE '%$busqueda%' OR justificacionRechazo LIKE '%$busqueda%' OR quincenaAplicada LIKE '%$busqueda%' OR anio LIKE '%$busqueda%' OR oficioUnidad LIKE '%$busqueda%' OR fechaOficio LIKE '%$busqueda%' OR fechaRecibido LIKE '%$busqueda%' OR codigo LIKE '%$busqueda%' OR n_puesto LIKE '%$busqueda%' OR clavePresupuestaria LIKE '%$busqueda%' OR codigoMovimiento LIKE '%$busqueda%' OR descripcionMovimiento LIKE '%$busqueda%' OR vigenciaDel LIKE '%$busqueda%' OR vigenciaAL LIKE '%$busqueda%' OR entidad LIKE '%$busqueda%' OR consecutivoMaestroPuestos LIKE '%$busqueda%' OR puestos LIKE '%$busqueda%' OR observaciones LIKE '%$busqueda%' OR fechaEnviadaRubricaDspo LIKE '%$busqueda%' OR fechaEnviadaRubricaDipsp LIKE '%$busqueda%' OR fechaEnviadaRubricaDgrho LIKE '%$busqueda%' OR fechaRecepcionSpc LIKE '%$busqueda%' OR fechaEnvioSpc LIKE '%$busqueda%' OR fechaReciboDspo LIKE '%$busqueda%' OR folioSpc LIKE '%$busqueda%' OR fechaCapturaNomina LIKE '%$busqueda%' OR fechaEntregaArchivo LIKE '%$busqueda%' OR fechaEntregaRLaborales LIKE '%$busqueda%' OR OfEntregaRLaborales LIKE '%$busqueda%' OR fomopeDigital LIKE '%$busqueda%' OR fechaEntregaUnidad LIKE '%$busqueda%' OR OfEntregaUnidad LIKE '%$busqueda%' OR fechaAutorizacion LIKE '%$busqueda%' OR analistaCap LIKE '%$busqueda%' OR fechaCaptura LIKE '%$busqueda%' OR qnaDeAfectacion LIKE '%$busqueda%' OR usuarioAdjuntarDoc LIKE '%$busqueda%' OR idProfesionalCarrera LIKE '%$busqueda%' OR fechaValidacionPersonal LIKE '%$busqueda%')";
  }
    $result=mysqli_query($conexion,$sql);

?>

<div class="wrapper">
   <!--   home   -->
  <a  href= <?php echo ("../roles/menuPrincipal.php?usuario_rol=".$usuarioSeguir);?>>
    <div class="logo-container full-screen-table-demo">
      <div class="logo">
        <img src="assets/img/result.png">
      </div>
      <div class="brand">
       SICON
      </div>
         

  </a>

   <div class="col-md-6 text-center"> <button id="exporttable" class="btn btn-success">Exportar Excel</button> </div>
    </div>
 
  <div class="fresh-table toolbar-color-red full-screen-table">

  <!--
    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
  -->
    <table id="fresh-table" class="table" data-show-export="true">
      <thead>
        <th style="display: none;"></th>
               <th data-sortable="true">RFC</th>
                  <th data-sortable="true">Estado FOMOPE</th>
                  <th data-sortable="true">Unidad</th>
                  <th data-sortable="true">Última modificación</th>
                   <th data-sortable="true">Movimiento</th>
                   <th data-sortable="true">Entrega operados a la unidad</th>
                   <th data-sortable="true">Entrega expediente relaciones laborales</th>
                   <th data-sortable="true">Envío a validación</th>
                   <th data-sortable="true">Fomope Loteado y Firmado</th>
      </thead>
      <tbody>
                  <?php


              $sqlColor="SELECT colorAsignado FROM usuarios WHERE usuario='$usuarioSeguir'";

              $idMatriz = 0;
              $imprimirNoExiste = 0;
              if ($result = mysqli_query($conexion,$sql)) {

                $totalFilas    =    mysqli_num_rows($result);  
                if($totalFilas == 0){
                    $imprimirNoExiste ++;
                    $matriz[0][0] = 0;
                    echo('
                              <br>
                              <br>
                              <div class="col-sm-12 ">
                              <div class="plantilla-inputv text-dark">
                                  <div class="card-body"><h2 align="center">No existe resultados de la busqueda, vuelve intentar.</h2></div>
                            </div>
                            </div>');
                  //  $matrizEventuales = queryEventual($sql2,$imprimirNoExiste);
                }else{


                  while($ver=mysqli_fetch_row($result)){ 

                    if($ver[1] == 'negro1'){

                      $ver[1] = 'DDSCH Rechazo';
                    }elseif($ver[1] == 'negro'){

                      $ver[1] = 'Unidad Edición';
                    }elseif($ver[1] == 'amarillo'){

                      $ver[1] = 'DSPO captura';
                    }elseif($ver[1] == 'amarillo0'){

                      $ver[1] = 'DDSCH Autorizacion';
                    }elseif($ver[1] == 'cafe'){

                      $ver[1] = 'DSPO Autorizacion';
                    }elseif($ver[1] == 'naranja'){

                      $ver[1] = 'DIPSP Autorizacion';
                    }elseif($ver[1] == 'azul'){

                      $ver[1] = 'DGRHO Autorizacion';
                    }elseif($ver[1] == 'rosa'){

                      $ver[1] = 'DSPO nomina';
                    }elseif($ver[1] == 'verde'){

                      $ver[1] = 'DDSCH loteo';
                    }elseif($ver[1] == 'verde2'){

                      $ver[1] = 'DDSCH Autorizacion';
                    }elseif($ver[1] == 'gris'){

                      $ver[1] = 'DDSCH Edición';
                    }elseif($ver[1] == 'guinda'){

                      $ver[1] = 'Finalizado';
                    }
             ?>
            <tr id="<?php echo $ver[0] ?>">
                <td><?php echo ""

              ?>
              </td>
              <td><?php echo $ver[4] ?></td>
              <td>
        <!-- activamos funcion de .ajax para poder mostrar el histirial del proceso del fomope   -->
              <button type="button"  onclick="guardarId(<?php echo $ver[0]; ?>)"  id="verHistorial" name="verHistorial" class='btn' data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap"><?php echo $ver[1] ?></button>
              </td>
              <td><?php echo $ver[3] ?></td>
              <td><?php echo $ver[44] ?></td>
              <td><?php echo $ver[23] ?></td>
              <td><?php echo $ver[42] ?></td>
              <td><?php echo $ver[39] ?></td>
              <td><?php echo $ver[125] ?></td>
              <td>
                <?php
                  if(!empty($ver[126])){
                ?>
                    <button class="btn btn-success" > ✔ </button>
                <?php
                  }else{
                ?>

                    <button class="btn btn-danger" > X </button>
                <?php
                  }
                ?>
              </td>
              
            
        
            </tr>
            <?php 
              //$matriz = array($idMatriz => $ver[0] );
              $matriz[$idMatriz]= $ver[0];              
              $idMatriz++;
              }
            }
            //$imprimirNoExiste++;

            
            
            }else{
              echo '<script type="text/javascript">alert("Error en la conexion");</script>';
              echo '<script type="text/javascript">alert("error '. mysqli_error($conexion).'");</script>';
            }
    

?>
     </tbody>
    </table>
  </div>
</div>




<script>
  var $table = $('#fresh-table')

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row))
      console.log(value, row, index)
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

  function operateFormatter(value, row, index) {
    return [
      '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
        '<i class="fa fa-heart"></i>',
      '</a>',
      '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
        '<i class="fa fa-edit"></i>',
      '</a>',
      '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
        '<i class="fa fa-remove"></i>',
      '</a>'
    ].join('')
  }

  $(function () {
    $table.bootstrapTable({
      classes: 'table table-hover table-striped',
      toolbar: '.toolbar',

      search: true,
      showRefresh: true,
      showToggle: true,
      showColumns: true,
      pagination: true,
      striped: true,
      sortable: true,
      showExport: true,

      height: $(window).height(),
      pageSize: 25,
      pageList: [25, 50, 100],

      formatShowingRows: function (pageFrom, pageTo, totalRows) {
        return ''
      },
      formatRecordsPerPage: function (pageNumber) {
        return pageNumber + ' rows visible'
      }
    })


    $(window).resize(function () {
      $table.bootstrapTable('resetView', {
        height: $(window).height()
      })
    })
  })

 

  

  
$("#exporttable").click(function(){
$("#fresh-table").table2excel({
exclude: ".noExl",
name: "Excel Document",
filename: "ConsultaEstado.xls",
fileext: ".xls",
exclude_img: true,
exclude_links: true,
exclude_inputs: true,
preserveColors: false
});
});

</script>



</body>

</html>
