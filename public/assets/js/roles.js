$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function deleteRoles(id){
    if(confirm('¿Estas seguro de eliminar?')){
        window.location.href = "roles/delete/"+id ;
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateRoles(id){
    $.ajax({
        url:"roles/show",
        type:"POST",
        data:{id:id},
        success:function (data){
            $("#modal_crearUsuario").modal("show")
            $("#name").val(data.name)
            $("#id").val(data.id)
            $("#titulo").text("Editar Usuario: "+data.name)

        }
    });
}

function deletePermiso(id){
    if(confirm('¿Estas seguro de eliminar?')){
        window.location.href = "permisos/delete/"+id ;
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updatePermiso(id){
    $.ajax({
        url:"permisos/show",
        type:"POST",
        data:{id:id},
        success:function (data){
            $("#modal_crearUsuario").modal("show")
            $("#name").val(data.name)
            $("#id").val(data.id)
            $("#titulo").text("Editar Permiso: "+data.name)
        }
    });
}

function updatePermisosHasRoles(id) {
    $.ajax({
        url:"getPermisosHasRoles",
        type:"POST",
        data:{id:id},
        success:function (data){
            let permisos = '';
            let html = '<option value="">Seleccione el permiso</option>';

            data[0].forEach(per => {
                permisos += `
                    <tr>
                        <td>${per.id}</td>
                        <td>${per.name}</td>
                        <td><button type="button" class="btn btn-danger" onclick="deletePermisoHasRole('${per.name}', ${id})"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `;
            });

            data[1].forEach(permiso => {
                html += `<option value="${permiso.name}">${permiso.name}</option>`;
            });

            $('#id_role').val(id);
            $('#permiso_id').html(html);
            $('#contentPermisos').html(permisos);
            $('#modal_permisos').modal('show');
        }
    });
}

function deletePermisoHasRole(permiso, id_role) {
    if (confirm('¿Seguro desea eliminar el permiso?')) {
        window.location.href = '/admin/delete-permiso-has-role/'+permiso+'/'+id_role;
    } else {

    }
}
