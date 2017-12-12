function Adiciona(){
    xhr = $.ajax({
                    type: "GET",
                    url:"<?php echo url_for1('fila/AdicionaForm') ?>",
                    async: false,
                    data: '',
                    dataType: "html",
                    error: function(){
                        alert("Houve um erro ao adicionar o form!");

                    }
                });

                if(xhr.readyState == 4){
                    document.getElementById().innerHTML =xhr.responseText;
                }
}

 function getError(){

        document.getElementById('erro').innerHTML = $.ajax({
            type: "POST",
            url:"<?php echo url_for1('ofertacoordenador/ReturnErro') ?>",
            async: false,
            dataType: "html",
            error: function(){
                alert("Houve um erro ao adicionar o horario,\nChoque de Hórario....Aperte OK para continuar!");

            }
        }).responseText;


    }

    function ChecaHorario(){

        var dia = $('#tbofertahorario_dia').val();
        var horaInicio =$('#tbofertahorario_hora_inicio_hour').val();
        var minutoInicio =$('#tbofertahorario_hora_inicio_minute').val();

        var horaFim = $('#tbofertahorario_hora_fim_hour').val();
        var minutoFim =$('#tbofertahorario_hora_fim_minute').val();
        if(minutoInicio == '') minutoInicio = '00';
        if(minutoFim == '') minutoFim = '00';

        var xhr = $.ajax({
            type: "POST",
            url: "<?php echo url_for1('ofertacoordenador/ChecaHorario') ?>",
            data: 'dia='+dia+'&hora_inicio='+horaInicio+'&minuto_inicio='+minutoInicio+'&hora_fim='+horaFim+'&minuto_fim='+minutoFim,
            async: false,
            dataType: "text",
            error: function(){
                alert('Houve um erro ao checar o horário!');
            }
        });



        if(xhr.readyState == 4){
            if(xhr.responseText == 'True'){

                alert("Adicionando....AGUARDE!\n aperte Ok para continuar");
                xhr = $.ajax({
                    type: "POST",
                    url:"<?php echo url_for1('ofertacoordenador/AdicionaHorario') ?>",
                    data: 'dia='+dia+'&hora_inicio='+horaInicio+'&minuto_inicio='+minutoInicio+'&hora_fim='+horaFim+'&minuto_fim='+minutoFim,
                    async: false,
                    dataType: "html",
                    success:   function(){
                        alert("Adicionado!");
                    },
                    error: function(){
                        alert("Houve um erro ao adicionar o horario!");

                    }
                });

                if(xhr.readyState == 4){
                    document.getElementById('horario').innerHTML =xhr.responseText;
                }
            }
            else{
            alert("Houve um erro ao adicionar o horario,\nChoque de Hórario com ....Aperte OK para continuar!");
            }
            getError();
        }
    }



    function Remover(id_horario){
        var horario = id_horario;
        alert("Removendo....AGUARDE!\n aperte Ok para continuar");
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

getError();
    }