$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//LINEA
function deleteLinea(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"linea/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateLinea(id){
    $.ajax({
        url:"linea/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearLinea").modal("show")
            $("#codigo_linea").val(data.codigo_linea)
            $("#descripcion").val(data.descripcion)
            $("#id").val(data.id)
            $("#titulo").text("Editar Linea")

        }
    });
}
//SUBLINEA
function deleteSublinea(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"sublinea/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateSublinea(id){
    $.ajax({
        url:"sublinea/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearSublinea").modal("show")
            $("#codigo_sublinea").val(data.codigo_sublinea)
            $("#descripcion").val(data.descripcion)
            $("#id").val(data.id)
            $("#titulo").text("Editar Sublinea")

        }
    });
}
//Movimiento
function deleteMovimiento(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"movimiento/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateMovimiento(id){
    $.ajax({
        url:"movimiento/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearMovimiento").modal("show")
            $("#tipo_movimiento").val(data.tipo_movimiento)
            $("#cedula_movimiento").val(data.cedula_movimiento)
            $("#nombre_movimiento").val(data.nombre_movimiento)
            $("#valor_total_movimiento").val(data.valor_total_movimiento)
            $("#id").val(data.id)
            $("#titulo").text("Editar Movimiento")

        }
    });
}
//DATOS_PRODUCTOS
function deleteDatos_producto(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"datos_producto/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateDatos_producto(id){
    $.ajax({
        url:"datos_producto/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearDatos_producto").modal("show")
            $("#codigo_producto").val(data.codigo_producto)
            $("#descripcion").val(data.descripcion)
            $("#costo_ultimo").val(data.costo_ultimo)
            $("#stock").val(data.stock)
            $("#lineas_id").val(data.lineas_id)
            $("#sublineas_id").val(data.sublineas_id)
            $("#id").val(data.id)
            $("#titulo").text("Editar Datos del Producto")

        }
    });
}
//Articulos_Movimiento
function deleteArticulos_movimiento(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"articulos_movimiento/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateArticulos_movimiento(id){
    $.ajax({
        url:"articulos_movimiento/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearArticulos_movimiento").modal("show")
            $("#cantidad").val(data.cantidad)
            $("#valor").val(data.valor)
            $("#datos_productos_id").val(data.datos_productos_id)
            $("#movimientos_id").val(data.movimientos_id)
            $("#id").val(data.id)
            $("#titulo").text("Editar Datos del Producto")

        }
    });
}


