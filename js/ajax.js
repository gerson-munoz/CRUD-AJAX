$(function(){
    $("#resultado").hide();
    listarUsuarios();
    let actualizar = false;
    
    //Buscar
    $("#search").keyup(()=>{
        if($("#search").val().trim()){
            let search = $("#search").val();
            $.ajax({
                url: "../controllers/buscar.php",
                data: { search },
                type: "POST",
                success: function (respuesta) {
                    if(!respuesta.error) {
                        let usuarios = JSON.parse(respuesta);
                        let template = ``;
                        let a = Object.keys(usuarios).length
                        if( a > 0){
                            usuarios.forEach(usuario => {
                                template += `<li class="task-item">${usuario.nombre} - ${usuario.apellidos}</li>`
                            });
                            $("#resultado").show();
                            $("#container").html(template);
                        }else{
                            $("#resultado").hide();
                        }
                    }
                }
            })
        }else{
            $("#resultado").hide();
        }
    })

    //Registrar
    $("#formulario").submit(e => {
        e.preventDefault();
        if(validarDatos()){
            const postData = {
                cedula: $("#cedula").val(),
                nombre: $("#nombre").val(),
                apellidos: $("#apellidos").val(),
                correo: $("#correo").val(),
                telefono: $("#telefono").val(),
            }

            /* let cedula = $("#cedula").val();
            let correo = $("#correo").val();
            
            validarCedula(cedula); */
    
            const url = actualizar === false ? "../controllers/crear.php" : "../controllers/actualizar.php";
    
            $.ajax({
                url,
                data: postData,
                type: "POST",
                success: function (response) {
                    if(!response.error){
                        listarUsuarios();
                        $("#formulario").trigger("reset")
                        let template = `
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>`+response+`</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>`;
                        $("#mensaje").html(template);
                    }
                }
            }) 
        }
        
    })


    //Listar
    function listarUsuarios() {
        $.ajax({
            url: "../controllers/listar.php",
            type: "GET",
            success: function(response){
                const usuarios = JSON.parse(response);
                let template = ``;
                usuarios.forEach(usuario => 
                    {
                        template += `
                        <tr usuarioCedula="${usuario.cedula}">
                            <td>${usuario.cedula}</td>
                            <td>${usuario.nombre}</td>
                            <td>${usuario.apellidos}</td>
                            <td>${usuario.correo}</td>
                            <td>${usuario.telefono}</td>
                            <td>
                                <button class="btn btn-primary edit">Modificar</button>
                                <button class="btn btn-danger delete">Eliminar</button>
                                <a href="../controllers/reporte.php?cedula=${usuario.cedula}" class="btn btn-warning reporte">Reporte</a>
                            </td>
                        </tr>
                        `;
                    })
                $("#usuarios").html(template);
            }
        })
    }

    //Eliminar 
    $(document).on("click", ".delete", ()=>{
        if(confirm("¿Seguro que quieres eliminar este registro?")){
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const cedula = $(element).attr("usuarioCedula")
            $.post("../controllers/eliminar.php", { cedula }, () => {
                listarUsuarios()
            })
        }
    })

    //Reportes 
    /* $(document).on("click", ".reporte", ()=>{
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cedula = $(element).attr("usuarioCedula")
        $.post("../controllers/reporte.php", { cedula })
    }) */

    //Modificar
    $(document).on("click", ".edit", ()=>{
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cedula = $(element).attr("usuarioCedula")
        let url = "../controllers/obtener.php"
        $.ajax({
            url,
            data: {cedula},
            type: "POST",
            success: function(respuesta){
                if(!respuesta.error){
                    const usuario = JSON.parse(respuesta)
                    $("#nombre").val(usuario.nombre)
                    $("#apellidos").val(usuario.apellidos)
                    $("#correo").val(usuario.correo)
                    $("#telefono").val(usuario.telefono)
                    $("#cedula").val(usuario.cedula)
                    actualizar = true
                }
            }
        })
    })

})

function validarCedula(cedula){
    let template = ``;
    $.ajax({
        url: "../controllers/obtener.php",
        data: {cedula},
        type: "POST",
        success: function fu (respuesta){
            if(!respuesta.error){
                var res = false;
                try {
                    let usuarios = JSON.parse(respuesta)
                }
                catch (error) {
                    res = true
                }
                if(res == false){
                    template += `
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>La cedula ingresada ya existe!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    $("#mensaje").html(template);
                }
            }
            return res;
        }
    })
    
}

function validarDatos(){

    if($('#cedula').val() == '' || $('#cedula').val().trim() == ''){
        alert("El campo Cedula no puede estar vacío.");
        return false;
    }

    if($('#nombre').val() == '' || $('#nombre').val().trim() == ''){
        alert("El campo Nombre no puede estar vacío.");
        return false;
    }

    if($('#apellidos').val() == '' || $('#apellidos').val().trim() == ''){
        alert("El campo apellidos no puede estar vacío.");
        return false;
    }

    if($('#correo').val() == '' || $('#correo').val().trim() == ''){
        alert("El campo correo no puede estar vacío.");
        return false;
    }

    if($('#telefono').val() == '' || $('#telefono').val().trim() == ''){
        alert("El campo telefono no puede estar vacío.");
        return false;
    }

    return true
}


