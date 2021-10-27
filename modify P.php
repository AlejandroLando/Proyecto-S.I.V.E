<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- css de boostrap-->
    <link rel="stylesheet" href="bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <!--otros css-->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/vender.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>crear un producto</title>
</head>
<body>
    <header>
      <script src="js/funciones.js"></script>
      <script src="js/header.js"></script>
    </header>
    <?php
    include("php/conexion.php");
    include("php/empresF.php");
    session_start();
     if (isset($_GET['Rut']) && isset($_GET['idp'])){
        $conexion = abrirConexion();
        $Rut = $_GET['Rut'];
        $idp = $_GET['idp'];
        $datos =obtenerusuarioRut($conexion, $Rut);
        $oldP = $datos['Contrasena'];
        cerrarConexion($conexion);
    ?>
    <section class="container">
        <div class="caja-producto">
            <h1>Nuevo Producto</h1>
            <form enctype="multipart/form-data" action="registerp.php" method="post" class="row g-3 needs-validation" novalidate>
              <input type="hidden" name="idproducto" value="0">
                <div class="col-12">
                  <label class="form-label" for="validationCustom01">Nombre del Producto:</label>
                  <!--* Al ingresar el required en el input nos enviará una alerta si detecta el campo vacio -->
                  <!--* Con el pattern="[a-z]{3,20}" restringimos los rangos de caracteres a chequear y solo letras -->
                  <!--* Autofus permite posicionar el cursos en un input al cargar el formulario -->
                  <input type="text" class="form-control" id="validationCustom01" autofocus required pattern="[a-zA-Z0-9]{5,50}" placeholder="ProductoX" name="nombre_producto">
                  <div class="valid-feedback">
                    Nombre OK!
                  </div>
                  <div class="invalid-feedback">
                    Los nombres solo pueden contener letras minusculas con un minimo de 5 caracteres y un maximo de 50 caracteres
                  </div>  
                </div>

                <div class="col-mb-3">
                    <label class="form-label" for="validationCustom02">Imagenes del Producto:</label>
                    <input type="Hidden" name="MAX_FILE_SIZE" value="5120000">
                    <input id="validationCustom02" class="form-control" autofocus required name="archivo[]" type="file" accept="image/*,.webp" multiple="">
                    <div class="valid-feedback">
                      OK!
                    </div>
                    <div class="invalid-feedback">
                      Por lo menos debe tener una imagen para tu producto
                    </div> 
                  </div>
                <div class="col-md-6">
                  <!--tipo de producto-->
                  <label class="form-label" for="validationCustom03">Tipo de Producto:</label>
                  <select id="validationCustom03" class="form-select" name="categoria" required>
                    <option selected disabled value="">Categoria...</option>
                    <!--1-->
                      <option value ="hogar">Productos Domesticos</option>
                    <!--2-->
                      <option value ="vestimenta">Vestimenta</option>
                    <!--3-->
                      <option value ="deporte">Deportes</option>
                    <!--4-->
                      <option value ="nutrición">Nutrición</option>
                    <!--5-->
                      <option value ="inmuebles">Inmuebles</option>
                    <!--6-->
                      <option value ="vehículos">Vehículos</option>
                    <!--7-->
                      <option value ="servicios">Servicios</option>
                    <!--8-->
                      <option value ="tecnología">Tecnología</option>
                    <!--9-->
                      <option value ="electrodomésticos">Electrodomésticos</option>
                    <!--10-->
                      <option value ="software">Software</option>
                    <!--11-->
                      <option value ="hardware">Hardware</option>
                    <!--12-->
                      <option value ="arte">Artes</option>
                  </select>
                  <div class="valid-feedback">
                   
                  </div>
                  <div class="invalid-feedback">
                    Debes ponerle una Categoria a tu producto
                  </div>
                </div>
                <div class="col-md-6">
                    <!--condicion de producto-->
                    <label class="form-label" for="validationCustom04">Codición del producto:</label>
                    
                    <select class="form-select" id="validationCustom04" name="condicion" required>
                      <option selected disabled value="">Condición...</option>
                      <option value="Nuevo">Nuevo</option>
                      <option value="Restaurado">Restaurado</option>
                      <option value="Usado">Usado</option>
                    </select>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                     Ponerle una Condicion a tu producto es Obligatorio
                    </div>
                </div>
                <div class="col-md-4">
                  <!--condicion de producto-->
                  <label class="form-label" for="validationCustom05">Nacionalidad:</label>
                  <select class="form-select" name="nacionalidad" id="validationCustom05" required>
                    <option selected disabled value="">El pais...</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Chile">Chile</option>
                    <option value="Peru">Peru</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Ecuador">Ecuador</option>
                  </select>
                 
                  <div class="valid-feedback">
                  </div>
                  <div class="invalid-feedback">
                  Es Obligatorio su Nacionalidad
                  </div>
              </div>
                <div class="col-md-4">
                    <label class="form-label" for="validationCustom06">Precio:</label>
                    <input type="text" class="form-control" id="validationCustom06" name="precio" pattern="[0-9]{1,}.[0-9]{1,2}" required autofocus>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                    Debes establecer un precio en numeros decimales. 
                    Ejemplo: 10.00
                    </div>
                </div>
                
                <div class="col-md-4">
                  <label class="form-label" for="validationCustom07" >Cantidad:</label>
                  <input type="text" class="form-control" id="validationCustom07" pattern="[0-9]{1,9}" maxlength="9" name="cantidad" required autofocus>
                  <div class="valid-feedback">
                  </div>
                  <div class="invalid-feedback">
                  la minima es de 1 y la maxima es de 999999999
                  </div>
                </div>
                
                <div class="col-mb-3">
                    <label class="form-label" for="validationTextarea" >Descripción:</label>
                    <textarea class="form-control is-invalidCheck" rows="3" name="descripcion" id="validationTextarea" pattern="{,400}" required placeholder="Descripcion..........."></textarea>
                    <div class="valid-feedback">
                    </div>
                    <div class="invalid-feedback">
                     Debe dar una descripcion simple del producto
                    </div>
                  </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true"id="invalidCheck" required name="terminos">
                    <label class="form-check-label" for="invalidCheck">
                      Acepto los Terminos y Condiciones
                    </label>
                    
                    <div class="invalid-feedback">
                      Debes estar de acuerdo con los terminos y condiciones, Sino no podes Registrar un Producto!
                    </div>
          
                  </div>
                </div> 
                <div class="d-grid gap-2" style="text-align: center;">
                  <button type="submit" class="btn btn-lg btn-primary" >Publicar</button>
                </div>
              </form>
              <br>
              
            </div>
        </div>
    </section>
    <?php
      }else{
          echo "<div class='container' align= 'center'><h1>ERROR</h1></div>";
      }
    ?>
    <script>
      // Ejemplo de JavaScript de inicio para deshabilitar el envío de formularios si hay campos no válidos
      (function () {
        'use strict'

        //Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
        // Buscamos la clase .needs-validation en el DOM (documento)
        var forms = document.querySelectorAll('.needs-validation')

        // Bucle sobre ellos y evitar la presentación
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }else{
                       alert('Datos Validados Correctamente !!')
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()

      </script>
    
    <!--footer-->
    <footer>
        <script src="js/footer.js"></script>
      </footer>

    <!-- scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
</body>
</html>