$("#collapsed-sidebar-toggle-button").click( function() {
  if($('.icone-menu-retratil').hasClass('fa fa-toggle-on'))  {
        $('.icone-menu-retratil').removeClass('fa fa-toggle-on');
        $('.icone-menu-retratil').addClass('fa fa-toggle-off');
  }else{
        $('.icone-menu-retratil').removeClass('fa fa-toggle-off');
        $('.icone-menu-retratil').addClass('fa fa-toggle-on');
  }
});

$("#collapsed-sidebar-toggle-button").click( function() {
  if($('.enterprise').hasClass('displayNone') && $('.client').hasClass('displayNone') && $('.iconsusers').hasClass('displayNone')){
        $('.enterprise').removeClass('displayNone');
        $('.client').removeClass('displayNone');
        $('.iconsusers').removeClass('displayNone');
  }  else {
        $('.enterprise').addClass('displayNone');
        $('.client').addClass('displayNone');
        $('.iconsusers').addClass('displayNone');
  }
});

$("#collapsed-sidebar-toggle-button").click( function() {
   if($('.imgUserSidebar').hasClass('colapse')){
        $('.imgUserSidebar').removeClass('colapse');
        $('.logo-box').removeClass('displayNone');
        $('.page-sidebar').removeClass('pt0');
        $('.page-sidebar-menu').removeClass('mt0');
        $('.accordion-menu').removeClass('mt0');
  }else{
        $('.imgUserSidebar').addClass('colapse');
        $('.logo-box').addClass('displayNone');
        $('.page-sidebar').addClass('pt0');
        $('.page-sidebar-menu').addClass('mt0');
        $('.accordion-menu').addClass('mt0');
  }
});

$("#openUserMobile").click(function(){
      $(".userMobileOpen").toggleClass("open");
});
  

$(document).ready( function () {
  $('.tableListing').DataTable();
} );

function deleteData(id, route){
    $('#confirmDelete').modal('show');
    $('.btn-ok').attr('href', '/'+route+'/'+id);
}
