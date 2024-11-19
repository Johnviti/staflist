function sh_associados_valida_info(info, def = '') {


  var retorno = def;
  if(info != '') {
    
    if(info != undefined) {
      
      if(info != 'undefined') {

        retorno = info;

      }

    }

  }


  return retorno;


}




function sh_associados_page_loader(acao, tempo = 500, callback = null) {


  $('#sh-associados-page-loading').find('div.spinner-border').css('display','inline-block');
  if(acao == 'show') {

    if($("#sh-associados-page-loading").css('display') == 'none') {

      // $('body').addClass('sh-associados-no-overflow');
      $("#sh-associados-page-loading").fadeIn(tempo, function() {

        if(callback != null) {

          callback();
          return false;

        }

      });

    } else {

      if(callback != null) {

        callback();
        return false;

      }

    }

  } else {

    if($("#sh-associados-page-loading").css('display') != 'none') {
      
      $("#sh-associados-page-loading").fadeOut(tempo, function() {

        // $('body').removeClass('sh-associados-no-overflow');
        if(callback != null) {

          callback();
          return false;

        }

      });

    } else {

      if(callback != null) {

        callback();
        return false;

      }

    }
    return false;

  }
  return false;


}



function sh_associados_get_process_status( callback ) {


  if(!$('body').hasClass('sh-associados-action-in-progress')) {

    return callback(false);

  } else {

    return callback(true);

  }


}




function sh_associados_set_process_status( status, callback = null ) {


  if(status == true) {

    $('body').addClass('sh-associados-action-in-progress');
    return callback();

  } else {

    $('body').removeClass('sh-associados-action-in-progress');
    return callback();

  }

}




function sh_associados_make_ajax(req, data = '', callSuccess = null, callError = null) {


  var wpurl = $("#page-associados").attr('data-wpurl');

  $.ajax({

    url:      wpurl + '/wp-json/api/sh-associados/endpoints',
    type:     sh_associados_valida_info(req.method, 'POST'),
    dataType: req.type,
    data:     { acao: req.acao, data: data },
    success:  function(response) {
      
      if(callSuccess != null) {

        callSuccess(response);

      }

    },
    error: function(e) {

      if(callError != null) {

        callError(e);

      }

    }


  });


}




function sh_associados_close_modal() {

  $('#sh-associados-page-modal').fadeOut(500, function() {

    // $('body').removeClass('sh-associados-no-overflow');

  });

}




$(function() {



  var staffitens = $('.sh-associados-page-itens');

  staffitens.click(function(e) {


    var item = $(this);
    var staff = item.attr('data-item');
    var lang  = item.attr('data-idioma');

    sh_associados_get_process_status(function(status) {

      if(status == false) {

        sh_associados_set_process_status(true, function() {

          sh_associados_page_loader('show', 250, function() {

            var req = {

              method: 'POST',
              type:   'json',
              acao:   'get-associado'

            };

            var data = {

              associado: staff,
              campos:    new Array(
                'image',
                'name',
                'address',
                'phone',
                'phone2',
                'email',
                'section',
                'nationality',
                'site',
              ),
              idioma:    lang

            };


            sh_associados_make_ajax(req, data,
            function(response) {

              console.log(response);

              if(response.result == true) {

                var dados = response.dados;
                var total = dados.length;
                var conta = 0;


                var html  = '<button type="button" class="btn float-end position-absolute end-0 top-0" onClick="sh_associados_close_modal();"><i class="fa fa-times fs-4"></i></button>' + "\n";
                $.each(dados, function(index, value) {

                  var dadosInfo = value;
                  if(dadosInfo.key == 'image') {

                    if(dadosInfo.value == '' || dadosInfo.value == 'null' || dadosInfo.value == "null" || dadosInfo.value == null) {
                    } else {

                      html += '<div class="col-12 mb-3 text-center">' + "\n";
                        
                        html += '<img src="' + dadosInfo.value + '" class="img-fluid" />' + "\n";

                      html += '</div>' + "\n";

                    }

                  } else if(dadosInfo.key == 'name') {

                    if(dadosInfo.value == '' || dadosInfo.value == 'null' || dadosInfo.value == "null" || dadosInfo.value == null) {
                    } else {

                      html += '<div class="col-12 mb-5 fw-bold fs-5 text-center">' + "\n";
                        
                        html += dadosInfo.value + "\n";

                      html += '</div>' + "\n";

                    }

                  } else if(dadosInfo.key == 'site') {

                    if(dadosInfo.value == '' || dadosInfo.value == 'null' || dadosInfo.value == "null" || dadosInfo.value == null) {
                    } else {

                      html += '<div class="col-12 mb-3 text-center">' + "\n";
                        
                        html += '<b>' + dadosInfo.text + ':</b> <a href="' + dadosInfo.value + '" target="_blank">' + dadosInfo.value + '</a>' + "\n";

                      html += '</div>' + "\n";

                    }

                  } else {

                    if(dadosInfo.value == '' || dadosInfo.value == 'null' || dadosInfo.value == "null" || dadosInfo.value == null) {
                    } else {

                      html += '<div class="col-12 mb-3 text-center">' + "\n";
                        
                        html += '<b>' + dadosInfo.text + ':</b> ' + dadosInfo.value + '' + "\n";

                      html += '</div>' + "\n";

                    }

                  }

                  // console.log(dadosInfo);

                  conta++;

                  if(conta >= total) {

                    $('#sh-associados-page-modal-content').html(html);
                    sh_associados_page_loader('hide', 250, function() {
                      
                      sh_associados_set_process_status(false, function() {

                        // $('body').addClass('sh-associados-no-overflow');
                        $('#sh-associados-page-modal').fadeIn(500, function() {


                        });

                      });
                    
                    });

                  }

                });

              }

            },
            function(error) {

              console.log(error);

            });

          });

        });

      }

    });

    return false;


  });




  var navListBTN = $('#sh-associados-page-list-group-btn');
  navListBTN.click(function(e) {


    // alert('123');
    var btn = $(this);
    var group = $('#sh-associados-page-list-group');

    if(group.hasClass('show')) {

      group.removeClass('show');
      btn.attr('aria-expanded', 'true');

    } else {
      
      group.addClass('show');
      btn.attr('aria-expanded', 'false');

    }

    return false;


  });


  $('#sh-associados-page-list-group').find('.sh-associados-page-navs-item').click(function(e) {

    var btn = $(this);

    alert(btn.html());
    if(btn.attr('id') == 'sh-associados-page-list-group-all') {

        window.location.href = $("#page-associados").attr('data-url') + '#page-associados';

    } else {

      if(!btn.hasClass('active')) {

        window.location.href = $("#page-associados").attr('data-url') + '?section=' + btn.attr('data-item') + '#page-associados';

      }

    }

    return false;


  });



  var navLinks = $('#sh-associados-page-pills-tabs').find('.nav-link');
  // console.log(navLinks.length);
  // console.log(navLinks.html());
  if(navLinks.length >= 1) {

    navLinks.click(function(e) {

      var btn = $(this);

      if(!btn.hasClass('active')) {

        var link = btn.attr('href');
        window.location.href = link;

      }

    });


  }



});