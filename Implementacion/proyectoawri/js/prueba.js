$(document).ready(function(){
    var errores = 0; // Cuenta si hay errores en el formulario
    var cantidadLlamadas = 0; //Verifica que por lo menos se cliqueo el campo de usuario, para que empiece a contar los errores
    var cedula = '';
    window.passIncorrecto = false;
    window.passError = false;
    window.passRepeat = false;
    window.loginBecarioContrasena = false;
    window.loginBecarioUsuario = false;
    
    
    /*IMPORTANTE PARA HACER VALIDACIONES:
     *EJEMPLO GUIA:
     *$(#loginAdmon).->corresponde al id asignado en la vista al boton del formulario que finaliza el evento
     *getElementbyId-> corresponde al id asignado al div  en la vista que aparece debajo del input a validar
     en donde saldra el mensaje de error
     *formulario.cedula.value-> "cedula" corresponde al name asignado al input en la vista
     *
     **/
    
    
    /*VALIDACIONES INICIAR SESION ESTUDIANTE*/	
    /* 
     *generar programa academico en inicio sesion estudiante
     *validaciones inicio sesion estudiante
     *vista(s) donde se usa:formsInicio/loginEstudiante
     */	
    $('#codUsuario').bind('blur', function()
    {
        cantidadLlamadas++;
        var divCodigo = document.getElementById('codigoUsuario');
        var divPrograma=document.getElementById('programaAcademico');
        var codigo = $(this).val();
        var datos = {
            codigo_usuario: codigo
        };
        $.ajax({
            url: "estudiante/validacionAjax",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    errores++;
                    divCodigo.innerHTML = "Campo obligatorio";
                    divPrograma.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        errores++;
                        divCodigo.innerHTML = 'El usuario no existe.';
                        divPrograma.innerHTML = '';
                       
                    }
                    else{
                        if(msg == 'inactivo'){
                            errores++;
                            divCodigo.innerHTML='El usuario se encuentra inactivo';
                            divPrograma.innerHTML='';
                            
                        }
                        else{
                            if(msg > 0){
                                errores = 0;
                                divCodigo.innerHTML = '';
                                divPrograma.innerHTML =msg;
                               
                            }
                        }
                        
                        
                    }
                }
                 
            }
            
        });
        
    });
    
    /*
     *evento boton de inicio sesion administrador despues de haber hecho validaciones
     *vista(s) donde se usa: formsInicio/loginAdministrador
     */
    $('#boton').click(function(){
        if(errores == 0 && cantidadLlamadas > 0){
            document.forms[0].submit();//Como no hay mas formularios se pone 0 y listo
        }
    });
    
    
    /*VALIDACIONES INICIAR SESION ADMINISTRADOR*/
    /*
     *validaciones inicio sesion administrador
     *vista(s) donde se usa: formsInicio/loginAdministrador        
     */
    $('#loginAdmon').click(function(){
        var divError = document.getElementById('errorLogin');
        var divCaptcha = document.getElementById('captchaAdministrador');
        var cedula = document.formulario.cedula.value;
        var contrasena = document.formulario.contrasena.value;
        var captcha = document.formulario.captcha.value;
        var datos = {
            cedAdmin: cedula,
            contAdmin: contrasena
        };
        
        $.ajax({
            url: 'administrador/validacionUsuarioAjax',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'false'){
                    divError.innerHTML = '';
                    divError.innerHTML = 'Usuario o contrase&ntilde;a incorrectos.';
                    window.errorUsuario = false;
                }
                else{
                    divError.innerHTML = '';
                    window.errorUsuario = true;
                }
            }
        });
        
        var datosCaptcha = {
            captchaAdmin: captcha
        };
        $.ajax({
            url: 'administrador/validacionCaptchaAjax',
            type: 'POST',
            data: datosCaptcha,
            success: function(msg){
                if(msg == 'false'){
                    divCaptcha.innerHTML = '';
                    divCaptcha.innerHTML = 'Caracteres incorrectos.'
                    window.errorCaptcha = false;
                }
                else{
                    divCaptcha.innerHTML = '';
                    if(window.errorUsuario == true){
                        document.forms['formulario'].submit();
                    }
                   
                }
            }
        });
        
    });
    
   
    /*VALIDACIONES CAMBIAR CONTRASEÑA ADMINISTRADOR*/
    /*
     *validaciones cambio contraseña administrador
     *vista(s) donde se usa: formsAdministrador/cambioContrasena
     */
    $('#contVieja').bind('blur', function(){
        var contrasenaActual = $(this).val();
        var divContrasenaActual = document.getElementById('contrasenaActual');
        var datos = {
            contActual: contrasenaActual  
        };
        $.ajax({
            url: '../inicioAdministrador/checkPassAjax',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'false'){
                    divContrasenaActual.innerHTML = '';
                    divContrasenaActual.innerHTML = 'Contrase&ntilde;a incorrecta.'
                    window.passIncorrecto = false;
                }
                else{
                    if(msg == 'true'){
                        divContrasenaActual.innerHTML = '';
                        window.passIncorrecto = true;
                    }
                }
            }
        });
    });
    
    function tiene_numeros(texto){
        var numeros="0123456789";
        for(i=0; i<texto.length; i++){
            if (numeros.indexOf(texto.charAt(i),0)!=-1){
                return true;
            }
        }
        return false;
    }
    
    function tiene_caracteres(texto){
        var numeros="¡?¿·`¨_´^!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
        for(i=0; i<texto.length; i++){
            if (numeros.indexOf(texto.charAt(i),0)!=-1){
                return true;
            }
        }
        return false;
    }
    
    /*
     *validaciones contraseña nueva administrador
     *vista(s) donde se usa: formsAdministrador/cambioContrasena
     */
    $('#contNueva').bind('blur', function(){
        var contrasenaNueva = $(this).val();
        var divContrasenaNueva = document.getElementById('contrasenaNueva');
        if(contrasenaNueva.length < 6){
            divContrasenaNueva.innerHTML = '';
            divContrasenaNueva.innerHTML = 'Contrase&ntilde;a muy corta. Minimo 6 caracteres.';
            window.passError = false;
        }
        else{
            if(tiene_numeros(contrasenaNueva) && tiene_caracteres(contrasenaNueva)){
                divContrasenaNueva.innerHTML = '';
                window.passError = true;
            }
            else{
                divContrasenaNueva.innerHTML = '';
                divContrasenaNueva.innerHTML = 'Debe tener minimo un caracter especial y un numero.'
                window.passError = false;
            }
            
        }
        
    });
    
    /*
     *validaciones repetir ingreso contraseña nueva de administrador
     *vista(s) donde se usa: formsAdministrador/cambioContrasena
     */
    $('#contNueva2').bind('blur', function(){
        var contrasenaNueva2 = $(this).val();
        var divContrasenaNueva2 = document.getElementById('contrasenaNueva2');
        var contrasenaNueva = document.fomularioContrasena.contNueva.value;
        if(contrasenaNueva2 !=  contrasenaNueva)
        {
            divContrasenaNueva2.innerHTML = '';
            divContrasenaNueva2.innerHTML = 'Las contrase&ntilde;as no coinciden.'
            window.passRepeat = false;
        }
        else{
            divContrasenaNueva2.innerHTML = '';
            window.passRepeat = true;
        }
    });
    
    /*
     *evento boton cambiar contrasena administrador
     *vista(s) donde se usa: formsAdministrador/cambioContrasena
     */
    $('#confirmarCont').click(function(){
        if(window.passIncorrecto && window.passError && window.passRepeat){
            document.forms['fomularioContrasena'].submit();
        }
    });
    
	
        
    /*VALIDACIONES RECUPERAR CONTRASEÑA ADMINISTRADOR */
    /*
     *validaciones recuperar contraseña administrador
     *vista(s) donde se usa: formsInicio/rescuperarContrasena
     */
    $('#recuperarCont').click(function(){
        var divRecuperarContrasena = document.getElementById('recuperarContrasena');
        var cedula = document.formRecuperacion.cedulaRe.value;
        var datos = {
            cedula: cedula
        };
        if(cedula == ''){
            divRecuperarContrasena.innerHTML = '';
            divRecuperarContrasena.innerHTML = 'Campo obligatorio.';
        }
        else{
            $.ajax({
                url: 'recuperarContrasena/validarAjax',
                type: 'POST',
                data: datos,
                success: function(msg){
                    if(msg == 'false'){
                        divRecuperarContrasena.innerHTML = '';
                        divRecuperarContrasena.innerHTML = 'El usuario no existe.';
                    }
                    else{
                        if(msg == 'true'){
                            divRecuperarContrasena.innerHTML = '';
                            document.forms['formRecuperacion'].submit();
                        }
                    }
                }
            });
        }
        
    });
    
    
    /*VALIDACIONES INICIO SESION BECARIO*/
    /*
     *validaciones ingreso de codigo becario
     *vista(s) donde se usa: formsInicio/loginBecario
     *                       
     */
    $('#codUsuarioBecario').bind('blur', function(){
        var divCodigo = document.getElementById('codigoUsuario');
        var codigo = $(this).val();
        var datos = {
            usuario: codigo
        };
        $.ajax({
            url: 'becario/validarCodigo',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = '';
                    divCodigo.innerHTML = 'Campo obligatorio.'
                    window.loginBecario = false;
                }
                else{
                    if(msg == 'false'){
                        divCodigo.innerHTML = '';
                        divCodigo.innerHTML = 'El usuario no existe.'
                        window.loginBecario = false;
                    
                    }
                    else{
                        if(msg == 'true'){
                            divCodigo.innerHTML = '';
                            window.loginBecario = true;
                        }
                    }
                }
                
            }
        });
    });
    
    /*
     *validaciones ingreso de contraseña becario
     *vista(s) donde se usa: formsInicio/loginBecario
     */
    $('#contrasena').bind('blur', function(){
        var contrasena = $(this).val();
        var usuario = document.registrobecario.codUsuarioBecario.value;
        var divContrasena = document.getElementById('contrasenamsg');
        var datos = {
            contrasena: contrasena,
            usuario: usuario
        };
        $.ajax({
            url: 'becario/validarContrasena',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divContrasena.innerHTML = '';
                    divContrasena.innerHTML = 'Campo obligatorio.'
                    window.loginBecarioContrasena = false;
                }
                else{
                    if(msg == 'false'){
                        divContrasena.innerHTML = '';
                        divContrasena.innerHTML = 'Contrase&ntilde;a incorrecta.'
                        window.loginBecarioContrasena = false;
                    
                    }
                    else{
                        if(msg == 'true'){
                            divContrasena.innerHTML = '';
                            window.loginBecarioContrasena = true;
                        }
                    }
                }
                
            }
        });
    });
    
    /*
     *evento boton de inicio sesion becario despues de haber hecho validaciones
     *vista(s) donde se usa: formsInicio/loginBecario
     */
    $('#inicioBecario').click(function(){
        if(window.loginBecario == true && window.loginBecarioContrasena == true){
            document.forms['registrobecario'].submit();
        }
    });
    
   
    /*ACTUALIZAR ESTUDIANTE SESION BECARIO*/
    /*Actualizar: aparecer datos automaticamente*/
    $('#codUsuarioEstudiante').bind('blur', function(){
        var divCodigo = document.getElementById('codigoUsuario');
        var divTelefono=document.getElementById('telefono');
        var divDireccion=document.getElementById('direccion');
        var divCorreo=document.getElementById('correo');
        var codigo = document.formulario.codUsuarioEstudiante.value;
        var datos = {
            codigo_usuario: codigo
        };
        
        $.ajax({
            url: "../becarioGestion/validacionAjaxTelefono",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                  
                    divTelefono.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divTelefono.innerHTML = '';
                      
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divTelefono.innerHTML = "<input type='text' id='telUsuario' name='telUsuario'>";                              
                       
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divTelefono.innerHTML ="<input type='text' value="+msg+" id='telUsuario' name='telUsuario'>";
                              
                              
                            }  
                    
                    
                        }
                 
                    }
                }
            }    
        });
        
        
        $.ajax({
            url: "../becarioGestion/validacionAjaxDireccion",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                   
                    divDireccion.innerHTML = '';
                    
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divDireccion.innerHTML = '';
                        
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divDireccion.innerHTML = "<input type='text' id='dirUsuario' name='dirUsuario'>";
                           
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divDireccion.innerHTML ="<input type='text' value="+msg+" id='dirUsuario' name='dirUsuario'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
        
        
        $.ajax({
            url: "../becarioGestion/validacionAjaxCorreo",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";
                    divCorreo.innerHTML = '';
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                       
                        divCorreo.innerHTML = '';
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divCorreo.innerHTML = "<input type='text' id='correoUsuario' name='correoUsuario'>";
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divCorreo.innerHTML ="<input type='text' value="+msg+" id='correoUsuario' name='correoUsuario'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
    });
	
    $('#actualizarEstudiante').click(function(){
        var codigo = document.formulario.codUsuarioEstudiante.value;
        var telefono = document.formulario.telUsuario.value;
        var direccion = document.formulario.dirUsuario.value;
        var correo = document.formulario.correoUsuario.value;
        var divCodigo = document.getElementById('codigoUsuario');
        var divTelefono = document.getElementById('errorTelefono');
        var divDireccion = document.getElementById('errorDireccion');
        var divCorreo = document.getElementById('errorCorreo');
        window.errorCodigo=false;
        window.errorTel=false;
        window.errorDir=false;
        window.errorCorreo=false;
        
        var datos = {
            correo: correo
        };
        
        if(codigo == ''){
            divCodigo.innerHTML = '';
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo=false;
        }
        else{
            divCodigo.innerHTML = '';
            window.errorCodigo=true;
        }
        if(telefono == ''){
            divTelefono.innerHTML = '';
            divTelefono.innerHTML = 'Campo obligatorio';
            window.errorTel=false;
        }
        else{
            if(isNaN(telefono)){
                divTelefono.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel=false;
            }
            else{
                divTelefono.innerHTML = '';
                window.errorTel=true;
            }
        }
        if(direccion == ''){
            divDireccion.innerHTML = '';
            divDireccion.innerHTML = 'Campo obligatorio';
            window.errorDir=false;
        }
        else{
            divDireccion.innerHTML = '';
            window.errorDir=true;
        }
        if(correo == ''){
            divCorreo.innerHTML = '';
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo=false;
        }
        else{
            divCorreo.innerHTML = '';
            $.ajax({
                url: "../becarioGestion/validacionActualizar",
                type: 'POST',
                data: datos,
                success: function(msg){
                    if(msg == 'errorEmail'){
                        divCorreo.innerHTML = '';
                        divCorreo.innerHTML = "Correo invalido";
                        window.errorCorreo=false;
                    
                    }else{
                        if(msg == 'okEmail'){
                            divCorreo.innerHTML = '';
                            window.errorCorreo=true;
                            if(window.errorCodigo == true && window.errorDir == true && window.errorTel == true && window.errorCorreo == true){
                                document.forms['formulario'].submit();
                            }
                        
                        }
                    }
                }    
            });
        }
        
    });
    
       
    
    
    
    
    
    
    /*VALIDACIONES ADICIONAR FUNCIONARIO SESION BECARIO*/
    
    /*
     *validaciones de activar/adicionar funcionario en sesion becario
     *vista(s) donde se usa: formsInicio/datosParaActivarFuncionario
     */
    $('#adicionarFuncionario').click(function(){
        var cedula = document.formulario.cedula.value;
        var nombre = document.formulario.nombre.value;
        var telefono1 = document.formulario.telefono1.value;
        var telefono2 = document.formulario.telefono2.value;
        var correo = document.formulario.correo.value;
        var divCedula = document.getElementById('mcedula');
        var divNombre = document.getElementById('mnombre');
        var divTelefono1 = document.getElementById('mtelefono1');
        var divTelefono2 = document.getElementById('mtelefono2');
        var divCorreo = document.getElementById('mcorreo');
        window.errorCedula = false;
        window.errorNombre = false;
        window.errorTel1 = false;
        window.errorTel2 = false;
        window.errorCorreo = false;
        var datos = {
            cedula: cedula,
            nombre: nombre,
            telefono1: telefono1,
            telefono2: telefono2,
            correo: correo
        };
        var datos2 = {
            cedula: cedula
            
        };
        if(cedula == ''){
            divCedula.innerHTML = '';
            divCedula.innerHTML = 'Campo obligatorio';
            window.errorCedula = false;
        }
        else{
            if(isNaN(cedula)){
                divCedula.innerHTML = 'La cedula solo puede contener numeros';
                window.errorCedula = false;
            }
            else{
                $.ajax({
                    url: "../becarioGestion/verificarCedulaUnica",
                    type: 'POST',
                    data: datos2,
                    success: function(msg){
                        if(msg == 'false'){
                            divCedula.innerHTML = '';
                            divCedula.innerHTML = 'La cedula ya se encuentra registrada';
                            window.errorCedula = false;
                    
                        }else{
                            if(msg == 'true'){
                                divCedula.innerHTML = '';
                                window.errorCedula = true;
                        
                            }
                        }
                    }    
                });
            }
        }
        
        if(nombre == ''){
            divNombre.innerHTML = '';
            divNombre.innerHTML = 'Campo obligatorio';
            window.errorNombre = false;
        }
        else{
            divNombre.innerHTML = '';
            window.errorNombre = true;
        }
        if(telefono1 == ''){
            divTelefono1.innerHTML = '';
            divTelefono1.innerHTML = 'Campo obligatorio';
            window.errorTel1 = false;
        }
        else{
            if(isNaN(telefono1)){
                divTelefono1.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel1 = false;
            }
            else{
                divTelefono1.innerHTML = '';
                window.errorTel1 = true;
            }
        }
        if(telefono2 == ''){
            divTelefono2.innerHTML = '';
            divTelefono2.innerHTML = 'Campo obligatorio';
            window.errorTel2 = false;
        }
        else{
            if(isNaN(telefono2)){
                divTelefono2.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel2 = false;
            }
            else{
                divTelefono2.innerHTML = '';
                window.errorTel2 = true;
            }
        }
        if(correo == ''){
            divCorreo.innerHTML = '';
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo = false;
        }
        else{
            divCorreo.innerHTML = '';
            $.ajax({
                url: "../becarioGestion/validacionActualizar",
                type: 'POST',
                data: datos,
                success: function(msg){
                    if(msg == 'errorEmail'){
                        divCorreo.innerHTML = '';
                        divCorreo.innerHTML = "Correo invalido";
                        window.errorCorreo=false;
                    
                    }else{
                        if(msg == 'okEmail'){
                            divCorreo.innerHTML = '';
                            window.errorCorreo=true;
                            if(window.errorCedula == true && window.errorNombre == true && window.errorTel1 == true && window.errorTel2 == true && window.errorCorreo == true){
                                document.forms['formulario'].submit();
                            }
                        
                        }
                    }
                }    
            });
        }
        
    });
	
    /*VALIDACIONES ADICIONAR ESTUDIANTE SESION BECARIO*/
    /*
     *validaciones de activar/adicionar estudiante en sesion becario
     ***vista(s) donde se usa: formsInicio/datosParaActivarEstudiante
     */
    $('#adicionarEstudiante').click(function(){
        var codigo = document.formulario.codigo.value;
        var programa = document.formulario.programa.value;
        var nombre = document.formulario.nombre.value;
        var telefono = document.formulario.telefono.value;
        var direccion = document.formulario.direccion.value;
        var correo = document.formulario.correo.value;
        var divCodigo = document.getElementById('codigoUsuario');
        var divPrograma = document.getElementById('mprograma');//pendiente validacion si se cambia a combobox
        var divNombre = document.getElementById('mnombre');
        var divTelefono = document.getElementById('mtelefono');
        var divDireccion = document.getElementById('mdireccion');
        var divCorreo = document.getElementById('mcorreo');
        window.errorCodigo = false;
        window.errorPrograma = false;
        window.errorNombre = false;
        window.errorTel = false;
        window.errorDireccion = false;
        var datos = {
            codigo: codigo,
            programa: programa,
            nombre: nombre,
            telefono: telefono,
            direccion: direccion,
            correo: correo
        };
        var datos2 = {
            codigo: codigo
            
        };
        if(codigo == ''){
            divCodigo.innerHTML = '';
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo = false;
        }
        else{
            if(isNaN(codigo)){
                divCodigo.innerHTML = 'El codigo solo puede contener numeros';
                window.errorCodigo = false;
            }
            else{
                $.ajax({
                    url: "../becarioGestion/verificarCodigoUnico",
                    type: 'POST',
                    data: datos2,
                    success: function(msg){
                        if(msg == 'false'){
                            divCodigo.innerHTML = '';
                            divCodigo.innerHTML = 'El codigo ya se encuentra registrado';
                            window.errorCodigo = false;
                    
                        }else{
                            if(msg == 'true'){
                                divCodigo.innerHTML = '';
                                window.errorCodigo = true;
                        
                            }
                        }
                    }    
                });
            }
        }
        
        if(nombre == ''){
            divNombre.innerHTML = '';
            divNombre.innerHTML = 'Campo obligatorio';
            window.errorNombre = false;
        }
        else{
            divNombre.innerHTML = '';
            window.errorNombre = true;
        }
        
        if(direccion == ''){
            divDireccion.innerHTML = '';
            divDireccion.innerHTML = 'Campo obligatorio';
            window.errorDireccion = false;
        }
        else{
            divDireccion.innerHTML = '';
            window.errorDireccion = true;
        }
        if(telefono == ''){
            divTelefono.innerHTML = '';
            divTelefono.innerHTML = 'Campo obligatorio';
            window.errorTel = false;
        }
        else{
            if(isNaN(telefono)){
                divTelefono.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel = false;
            }
            else{
                divTelefono.innerHTML = '';
                window.errorTel = true;
            }
        }
        
        if(correo == ''){
            divCorreo.innerHTML = '';
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo = false;
        }
        else{
            divCorreo.innerHTML = '';
            $.ajax({
                url: "../becarioGestion/validacionActualizar",
                type: 'POST',
                data: datos,
                success: function(msg){
                    if(msg == 'errorEmail'){
                        divCorreo.innerHTML = '';
                        divCorreo.innerHTML = "Correo invalido";
                        window.errorCorreo=false;
                    
                    }else{
                        if(msg == 'okEmail'){
                            divCorreo.innerHTML = '';
                            window.errorCorreo=true;
                            if(window.errorCodigo == true && window.errorNombre == true && window.errorTel == true && window.errorCorreo == true && window.errorDireccion == true && window.errorPrograma == true){
                                document.forms['formulario'].submit();
                            }
                        
                        }
                    }
                }    
            });
        }
        
    });
    
    
    
     
    //CAMBIO CONTRASEÑA BECARIO SESION ADMINISTRADOR
    // validacion para cambio de contraseña becario ( vista : actualizarContrasenaBecario.php) contraseña antigua
    $('#actualizarContrasena').click(function(){
        
        var codigob=document.formulario.codigoBeca.value;
       
        //var contrasenaActual = document.formulario.contrasenaAntigua.value;
        var contrasenaNueva = document.formulario.contrasena.value;
        var contrasenaNueva2 = document.formulario.contrasena2.value;
        //var divContrasenaActual = document.getElementById('error_contrasenaAntigua');
        var divContrasenaNueva = document.getElementById('error_contrasena');
        var divContrasenaNueva2 = document.getElementById('error_contrasena2');
       
        
        //window.errorcontrasenaActual=false;
        window.errorcontrasenaNueva=false;
        window.errorcontrasenaNueva2=false;
        
        //        var datos = {
        //            codigo: codigob,
        //            contActual: contrasenaActual  
        //        };
        //             
        //            $.ajax({
        //                url: '../inicioAdministrador/checkPassBecarioAjax',
        //                type: 'POST',
        //                data: datos,
        //                success: function(msg){
        //                    if(msg == 'false'){
        //                        divContrasenaActual.innerHTML = '';
        //                        divContrasenaActual.innerHTML = 'Contrase&ntilde;a incorrecta.'
        //                        window.errorcontrasenaActual = false;
        //                    }
        //                    else{
        //                        if(msg == 'true'){
        //                            divContrasenaActual.innerHTML = '';
        //                            window.errorcontrasenaActual = true;
        //                        }
        //                    }
        //                }
        //            });
    
        if(contrasenaNueva == ''){
                
            divContrasenaNueva.innerHTML='Campo obligatorio';
            window.errorcontrasenaNueva=false;
        }else{
            divContrasenaNueva.innerHTML='';
            window.errorcontrasenaNueva=true;
            
        }
    
        if(contrasenaNueva2 == ''){
                
            divContrasenaNueva2.innerHTML='Campo obligatorio';
            window.errorcontrasenaNueva2=false;
        }else{
            divContrasenaNueva2.innerHTML='';
            window.errorcontrasenaNueva2=true;
            
        }
        
        if(contrasenaNueva != contrasenaNueva2){
                
            divContrasenaNueva.innerHTML='Las contrase&ntilde;as no coinciden';
            window.errorcontrasenaNueva=false;
        }
        
       
        if(window.errorcontrasenaNueva==true && window.errorcontrasenaNueva2==true)
        {
            document.forms['formulario'].submit();               
        }
    
       
    });



	
    //ADICIOANR BECARIO SESION ADMISNITRADOR
    $('#adicionarBecario').click(function(){
        //var codigo = document.formulario.codBec.value;
        var cargo = document.formulario.cargo.value;
        var contrasena = document.formulario.contrasena.value;
           
        // var divCodigo = document.getElementById('error_codigo');
        var divCargo = document.getElementById('error_cargo');
        var divContrasena = document.getElementById('error_contrasena');
           
        window.errorCodigo=false;
        window.errorCargo=false;
        window.errorContrasena=false;
        
                   
        if(cargo == ''){
                
            divCargo.innerHTML = 'Campo obligatorio';
            window.errorCargo=false;
        }
        else{
            divCargo.innerHTML = '';
            window.errorCargo=true;
        }
      
        if(contrasena == ''){
               
            divContrasena.innerHTML = 'Campo obligatorio';
            window.errorContrasena=false;
        }
        else{
            divContrasena.innerHTML = '';
            window.errorContrasena=true;
        }
            
        if(window.errorCargo == true && window.errorContrasena == true){
            document.forms['formulario'].submit();
        }
    });
	
        
        
    //ADICIONAR EQUIPO SESION ADMINISTADOR
	
    $('#adicionarEquipo').click(function(){
        
        
        var ip = document.formulario.ip.value;
        var nombreComputador = document.formulario.nombre_comp.value;
	
        var divIp = document.getElementById('error_ip');
        var divNombreComputador = document.getElementById('error_nombre_comp');
	
        window.errorIp=false;
        window.errorNombreComputador=false;
        
        if(ip  == ''){
            
            divIp.innerHTML = 'Campo obligatorio';
            window.errorIp=false;
        }
        else{
            divIp.innerHTML = '';
            window.errorIp=true;
        }
        if(nombreComputador  == ''){
            
            divNombreComputador.innerHTML = 'Campo obligatorio';
            window.errorNombreComputador=false;
        }
        else{
            divNombreComputador.innerHTML = '';
            window.errorNombreComputador=true;
        }
        
       
        
        if( window.errorIp == true && window.errorNombreComputador == true){
            document.forms['formulario'].submit();
        }
    });
    

	
    /*VALIDACIONES ACTUALIZAR EQUIPO SESION ADMINISTRADOR*/
    //    /*Aparecer datos Actualizar equipo sesion administrador*/
    //	
    $('#codigopc').bind('blur', function(){
        var divCodigo = document.getElementById('error_Cod_pc');
        var divSala=document.getElementById('codigosala');
        var divIp=document.getElementById('ip');
        var divNombre=document.getElementById('nombrepc');
        var codigop = $(this).val();
        var datos = {
            codigo_pc: codigop
        };
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxSala",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                  
                    divSala.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El computador no existe.';                      
                        divSala.innerHTML = '';
                      
                    }
                    else{
                        
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divSala.innerHTML = "<input type='text' id='codigosala' name='codigosala'>";                              
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';                         
                                divSala.innerHTML = "<input type='text' value="+msg+" id='codigosala' name='codigosala'>";
                            } 
                    
                        }
                 
                    }
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxIP",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                   
                    divIp.innerHTML = '';
                    
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El computador no existe.';                      
                        divIp.innerHTML = '';
                        
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divIp.innerHTML = "<input type='text' id='ip' name='ip'>";
                           
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divIp.innerHTML ="<input type='text' value="+msg+" id='ip' name='ip'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxNombrePC",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";
                    divNombre.innerHTML = '';
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El computador no existe.';                       
                        divNombre.innerHTML = '';
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divNombre.innerHTML = "<input type='text' id='nombrepc' name='nombrepc'>";
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divNombre.innerHTML ="<input type='text' value="+msg+" id='nombrepc' name='nombrepc'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
    });
    
   
        
    $('#actualizarE').click(function(){
        
        
        var codigo = document.formulario.codigopc.value;        
        var codigoSala = document.formulario.codigosala.value;                
        var ip = document.formulario.ip.value;
        
        var nombreComputador = document.formulario.nombrepc.value;
		
        var divCodigo = document.getElementById('error_Cod_pc');
        var divCodigoSala = document.getElementById('error_salas_Cod_sala');
        var divIp = document.getElementById('error_ip');
        var divNombreComputador = document.getElementById('error_nombre_comp');
        
		       
        window.errorCodigo=false;
        window.errorCodigoSala=false;
        window.errorIp=false;
        window.errorNombreComputador=false;
       
      
               
        if(codigo == ''){
            
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo=false;
           
        }
        else{
            divCodigo.innerHTML = '';
            window.errorCodigo=true;
        }
        
          
        if(codigoSala == ''){
            
            divCodigoSala.innerHTML = 'Campo obligatorio';
            window.errorCodigoSala=false;
        }
        else{
            divCodigoSala.innerHTML = '';
            window.errorCodigoSala=true;
        }
  
        if(ip  == ''){
           
            divIp.innerHTML = 'Campo obligatorio';
            window.errorIp=false;
        }
        else{
            divIp.innerHTML = '';
            window.errorIp=true;
        }
        if(nombreComputador  == ''){
           
            divNombreComputador.innerHTML = 'Campo obligatorio';
            window.errorNombreComputador=false;
        }
        else{
            divNombreComputador.innerHTML = '';
            window.errorNombreComputador=true;
        }
     
       
        if(window.errorCodigo == true && window.errorCodigoSala == true && window.errorIp == true && window.errorNombreComputador == true){
            document.forms['formulario'].submit();
        }
    });
	
	
   
   
    /*VALIDACIONES ACTUALIZAR BECARIO SESION ADMINISTRADOR*/
    //    /*Aparecer datos Actualizar becario sesion administrador*/
    //	
    $('#codUsuarioB').bind('blur', function(){
        var divCodigo = document.getElementById('codigoBec');
        var divTelefono=document.getElementById('telUsuarioB');
        var divDireccion=document.getElementById('dirUsuarioB');
        var divCorreo=document.getElementById('correo');
        var codigo = $(this).val();
        var datos = {
            codigo_usuario: codigo
        };
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxTelefono",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                  
                    divTelefono.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divTelefono.innerHTML = '';
                      
                    }
                    else{
                        
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divTelefono.innerHTML = "<input type='text' id='telUsuarioB' name='telUsuarioB'>";                              
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';                         
                                divTelefono.innerHTML = "<input type='text' value="+msg+" id='telUsuarioB' name='telUsuarioB'>";
                            } 
                    
                        }
                 
                    }
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxDireccion",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                   
                    divDireccion.innerHTML = '';
                    
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divDireccion.innerHTML = '';
                        
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divDireccion.innerHTML = "<input type='text' id='dirUsuarioB' name='dirUsuarioB'>";
                           
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divDireccion.innerHTML ="<input type='text' value="+msg+" id='dirUsuarioB' name='dirUsuarioB'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxCorreo",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";
                    divCorreo.innerHTML = '';
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                       
                        divCorreo.innerHTML = '';
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divCorreo.innerHTML = "<input type='text' id='correo' name='correo'>";
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divCorreo.innerHTML ="<input type='text' value="+msg+" id='correo' name='correo'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
    });
    
   

   
     
    $('#actualizarBecario').click(function(){
        
        
        var codigo = document.formularioActB.codUsuarioB.value;
        var telefono = document.formularioActB.telUsuarioB.value;
        var direccion = document.formularioActB.dirUsuarioB.value;
        var correo = document.formularioActB.correo.value;
        var divCodigo = document.getElementById('codigoBec');
        var divTelefono = document.getElementById('errorTelefono');
        var divDireccion = document.getElementById('errorDireccion');
        var divCorreo = document.getElementById('errorCorreo');
        window.errorCodigo=false;
        window.errorTel=false;
        window.errorDir=false;
        window.errorCorreo=false;
        
    
         
        if(codigo == ''){
          
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo=false;
        }
        else{
            divCodigo.innerHTML = '';
            window.errorCodigo=true;
        }
        if(telefono == ''){
           
            divTelefono.innerHTML = 'Campo obligatorio';
            window.errorTel=false;
        }
        else{
            if(isNaN(telefono)){
                divTelefono.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel=false;
            }
            else{
                divTelefono.innerHTML = '';
                window.errorTel=true;
            }
        }
        if(direccion == ''){
         
            divDireccion.innerHTML = 'Campo obligatorio';
            window.errorDir=false;
        }
        else{
            divDireccion.innerHTML = '';
            window.errorDir=true;
        }
        if(correo == ''){
       
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo=false;
        }
        else {
                                      
            var correoRegex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
            if(!(correoRegex.test(correo)))//validacion de la forma del correo
            {
                divCorreo.innerHTML = 'Correo invalido';
                window.errorCorreo=false;   
            }
            else{
                   
                divCorreo.innerHTML = '';
                window.errorCorreo=true;
            }
        
        }
        
        if(window.errorCodigo == true && window.errorTel == true && window.errorDir == true && window.errorCorreo == true)
        {           
            document.forms['formularioActB'].submit();            
        }
        
    });
    
     
        
  
    /*Reportes*/
    $('#reporte').click(function(){
        var fechainicio = document.formreporte.fechainicio.value;  
        var fechafin = document.formreporte.fechafin.value;               
        var divfechainicio = document.getElementById('error_fecha_inicio');      
        var divfechafin = document.getElementById('error_fecha_fin');      
        window.errorfechainicio=false;    
        window.errorfechafin=false;    
            
         
        if (fechainicio != undefined && fechainicio != "" ){
            if (!/^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$/.test(fechainicio)){
                divfechainicio.innerHTML = 'Formato de fecha no valido';            
                window.errorfechainicio=false;
            }else 
            {
                divfechainicio.innerHTML = '';            
                window.errorfechainicio=true;                  
            }
       
        }else{            
            divfechainicio.innerHTML = 'Formato de fecha no valido';            
            window.errorfechainicio=false;
        }
        
        if (fechafin != undefined && fechafin != "" ){
            if (!/^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$/.test(fechafin)){
                divfechafin.innerHTML = 'Formato de fecha no valido';            
                window.errorfechafin=false;
            }else 
            {
                divfechainicio.innerHTML = '';            
                window.errorfechafin=true;                  
            }
       
        }else{            
            divfechainicio.innerHTML = 'Formato de fecha no valido';            
            window.errorfechafin=false;
        }
        
        
        if(window.errorfechainicio==true && window.errorfechafin==true){
            document.forms['formreporte'].submit();
        }     
       
      
    }); 
  
  
  
  
    
    //    /*Finalizar funcionario y becario*/
    //    $('#finalizar').click(function(){
    //        var observacion = document.formfinalizar.observacion.value;               
    //        var divobservacion = document.getElementById('error_observacion');      
    //        window.errorfinalizar=false;    
    //        if(observacion == ''){
    //            divobservacion.innerHTML = 'Campo Obligatorio';            
    //            window.errorfinalizar=false;
    //        }
    //        else{
    //            divobservacion.innerHTML = '';
    //            window.errorfechainicio=true;
    //        }
    //        
    //        if(window.errorfinalizar){
    //            document.forms['formfinalizar'].submit();
    //        }     
    //       
    //      
    //    }); 
    
    
    /*Insertar sancion */
    $('#insertarsancion').click(function(){
        var descripcion = document.formulario.descripcion.value;               
        var divdescripcion = document.getElementById('error_descripcion');      
        window.errorsancion=false;    
        if(descripcion == ''){
            divdescripcion.innerHTML = 'Campo Obligatorio';            
            window.errorsancion=false;
        }
        else{
            divdescripcion.innerHTML = '';
            window.errorsancion=true;
        }
    
        if(window.errorsancion){
            document.forms['formulario'].submit();
        }
      
    });
    
    
    
    //validacion login funcionario
    $('#cedulaFun').bind('blur', function(){
        var divCed = document.getElementById('Cedula');
        var ced = $(this).val();        
        var datos = {
            cedula: ced
        };
        $.ajax({
            url: 'funcionario/validacionUsuarioAjax',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCed.innerHTML = '';
                    divCed.innerHTML = 'Campo obligatorio.'                    
                }
                else{
                    if(msg == 'false'){
                        divCed.innerHTML = '';
                        divCed.innerHTML = 'El usuario no existe.'                    
                    }
                    else{
                        if(msg == 'true'){
                            divCed.innerHTML = '';
                        }
                    }
                }
                
            }
        });
    });
    
    $('#asignaturaFun').bind('blur', function(){
        var divA = document.getElementById('Asignatura');
        var asg = $(this).val();        
        var datos = {
            asignatura: asg
        };
        $.ajax({
            url: 'funcionario/validacionAsignaturaAjax',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divA.innerHTML = '';
                    divA.innerHTML = 'Campo obligatorio.'                    
                }
                else{
                    if(msg == 'false'){
                        divA.innerHTML = '';
                        divA.innerHTML = 'Asignatura Incorrecta.'                    
                    }
                    else{
                        if(msg == 'true'){
                            divA.innerHTML = '';
                        }
                    }
                }                
            }
        });
    });
   
    $('#programaFun').bind('blur', function(){
        var divPrg = document.getElementById('Programa');
        var prg = $(this).val();        
        var datos = {
            programa: prg
        };
        $.ajax({
            url: 'funcionario/validacionProgramaAjax',
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divPrg.innerHTML = '';
                    divPrg.innerHTML = 'Campo obligatorio.'                    
                }
                else{
                    if(msg == 'false'){
                        divPrg.innerHTML = '';
                        divPrg.innerHTML = 'Programa Incorrecto.'                    
                    }
                    else{
                        if(msg == 'true'){
                            divPrg.innerHTML = '';
                        }
                    }
                }                
            }
        });
    });
     
    
    //VLIDACIONES ACTULIZAR FUNCIONARIO SESION ADMINISTRADOR
    
    
    $('#cedFuncionario').bind('blur', function(){
        var divCedula = document.getElementById('error_cedula');
        var divTelefono1=document.getElementById('telefono1');
        var divTelefono2=document.getElementById('telefono2');
        var divCorreo=document.getElementById('correo_fun');
        var codigo = document.formulario.cedFuncionario.value;
        var datos = {
            cedula: codigo
        };
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxTelefono1",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCedula.innerHTML = "Campo obligatorio";                  
                    divTelefono1.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        divCedula.innerHTML = 'El usuario no existe.';                      
                        divTelefono1.innerHTML = '';
                      
                    }
                    else{
                        if(msg == 0){
                            divCedula.innerHTML = '';                         
                            divTelefono1.innerHTML = "<input type='text' id='telefono1' name='telefono1'>";                              
                       
                        }else{
                            if(msg != null){
                                divCedula.innerHTML = '';
                                divTelefono1.innerHTML ="<input type='text' value="+msg+" id='telefono1' name='telefono1'>";
                              
                              
                            }  
                    
                    
                        }
                 
                    }
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxTelefono2",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCedula.innerHTML = "Campo obligatorio";                   
                    divTelefono2.innerHTML = '';
                    
                }
                else{
                    if(msg == 'FALSE'){
                        divCedula.innerHTML = 'El usuario no existe.';                      
                        divTelefono2.innerHTML = '';
                        
                    }
                    else{
                        if(msg == 0){
                            divCedula.innerHTML = '';                         
                            divTelefono2.innerHTML  = "<input type='text' id='telefono2' name='telefono2'>";
                           
                        
                        
                        }else{
                            if(msg != null){
                                divCedula.innerHTML = '';
                                divTelefono2.innerHTML ="<input type='text' value="+msg+" id='telefono2' name='telefono2'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxCorreoFun",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCedula.innerHTML = "Campo obligatorio";
                    divCorreo.innerHTML = '';
                }
                else{
                    if(msg == 'FALSE'){
                        divCedula.innerHTML = 'El usuario no existe.';                       
                        divCorreo.innerHTML = '';
                    }
                    else{
                        if(msg == 0){
                            divCedula.innerHTML = '';                         
                            divCorreo.innerHTML = "<input type='text' id='correo_fun' name='correo_fun'>";
                        
                        
                        }else{
                            if(msg != null){
                                divCedula.innerHTML = '';
                                divCorreo.innerHTML ="<input type='text' value="+msg+" id='correo_fun' name='correo_fun'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
    });
	
    $('#actualizarFuncion').click(function(){
        var codigo = document.formulario.cedFuncionario.value;
        var telefono1 = document.formulario.telefono1.value;
        var telefono2 = document.formulario.telefono2.value;
        var correo = document.formulario.correo_fun.value;
        var divCodigo = document.getElementById('error_cedula');
        var divTelefono1 = document.getElementById('error_telefono1');
        var divTelefono2 = document.getElementById('error_telefono2');
        var divCorreo = document.getElementById('error_correo_fun');
        window.errorCodigo=false;
        window.errorTel1=false;
        window.errorTel2=false;
        window.errorCorreo=false;
  
        
        if(codigo == ''){
            divCodigo.innerHTML = '';
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo=false;
        }
        else{
            divCodigo.innerHTML = '';
            window.errorCodigo=true;
        }
        if(telefono1 == ''){
            divTelefono1.innerHTML = '';
            divTelefono1.innerHTML = 'Campo obligatorio';
            window.errorTel1=false;
        }
        else{
            if(isNaN(telefono1)){
                divTelefono1.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel1=false;
            }
            else{
                divTelefono1.innerHTML = '';
                window.errorTel1=true;
            }
        }
       
        if(telefono2 == ''){
            divTelefono2.innerHTML = '';
            divTelefono2.innerHTML = 'Campo obligatorio';
            window.errorTel2=false;
        }
        else{
            if(isNaN(telefono2)){
                divTelefono2.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel2=false;
            }
            else{
                divTelefono2.innerHTML = '';
                window.errorTel2=true;
            }
        }
       
        if(correo == ''){
       
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo=false;
        }
        else {
                                      
            var correoRegex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
            if(!(correoRegex.test(correo)))//validacion de la forma del correo
            {
                divCorreo.innerHTML = 'Correo invalido';
                window.errorCorreo=false;   
            }
            else{
                   
                divCorreo.innerHTML = '';
                window.errorCorreo=true;
            }
        
        }
        
        if(window.errorCodigo == true && window.errorTel1 == true && window.errorTel2 == true && window.errorCorreo == true)
        {           
            document.forms['formulario'].submit();            
        }
        
    });
    
    
  
    //VALIDACION ACTUALIZAR ESTUDIANTE SESION ADMINISTRADOR
   
    /*ACTUALIZAR ESTUDIANTE SESION BECARIO*/
    /*Actualizar: aparecer datos automaticamente*/
    $('#codUsuEstudiante').bind('blur', function(){
        var divCodigo = document.getElementById('codigoUsuario');
        var divTelefono=document.getElementById('telUsuario');
        var divDireccion=document.getElementById('dirUsuario');
        var divCorreo=document.getElementById('correoUsuario');
        var codigo = document.formulario.codUsuEstudiante.value;
        var datos = {
            codigo_usuario: codigo
        };
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxTelefono",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                  
                    divTelefono.innerHTML = '';
                   
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divTelefono.innerHTML = '';
                      
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divTelefono.innerHTML = "<input type='text' id='telUsuario' name='telUsuario'>";                              
                       
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divTelefono.innerHTML ="<input type='text' value="+msg+" id='telUsuario' name='telUsuario'>";
                              
                              
                            }  
                    
                    
                        }
                 
                    }
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxDireccion",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";                   
                    divDireccion.innerHTML = '';
                    
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                      
                        divDireccion.innerHTML = '';
                        
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divDireccion.innerHTML = "<input type='text' id='dirUsuario' name='dirUsuario'>";
                           
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divDireccion.innerHTML ="<input type='text' value="+msg+" id='dirUsuario' name='dirUsuario'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
        
        
        $.ajax({
            url: "../inicioAdministrador/validacionAjaxCorreo",
            type: 'POST',
            data: datos,
            success: function(msg){
                if(msg == 'vacio'){
                    divCodigo.innerHTML = "Campo obligatorio";
                    divCorreo.innerHTML = '';
                }
                else{
                    if(msg == 'FALSE'){
                        divCodigo.innerHTML = 'El usuario no existe.';                       
                        divCorreo.innerHTML = '';
                    }
                    else{
                        if(msg == 0){
                            divCodigo.innerHTML = '';                         
                            divCorreo.innerHTML = "<input type='text' id='correoUsuario' name='correoUsuario'>";
                        
                        
                        }else{
                            if(msg != null){
                                divCodigo.innerHTML = '';
                                divCorreo.innerHTML ="<input type='text' value="+msg+" id='correoUsuario' name='correoUsuario'>";
                              
                              
                            }
                        }
                    }
                 
                }
            }    
        });
    });
	
    $('#actEst').click(function(){
        var codigo = document.formulario.codUsuEstudiante.value;
        var telefono = document.formulario.telUsuario.value;
        var direccion = document.formulario.dirUsuario.value;
        var correo = document.formulario.correoUsuario.value;
        var divCodigo = document.getElementById('codigoUsuario');
        var divTelefono = document.getElementById('errorTelefono');
        var divDireccion = document.getElementById('errorDireccion');
        var divCorreo = document.getElementById('errorCorreo');
        window.errorCodigo=false;
        window.errorTel=false;
        window.errorDir=false;
        window.errorCorreo=false;
        
      
        
        if(codigo == ''){
            divCodigo.innerHTML = '';
            divCodigo.innerHTML = 'Campo obligatorio';
            window.errorCodigo=false;
        }
        else{
            divCodigo.innerHTML = '';
            window.errorCodigo=true;
        }
        if(telefono == ''){
            divTelefono.innerHTML = '';
            divTelefono.innerHTML = 'Campo obligatorio';
            window.errorTel=false;
        }
        else{
            if(isNaN(telefono)){
                divTelefono.innerHTML = 'El telefono solo puede contener numeros';
                window.errorTel=false;
            }
            else{
                divTelefono.innerHTML = '';
                window.errorTel=true;
            }
        }
        if(direccion == ''){
            divDireccion.innerHTML = '';
            divDireccion.innerHTML = 'Campo obligatorio';
            window.errorDir=false;
        }
        else{
            divDireccion.innerHTML = '';
            window.errorDir=true;
        }
        if(correo == ''){
       
            divCorreo.innerHTML = 'Campo obligatorio';
            window.errorCorreo=false;
        }
        else {
                                      
            var correoRegex=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
            if(!(correoRegex.test(correo)))//validacion de la forma del correo
            {
                divCorreo.innerHTML = 'Correo invalido';
                window.errorCorreo=false;   
            }
            else{
                   
                divCorreo.innerHTML = '';
                window.errorCorreo=true;
            }
        
        }
       
        if(window.errorCodigo == true && window.errorTel == true && window.errorDir == true && window.errorCorreo == true)
        {           
            document.forms['formulario'].submit();            
        }
        
    });
    
    
            
});
   
 