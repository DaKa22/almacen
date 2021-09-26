$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function deleteUser(id){
    if(confirm('¿Estas seguro de eliminar?')){
        window.location.href = "users/delete/"+id ;
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateUser(id){
    $.ajax({
        url:"users/show",
        type:"POST",
        data:{id:id},
        success:function (data){
            $("#modal_crearUsuario").modal("show")
            $("#name").val(data.name)
            $("#identificacion").val(data.identificacion)
            $("#email").val(data.email)
            $("#id").val(data.id)
            $("#titulo").text("Editar Usuario: "+data.name)
            $('#password').attr('required', false)
        }
    });
}

function roleUser(id){
    $.ajax({
        url:"users/role",
        type:"POST",
        data:{id:id},
        success:function (data){
            console.log(data);
            let roles = '';
            let html = '<option value="">Seleccione el rol</option>';

            data[0].forEach(rol => {
                roles += `
                    <tr>
                        <td>${rol}</td>
                        <td><button type="button" class="btn btn-danger" onclick="deleteRoleUser('${rol}', ${id})"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `;
            });

            data[1].forEach(role => {
                html += `<option value="${role.name}">${role.name}</option>`;
            });

            $('#id_user').val(id);
            $('#roles_id').html(html);
            $('#contentRoles').html(roles);
            $('#modal_roles').modal('show');
        }
    });
}
