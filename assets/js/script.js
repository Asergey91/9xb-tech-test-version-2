$(document).ready(function(){
  $.material.init();
  var button=$('body > div.container-fluid > center > div > div > div > form > fieldset > button');
  var form=$('body > div.container-fluid > center > div > div > div > form');
  form.submit(function(){
      button.attr('disabled', true);
      button.attr('class', 'btn btn-default pull-right');
      button.html('<img src="../assets/img/loading-dots.gif">');
      
  });
});