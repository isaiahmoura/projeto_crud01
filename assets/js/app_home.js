function registro_query() {

    var valor = $('#query_registro').val()

    if(valor != '') {
        $.ajax({
            method:'POST',
            url:'home/query_registros',
            data:{valor:valor}
        });
        valor.innerHTML = ''
    }else {
        alert('o campo está vazio...')
    }
}
function delete_usuario(id,obj) {
    $(obj).closest('.crud_content').fadeOut();

    if(id != '') {
        $.ajax({
            method:'POST',
            url:'delete_usuario',
            data:{id:id}
        })
    }
}