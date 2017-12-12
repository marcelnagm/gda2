
    function Remover(id_horario){
        var horario = id_horario;
        document.getElementById('horario').innerHTML =  $.ajax({
            type: "POST",
            url: "<?php echo url_for1('ofertacoordenador/RemoveHorario') ?>",
            data: 'idHorario='+horario,
            async: false,
            dataType: "html",
            success:   function(){
                alert("Removido!");
            },
            error: function(){
                alert("Houve um erro ao remover o horario!");
            }
        }).responseText;


    }     