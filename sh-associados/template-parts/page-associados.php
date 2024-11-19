<?php
  

  $sections  = $args['sections'];
  $stafflist = $args['stafflist'];

  // echo '<pre style="display: none;">';
  // var_dump($_GET);
  // echo '</pre>';


?>
<div id="page-associados" data-wpurl="<?php bloginfo('wpurl'); ?>" data-url="<?php echo $args['url']; ?>" data-idioma="<?php echo $args['idioma']; ?>" class="container-fluid">
  
  <div class="row">
    
    <div class="col-12 col-md-3">

      <?php if($sections['total'] >= 1) { ?>

        <div class="d-none d-md-table w-100 sh-associados-page-navs mb-4 mb-md-3">
        
          <ul class="nav nav-pills nav-fill flex-column" id="sh-associados-page-pills-tabs" role="tablist">

            <li class="nav-item" role="presentation" style="border-top: 0px;">

              <?php if($section == null) { ?>

                <a class="nav-link active"><?php echo sh_associados_get_traducao2($args['lang'], 'Todas as categorias') ?></a>

              <?php } else { ?>

                <a class="nav-link" href="<?php echo $args['url']; ?>#page-associados"><?php echo sh_associados_get_traducao2($args['lang'], 'Todas as categorias') ?></a>

              <?php } ?>

            </li>

            <?php foreach ($sections['itens'] as $SectionKey => $SectionVal) { ?>
				
              <?php if($SectionVal->section_id != 11) { ?>
            
                <li class="nav-item" role="presentation">
                
                  <?php if($section != null) { ?>
                  
                    <?php if($section == $SectionVal->section_id) { ?>
                    
                      <a id="page-associados-<?php echo $SectionVal->section_id; ?>" class="nav-link active"><?php echo $SectionVal->name; ?></a>
                  
                    <?php } else { ?>
                    
                      <a id="page-associados-<?php echo $SectionVal->section_id; ?>" class="nav-link" href="<?php echo $args['url']; ?>?section=<?php echo $SectionVal->section_id; ?>#page-associados"><?php echo $SectionVal->name; ?></a>

                    <?php } ?>

                  <?php } else { ?>

                    <a id="page-associados-<?php echo $SectionVal->section_id; ?>" class="nav-link" href="<?php echo $args['url']; ?>?section=<?php echo $SectionVal->section_id; ?>#page-associados"><?php echo $SectionVal->name; ?></a>

                  <?php } ?>

                </li>
              <?php } ?>

            <?php } ?>

          </ul>

        </div>
        <div class="d-table d-md-none w-100 sh-associados-page-navs mb-4 mb-md-3">
          
          <?php if($section == null) { ?>

            <button id="sh-associados-page-list-group-btn" class="btn w-100 dropdown-toggle" type="button" aria-expanded="false"><?php echo sh_associados_get_traducao2($args['lang'], 'Todas as categorias'); ?></button>

          <?php } else { ?>

            <?php $current_section = sh_associados_get_section( $args['wpdb'], $args['table_prefix'], $section, $args['idioma']); ?>
            <button id="sh-associados-page-list-group-btn" class="btn w-100 dropdown-toggle" type="button" aria-expanded="false"><?php echo $current_section['name']; ?></button>

          <?php } ?>
          <div class="collapse mt-1" id="sh-associados-page-list-group">
            
            <div class="list-group">

              <?php if($section != null) { ?>

                <button class="list-group-item sh-associados-page-navs-item" id="sh-associados-page-list-group-all" type="button" aria-selected=""><?php echo sh_associados_get_traducao2($args['lang'], 'Todas as categorias'); ?></button>

              <?php } ?>

              <?php foreach ($sections['itens'] as $SectionKey => $SectionVal) { ?>
				
                <?php if($SectionVal->section_id != 11) { ?>
              
                  <?php if($section == null) { ?>
                  
                    <button class="list-group-item sh-associados-page-navs-item" id="sh-associados-page-list-group-<?php echo $SectionVal->section_id; ?>" data-item="<?php echo $SectionVal->section_id; ?>" type="button" aria-selected=""><?php echo $SectionVal->name; ?></button>

                  <?php } else { ?>
                  
                    <?php if($section == $SectionVal->section_id) { ?>
                    
                      <button class="list-group-item sh-associados-page-navs-item active" id="sh-associados-page-list-group-<?php echo $SectionVal->section_id; ?>" data-item="<?php echo $SectionVal->section_id; ?>" type="button" aria-selected=""><?php echo $SectionVal->name; ?></button>

                    <?php } else { ?>
                    
                      <button class="list-group-item sh-associados-page-navs-item" id="sh-associados-page-list-group-<?php echo $SectionVal->section_id; ?>" data-item="<?php echo $SectionVal->section_id; ?>" type="button" aria-selected=""><?php echo $SectionVal->name; ?></button>

                    <?php } ?>

                  <?php } ?>
              
                <?php } ?>
              
              <?php } ?>

            </div>

          </div>

        </div>

      <?php } ?>

    </div>
    <div class="col-12 col-md-9">

      <?php if($stafflist['paginacao']['total'] >= 1) { ?>

        <div class="row">

          <div class="col-12">
            
            <a href="<?php echo $args['url'] . ( ($paged >= 2) ? 'page/' . $paged . '/' : '' ) . ( ($args['section'] != null) ? '?section=' . $args['section'] . ( ($args['order'] != null) ? '&order=' . ( ($order == 'ASC') ? 'DESC' : 'ASC' ) : '&order=' . ( ($order != null) ? ( ($order == 'ASC') ? 'DESC' : 'ASC' ) : 'DESC' ) ) : '?order=ASC' ); ?>#page-associados" class="btn btn-primary"><?php echo ( ($order != null) ? ( ($order == 'ASC') ? '<i class="fas fa-sort-amount-down-alt"></i> Descendente' : '<i class="fas fa-sort-amount-up-alt"></i> Ascendente' ) : '<i class="fas fa-sort-amount-up-alt"></i> Descendente' ); ?></a>
            <hr />

          </div>
          
        </div>

      <?php } ?>

      <?php if($stafflist['todos']['total'] >= 1) { ?>

        <?php if($stafflist['paginacao']['total'] >= 1) { ?>

          <div class="row row-cols-1 row-cols-md-4 g-3">

            <?php foreach ($stafflist['paginacao']['itens'] as $staffitem) { ?>

              <div class="col sh-associados-page-itens mb-3" data-item="<?php echo $staffitem->staff_id; ?>" data-idioma="<?php echo $args['idioma']; ?>">
                
                <div class="ratio ratio-1x1">
                
                  <div class="card w-100 h-100">
                    
                    <div class="card-body w-100 h-100">

                      <table class="d-table w-100 h-100 border-0">

                        <tr>

                          <td class="text-center align-middle p-0 border-0">

                            <div class="sh-associados-page-itens-bg">
                              
                              <table class="d-table w-100 h-100">
                                
                                <tr>

                                  <td class="text-center align-middle fs-3">

                                    <i class="fas fa-external-link-alt"></i>

                                  </td>

                                </tr>

                              </table>

                            </div>
                            <?php
                        
                              $image = '';
                              if (!empty($staffitem->image)) {
                                
                                $image = wp_get_attachment_image_src( $staffitem->image , 'medium' );
                                $image = $image[0];

                                echo '<img src="' . $image . '" class="img-fluid" />';
                              
                              }

                            ?>
                            
                          </td>
                          
                        </tr>
                        
                      </table>

                    </div>

                  </div>

                </div>
                <div class="d-table fw-bold mt-3 fs-5"><?php echo $staffitem->name; ?></div>
                <div class="d-table fw-normal fs-6">

                  <?php

                    $_section = '';
                    if(!empty($staffitem->section)) {

                      $_section = sh_associados_get_section( $args['wpdb'], $args['table_prefix'], $staffitem->section, $args['idioma']);
                      echo $_section['name'];

                    }

                  ?>
                    
                </div>

              </div>

            <?php } ?>

          </div>

          <?php if($stafflist['paginacao']['pagination'] != '') { ?>

            <div class="row">

              <div class="col-12 mb-2">
                
                <hr />

              </div>
              <div class="col-12 text-center mt-3">

                <?php echo $stafflist['paginacao']['pagination']; ?>

              </div>
              
            </div>

          <?php } ?>

        <?php } else { ?>

          <div class="row">

            <div class="col-12 fs-3 text-center fw-bold my-5">
              
              Nenhum resultado encontrado!

            </div>
          
          </div>

        <?php } ?>

        <div class="row">

          <div class="col-12">
            
            <hr />

          </div>
          <div class="col-12">
            
            <span class="fs-5 fw-bold my-3 d-table w-100">Confira a lista completa aqui</span>

          </div>

          <?php

            
            $itens    = $stafflist['todos']['itens'];
            $contagem = 0;
            $maximo   = ($stafflist['todos']['total'] / 4);
            for ($i = 1; $i <= 4; $i++) { 

              echo '<div class="col-12 col-md-3">' . "\n";
                
                for ($a = 0; $a < $maximo; $a++) {

                  if(array_key_exists($contagem, $itens)) {
                    
                    echo '<div class="sh-associados-page-itens sh-associados-page-nomes d-table w-100 text-start" data-idioma="' . $args['idioma'] . '" data-item="' . $itens[$contagem]->staff_id . '">' . $itens[$contagem]->name . '</div>' . "\n";

                  }

                  $contagem++;

                }

              echo '</div>' . "\n";

            }

          ?>
          
        </div>

      <?php } ?>

    </div>

  </div>
  
</div>
<div id="sh-associados-page-loading">

  <div class="justify-content-center">
    <div class="spinner-border" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
  
</div>


<div id="sh-associados-page-modal">

  <div id="sh-associados-page-modal-backdrop" class="position-fixed d-table top-0 start-0 w-100 h-100 opacity-50 bg-black" style="z-index: 9998;">&nbsp;</div>
  <table class="d-table w-100 h-100">
    
    <tr>

      <td class="text-center align-middle">
        
        <div id="sh-associados-page-modal-content">&nbsp;</div>

      </td>
      
    </tr>

  </table>
  
</div>