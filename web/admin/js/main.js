/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){

    // menus
//    $('.ul_new > li').hover(
//        function(){
//            menuTimeout = setTimeout( function(obj){
//                $('ul', obj).show(200);
//            }, 150, this )
//        },
//        function(){
//            try{
//                clearTimeout(menuTimeout);
//                $('ul', this).hide(200);
//            }catch(e){}
//        });

    $('.ul_new > li > ul > li').hover(
        function(){
            menuTimeout = setTimeout( function(obj){
                $('ul', obj).show(20);
            }, 300, this )
        },
        function(){
            try{
                clearTimeout(menuTimeout);
                $('ul', this).hide(20);
            }catch(e){}
        });
  

    
   

    // filtro fk
    $('.sf_admin_foreignkey select').selectFilter();
    $('.sf_admin_text select').selectFilter();
    $('.link-filter').attr('title','Filtro');

});


/* Pop-up */

function abrePopUp(url){
    window.open(url,'popup','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=400,height=400');
}

/* Sub menu*/

function abre($id){
    var element = document.getElementById($id);
    $('ul', element).show(300);

}

function fechar($id){
    var element = document.getElementById($id);
    $('li', element).hide(300);
}