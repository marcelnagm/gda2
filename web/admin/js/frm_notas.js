
var statusBoxTimeout;

var mensagem  = new Array();
mensagem[0]   = 'Alteração salva';
mensagem[1]   = 'Erro ao atualizar valores na página';
mensagem[2]   = 'Erro ao enviar valores para o servidor';
mensagem[3]   = 'Não houve resposta do servidor';
mensagem[4]   = 'Número de faltas inválido';
mensagem[5]   = 'Nota inválida';
mensagem[6]   = 'A média parcial não é maior/igual a 6 e menor que 7';
mensagem[7]   = 'Erro ao acessar o banco de dados';
mensagem[8]   = 'Erro ao processar dados';
mensagem[401] = 'A sessão expirou. Atualize a página e faça a autenticação';
mensagem[500] = 'Erro no servidor';

function statusMsg(msgCode,obj) {

    $('#status span').html(mensagem[msgCode]);

    var statusBox = $('#status');
    var statusClass = 'ok';
    var statusTimeout = 2000;

    try{
        clearTimeout(statusBoxTimeout);
    } catch(e){}

    if (msgCode != 0){
        statusClass='erro';
        statusTimeout = 10000;
    }

    statusBox.removeClass();
    statusBox.addClass(statusClass);

    statusBox.fadeIn();

    if(obj) {
        statusBox.css('left',obj.position().left+'px');
        statusBox.css('top',(obj.position().top - obj.height() - $('#status').height() + 3)+'px');
    } else {
        statusBox.addClass('semSeta');
    }

    statusBoxTimeout = setTimeout(function(){
        $('#status').fadeOut();
    },statusTimeout);
}

function ajaxMessage(msg){

    try {
        
        if(msg.id == undefined) throw 1;
        $('#mp_' + msg.id).html(msg.media_parcial);
        $('#mf_' + msg.id).html(msg.media_final);
        var c = $('#c_' + msg.id);
        c.html(msg.conceito);
        c.removeClass();
        c.addClass('conceito'+msg.conceito);
        obj = $('#'+msg.obj_id);
        obj.removeClass('caixaErro');
        obj[0].value = msg.valor;
        statusMsg(0,obj);

    } catch(e) {
        if(msg.error==undefined && msg.obj_id==undefined){
            statusMsg(3);
        } else if(msg.error!=undefined && msg.obj_id!=undefined){
            obj = $('#'+msg.obj_id);
            obj.addClass('caixaErro');
            statusMsg(msg.error.code,obj);
        } else if(msg.error!=undefined){
            statusMsg(msg.error.code);
        } else {
            statusMsg(1);
        }
    }
}

function validaFormNNotas(n_notas_atual){
    
    var select = $('#n_notas')[0];
    var valor = select.options[select.selectedIndex].value;

    if(valor < n_notas_atual){
        return confirm('Esta operação apagará as notas depois da '+valor+'a. coluna. Continuar?');
    } else if(valor == n_notas_atual) {
        return false;
    }

    return true;

}