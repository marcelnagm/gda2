/**
 *  jQuery Selectbox filter
 * author: Marcelo Matos
 * date: maio/2010
 */
;
(function($){

    var SelectFilter = function (where) {

        $('<a href="javascript:void(0)" class="link-filter"></a>').insertAfter(where);


        $('.link-filter',this.parentNode).click(function(){

            var select = $('select', this.parentNode);
            var options = $('option',select);
            options.css('display','block').removeAttr('disabled');
            
            if( $("div.select-filter", this.parentNode)[0] == null ) $('<div class="select-filter"><input type="text" title="Digite aqui o texto a ser encontrado, depois aperte TAB. O primeiro item com o texto será selecionado" /></div>',this.parentNode).insertBefore(select);

            var fieldBox = $('div.select-filter', this.parentNode);
            var fieldFilter = $('div.select-filter input', this.parentNode);

                
            fieldFilter.css('width', select.css('width'));
            fieldBox.show(200);

            fieldFilter.unbind().focus();
            
            fieldFilter.change(function(){

                
                if(this.value == ''){
                    options.css('display','block').removeAttr('disabled');
                } else {
                    optionsContains = options.filter(":contains('"+this.value+"')");
                    optionsNotContains = options.not(":contains('"+this.value+"')");
                    if( optionsContains[0] != null ){
                        optionsContains.css('display','block').removeAttr('disabled');
                        optionsNotContains.css('display','none').attr('disabled',true);
                        select[0].selectedIndex = optionsContains[0].index;
                        select[0].focus();
                    } else {
                        fieldFilter.unbind('blur');
                        alert('Texto não encontrado\n Tente um parte da palavra');
                        this.focus();
                        fieldFilter.focus(function(){
                            fieldFilter.blur(function(){
                                fieldBox.hide(200,function(){
                                    fieldBox.remove();
                                });
                            });
                        });
                        return;
                    }
                }
                fieldBox.hide(200,function(){
                    fieldBox.remove();
                });
            });

            fieldFilter.keypress(function(event){
                return disableEnterKey(event);
            });

            fieldFilter.blur(function(){
                fieldBox.hide(200,function(){
                    fieldBox.remove();
                });
            });

                
        });

    }

    $.fn.selectFilter = function () {
        var objs =  new SelectFilter(this);
    }

})(jQuery)


function disableEnterKey(e){
    var key;
    if(window.event)
        key = window.event.keyCode; //IE
    else
        key = e.which; //firefox

    return (key != 13);
}
