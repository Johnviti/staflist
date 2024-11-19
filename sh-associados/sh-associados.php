<?php
  
  if ( ! defined( 'ABSPATH' ) ) {

    exit;

  }
  
  /*

    Plugin Name: SHAssociados
    Plugin URI: https://wordpress.shdev.com.br/plugins/sh-associados
    Description: Plugin de criação de paginas de associados personalizada.
    Author: Robson Vieira
    Author URI: https://shdev.com.br
    Text Domain: sh-associados
    Domain Path: /languages
    License: GPLv2
    Version: 1.0

  */


  function sh_associados_get_traducao2($idioma, $palavra = null) {


    $retorno = $palavra;

    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $arquivo = ( __DIR__ ) . '/languages/sh-associados-' . $idioma . '.po';
    if(!file_exists($arquivo)) {

      $arquivo = ( __DIR__ ) . '/languages/sh-associados-pt_BR.po';

    }


    $contents = file_get_contents($arquivo);

    $position = strpos($contents, 'msgid "' . $palavra . '"');
    if($position !== false) {

      $quebra = explode('msgid "' . $palavra . '"', $contents);
      $quebra = explode('msgid "', $quebra[1]);
      $retorno = str_replace(["\n", "msgstr ", '"'], '', $quebra[0]);
      

    }


    return $retorno;


  }


  function sh_associados_get_traducao($idioma, $palavra = null) {


    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $arquivo = ( __DIR__ ) . '/languages/' . $idioma . '.php';
    if(!file_exists($arquivo)) {

      $arquivo = ( __DIR__ ) . '/languages/pt.php';

    }


    require_once($arquivo);

    if(isset($sh_palavras)) {

      if(is_array($sh_palavras)) {

        if(count($sh_palavras) >= 1) {

          if($palavra != null) {

            if(array_key_exists($palavra, $sh_palavras)) {

              $retorno = $sh_palavras[$palavra];

            } else {

              $retorno = $palavra;

            }

          } else {

            $retorno = $sh_palavras;

          }

        } else {

          if($palavra != null) {

            $retorno = $palavra;

          } else {

            $retorno = '';

          }

        }

      } else {

        if($palavra != null) {

          $retorno = $palavra;

        } else {

          $retorno = '';

        }

      }

    } else {

      if($palavra != null) {

        $retorno = $palavra;

      } else {

        $retorno = '';
      }

    }

    return $retorno;

  }




  function sh_associados_get_stafflist( $_wpdb, $table_prefix, $idioma, $permalink, $paged = 1, $order = null, $section = null ) {


    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $retorno = [

      'todos' => [
        
        'total' => 0,
        'itens' => []

      ],
      'paginacao' => [
        
        'total' => 0,
        'itens' => []

      ]

    ];


    $query   = "SELECT staff_id, name, category, personType FROM " . $table_prefix . "stafflist WHERE category = 'Associates' AND personType = 'Legal Person' ORDER BY name ASC";
    $results = $_wpdb->get_results($query);
    $total   = count($results);

    $itens = [];

    if($total >= 1) {

      foreach ($results as $item) {
        
        $itens[] = $item;

      }

    }



    $pagination = '';
    $total_count = $_wpdb->get_var("SELECT count(*) FROM " . $table_prefix . "stafflist WHERE category = 'Associates'" . ( ($section != null) ? " AND section = '" . $section . "' " : '' ) . " AND personType = 'Legal Person' ORDER BY name " . ( ($order != null) ? $order : 'ASC' ));

    if($total_count >= 1) {

      $total_reg = 12;

      $num_pages = ceil($total_count / $total_reg);

      if($paged > $num_pages || $paged < 1){
      
        $paged = $num_pages;
      
      } else {

        $paged = $paged;

      }


      $inicio = $paged - 1;
      $inicio = $inicio * $total_reg;

      $query2   = "SELECT * FROM " . $table_prefix . "stafflist WHERE category = 'Associates'" . ( ($section != null) ? "AND section = '" . $section . "' " : '' ) . " AND personType = 'Legal Person' ORDER BY name " . ( ($order != null) ? $order : 'ASC' ) . " LIMIT " . $inicio . "," . $total_reg;
      $results2 = $_wpdb->get_results($query2);
      $total2   = count($results2);

      $itens2 = [];

      if($total2 >= 1) {

        foreach ($results2 as $item2) {
          
          $itens2[] = $item2;

        }

      }


      if( $total_count > $total_reg ) {

        $lim    = 4;
        $_inicio = ( ( ($paged - $lim) > 1 ) ? ($paged - $lim) : 1 );
        $_fim    = ( ( ($paged + $lim) < $num_pages ) ? ($paged + $lim) : $num_pages );

        $pagination = '<div class="col-12 text-center">' . "\n";
            
          $pagination .= '<nav class="d-table mx-auto" aria-label="Page navigation">' . "\n";

            $pagination .= '<ul id="sh-associados-page-pagination" class="pagination">' . "\n";
              
              if($paged > 1){
                
                $pagination .= '<li class="page-item"><a class="page-link" href="' . $permalink . ( ($section != null) ? '?section=' . $section . ( ($order != null) ? '&order=' . $order : ( ($order != null) ? '?order=' . $order : '' ) ) : '' ) . '#page-associados">Primeira</a></li>';
                $pagination .= '<li class="page-item"><a class="page-link" href="' . $permalink . 'page/' . ($paged - 1) . ( ($section != null) ? '/?section=' . $section . ( ($order != null) ? '&order=' . $order : '' ) : '/' . ( ($order != null) ? '?order=' . $order : '' ) ) . '#page-associados">&laquo;</a></li>';
              
              } else {
                
                $pagination .= '<li class="page-item disabled"><span class="page-link">Primeira</span></li>';
                $pagination .= '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
              
              }

              if($num_pages > 1 && $paged <= $num_pages){

                for($p = $_inicio; $p <= $_fim; $p++){

                  if ($paged == $p) {

                    $pagination .= '<li data-item="' . $p . '" class="page-item active" aria-current="page"><span class="page-link" style="cursor: no-allowed;">'.$p.'</span></li>';

                  } else {

                    $pagination .= '<li data-item="' . $p . '" class="page-item"><a class="page-link" href="' . $permalink . 'page/' . $p . ( ($section != null) ? '/?section=' . $section .( ($order != null) ? '&order=' . $order : '' ) : ( ($order != null) ? '/?order=' . $order : '' ) ) .'#page-associados">'.$p.'</a></li>';

                  }

                }

              }

              
              if($paged < $num_pages){

                $pagination .= '<li class="page-item"><a class="page-link" href="' . $permalink . 'page/'.($paged + 1) . ( ($section != null) ? '/?section=' . $section . ( ($order != null) ? '&order=' . $order : '' ) : ( ($order != null) ? '/?order=' . $order : '/' ) ) . '#page-associados">&raquo;</a></li>';
                $pagination .= '<li class="page-item"><a class="page-link" href="' . $permalink . 'page/'.$num_pages . ( ($section != null) ? '/?section=' . $section . ( ($order != null) ? '&order=' . $order : '' ) : ( ($order != null) ? '/?order=' . $order : '/' ) ) . '#page-associados">Última</a></li>';
              
              } else {

                $pagination .= '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                $pagination .= '<li class="page-item disabled"><span class="page-link">Última</span></li>';
              
              }

            $pagination .= '</ul>' . "\n";
          
          $pagination .= '</nav>' . "\n";
        
        $pagination .= '</div>' . "\n";

      }

    } else {

      $total2 = 0;
      $itens2 = [];

    }


    $retorno = [

      'todos' => [

        'total' => $total,
        'itens' => $itens

      ],
      'paginacao' => [

        'pagination' => $pagination,
        'total'      => $total2,
        'itens'      => $itens2

      ]

    ];


    return $retorno;


  }




  function sh_associados_get_staffdata( $_wpdb, $table_prefix, $staff_id , $idioma = 'pt' ) {


    $retorno = [];

    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $query   = "SELECT * FROM " . $table_prefix . "stafflist WHERE staff_id = '" . $staff_id . "'";
    $results = $_wpdb->get_results($query);
    $total   = count($results);


    if($total == 1) {

      foreach ($results as $item) {
        
        $dados = $item;
        if (!empty($dados->image)) {
                                
          $image = wp_get_attachment_image_src( $dados->image , 'medium' );
          $dados->image = $image[0];

        }


      }


      $_item = (array) $dados;


      $palavras = [

        'image'              => 'Imagem',
        'name'               => 'Nome',
        'category'           => 'Categoria',
        'address'            => 'Endereço',
        'phone'              => 'Telefone',
        'phone2'             => 'Telefone2',
        'fax'                => 'Fax',
        'email'              => 'E-mail',
        'nationality'        => 'Nacionalidade',
        'languages'          => 'Linguas',
        'countries_licensed' => 'Paises',
        'instagram_link'     => 'Instagram',
        'facebook_link'      => 'Facebook',
        'linkedin_link'      => 'Linkedin',
        'description'        => 'Descrição',
        'personType'         => 'Tipo de Pessoa',
        'section '           => 'Sessão',
        'site'               => 'Site',

      ];

      $contagem = 0;
      $_dados = [];

      foreach ($palavras as $key => $value) {

        if(array_key_exists($key, $_item)) {

          $_dados[$contagem] = [

            'key' => $key,
            'text' => ( (array_key_exists($key, $_item)) ? sh_associados_get_traducao2($idioma, $palavras[$key]) : $key ),
            'value' => ( (array_key_exists($key, $_item)) ? $_item[$key] : '' )

          ];

        }

        $contagem++;

      }
      
      

      $retorno = $_dados;

    }



    return $retorno;

  }





  function sh_associados_get_sections( $_wpdb, $table_prefix, $idioma = 'pt' ) {


    $retorno = [

      'total' => 0,
      'itens' => []

    ];

    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $query   = "SELECT section_id, name_" . $idioma . " as name FROM " . $table_prefix . "staffsection ORDER BY name_" . $idioma . " ASC";
    $results = $_wpdb->get_results($query);
    $total   = count($results);

    
    if($total >= 1) {

      $itens = [];

      foreach ($results as $item) {
        
        $itens[] = $item;

      }

      $retorno = [

        'total' => $total,
        'itens' => $itens

      ];

    }


    return $retorno;


  }



  function sh_associados_get_section( $_wpdb, $table_prefix, $section, $idioma = 'pt' ) {


    $retorno = [];

    $idioma = str_replace(['"', "'", '”'], '', $idioma);

    $query   = "SELECT section_id, name_" . $idioma . " as name FROM " . $table_prefix . "staffsection WHERE section_id = $section";
    $results = $_wpdb->get_results($query);
    $total   = count($results);

    if($total >= 1) {

      $itens = [];

      foreach ($results as $item) {
        
        $retorno = [

          'ID'   => $item->section_id,
          'name' => $item->name

        ];

      }

    }


    return $retorno;


  }




  function sh_associados_api_init() {


    // ini_set('display_errors', 0);
    register_rest_route('api/sh-associados', 'endpoints', array(

      'methods'  => 'POST',
      'callback' => 'sh_associados_api_actions',

    ));


    function sh_associados_api_actions( $request ) {


      $retorno = [

        'result'  => false,
        'message' => 'Solicitação inválida'
        
      ];

      $acao = ( ($request->get_params()['acao']) ? $request->get_params()['acao'] : '' );
      $data = ( ($request->get_params()['data']) ? $request->get_params()['data'] : '' );

      if($acao == 'get-associado') {

        $associado = ( ($data['associado']) ? $data['associado'] : '' );
        if($associado != '') {

          $idioma = ( ($data['idioma']) ? $data['idioma'] : '' );

          if($idioma == '') {

            $idioma = 'pt';

          }

          global $wpdb;

          $table_prefix = 'wp_';

          $staff = sh_associados_get_staffdata( $wpdb, $table_prefix, $idioma, $associado );

          $dados = [];
          $campos = ( ($data['campos']) ? $data['campos'] : '' );
          if(is_array($campos)) {

            if(count($campos) >= 1) {

              $contando = 0;
              foreach ($staff as $staffData) {
                
                if(in_array($staffData['key'], $campos)) {

                  $dados[$contando] = $staffData;

                  $contando++;

                }

              }

              $staff = $dados;

            }

          }
          
          $retorno['staff'] = $staff;

          if(count($staff) >= 1) {

            $retorno = [

              'result' => true,
              'dados'  => $staff

            ];

          }

        }

      }


      $retorno['data'] = $data;


      echo json_encode($retorno);

    }

  }





  function sh_associados_page_associados_shortcode( $atts ) {


    $default = [

      'idioma' => 'pt',

    ];

    $a = shortcode_atts($default, $atts);



    if(! empty(get_query_var('paged')) && is_numeric(get_query_var('paged')) ){

      $paged = get_query_var('paged');

    } else {

      $paged = 1;

    }


    if(! empty($_GET['section']) ){

      $section = $_GET['section'];

    } else {

      $section = null;

    }


    if(! empty($_GET['order']) ){

      $order = $_GET['order'];

    } else {

      $order = null;

    }

    
    global $wpdb;


    $table_prefix = 'wp_';

    $idioma = str_replace(['"', "'", '”'], '', $a['idioma']);

    $args = [

      'wpdb'         => $wpdb,
      'table_prefix' => $table_prefix,
      'url'          => get_the_permalink(),
      'idioma'       => $idioma,
      'lang'         => str_replace('-', '_', get_bloginfo("language")),
      'order'        => $order,
      'section'      => $section,
      'sections'     => sh_associados_get_sections( $wpdb, $table_prefix, $a['idioma'] ),
      'stafflist'    => sh_associados_get_stafflist( $wpdb, $table_prefix, $a['idioma'], get_the_permalink(), $paged, $order, $section )

    ];



    ob_start();

      require_once( (__DIR__) . '/template-parts/page-associados.php' );
      

    return ob_get_clean();


  }



  add_shortcode( 'sh-associados-page-associados', 'sh_associados_page_associados_shortcode');




  function sh_associados_assets() {


    global $post;

    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'sh-associados-page-associados') ) {

      $styles = [

        'sh_associados_css_bootstrap'   => plugin_dir_url(__FILE__) . 'assets/css/bootstrap.css',
        'sh_associados_css_fontawesome' => 'https://use.fontawesome.com/releases/v5.11.0/css/all.css',
        'sh_associados_css_page'        => plugin_dir_url(__FILE__) . 'assets/css/sh-associados-page-associados.css?data=' . md5(date('YmdHis')),
      
      ];


      foreach ($styles as $skey => $sval) {
        
        wp_register_style( $skey, $sval );
        wp_enqueue_style(  $skey );
        
      }


      $scripts = [

        'sh_associados_js_popper'    => plugin_dir_url(__FILE__) . 'assets/js/popper.min.js',
        'sh_associados_js_jquery'    => plugin_dir_url(__FILE__) . 'assets/js/jquery-3.6.0.js',
        'sh_associados_js_bootstrap' => plugin_dir_url(__FILE__) . 'assets/js/bootstrap.js',
        'sh_associados_js_mask'      => plugin_dir_url(__FILE__) . 'assets/js/jquery.mask.js',
        'sh_associados_js_page'      => plugin_dir_url(__FILE__) . 'assets/js/sh-associados-page-associados.js?data=' . md5(date('YmdHis')),
      
      ];

      foreach ($scripts as $jkey => $jval) {
        
        wp_enqueue_script( $jkey, $jval );
        
      }
    
    }

    return;

  }


  add_action('wp_enqueue_scripts', 'sh_associados_assets');


  function sh_associados_install_hook() {


    add_action( 'rest_api_init', 'sh_associados_api_init' );


  }


  add_action( 'init', 'sh_associados_install_hook', 0 );