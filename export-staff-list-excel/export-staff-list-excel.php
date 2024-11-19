<?php
/**
 * Plugin Name: Export Staff List to Excel
 * Description: Adiciona um botão na tela Staff List para exportar lista no formato Excel.
 * Version: 1.0
 * Author: SocialBit
 */
 
$plugin_dir = plugin_dir_path(__FILE__);
require $plugin_dir . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function add_export_button_to_plugin_page() {
    // Verifica se é a página do plugin staff-list
    if(current_user_can('administrator') && isset($_GET['page']) && $_GET['page'] == 'top_slug') {
        ?>
        
        <script>
		document.addEventListener('DOMContentLoaded', function() {
			
			let exportButton = document.createElement('a');
			exportButton.id = 'export-to-excel';
			exportButton.href = '#';
			exportButton.classList.add('button', 'button-wpml', 'button-lg', 'wp-staff-list-ui', 'wp-staff-list-ui', 'button-green');
			exportButton.innerHTML = 'Exportar para Excel';
			
			let wrapDiv = document.createElement('div');
			wrapDiv.classList.add('wrap-div-excel');
			wrapDiv.style.paddingTop = '20px';
			wrapDiv.style.paddingBottom = '20px';
			wrapDiv.appendChild(exportButton);
			
			let wpbody = document.getElementById('wpbody');
			let h1Element = wpbody.querySelector('h1');
			h1Element.parentNode.insertBefore(wrapDiv, h1Element.nextSibling);
			
			let loadingExcel = false;
			
			exportButton.addEventListener('click', function(event) {
				event.preventDefault();
				if(loadingExcel) {
					return;
				}
				
				loadingExcel = true;
				//desabilitando tag a
				exportButton.style.opacity = '0.5';
				exportButton.style.cursor = 'default';
				exportButton.innerHTML = 'Aguarde ...';
				
				let xhr = new XMLHttpRequest();
				xhr.open('POST', 'admin-ajax.php', true);
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function() {
					//abilitando tag a
					exportButton.style.opacity = '1';
					exportButton.innerHTML = 'Exportar para Excel';
					exportButton.style.cursor = 'pointer';
					loadingExcel = false;
					
					if (xhr.readyState === 4 && xhr.status === 200) {
						let response = JSON.parse(xhr.responseText);
						if (response.success) {
							// Redireciona para o arquivo Excel gerado
							//console.log(response.data.file_url);
							window.location.href = response.data.file_url;
						} else {
							console.error(response.message);
						}
					} else if (xhr.readyState === 4 && xhr.status !== 200) {
						console.error('Error: ' + xhr.status);
					}
				};

				let data = 'action=export_stafflist_to_excel';
				/*
				//verificar campo nome
				let staffSearchInput = document.getElementById('staff-search');
				if (staffSearchInput.value.trim() !== '') {
					data += '&name=' + staffSearchInput.value.trim();
				}
				*/
				let staffCategorySelect = document.getElementById('search-staff-category');
				//let selectedValue = staffCategorySelect.value;
				let selectedText = staffCategorySelect.options[staffCategorySelect.selectedIndex].textContent;
				// Verificar se o valor é diferente de "All"
				if (selectedText.trim() !== 'All') {
					data += '&category=' + selectedText.trim();
				}
				
				xhr.send(data);
			});
		});
        </script>
		<style>
			.button-green {
				background: #058d29 !important;
				border-color: #058d29 !important;
				color: #fff !important;
			}

			.button-green:hover {
				background: #30af52 !important;
				border-color: #30af52 !important;
				color: #fff !important;
			}
		</style>
        <?php
    }
}
add_action('admin_menu', 'add_export_button_to_plugin_page');

// Função para lidar com a exportação para o Excel
function handle_export_to_excel() {
    if (current_user_can('administrator') && isset($_POST['action']) && $_POST['action'] == 'export_stafflist_to_excel') {
        
		global $wpdb;
		$table_prefix = 'wp_';
		
		//$total_count = $wpdb->get_var("select count(*) from ".$table_prefix."stafflist");
		$query = "select list.*, vitae.vitae_language, vitae.vitae_url from ".$table_prefix."stafflist list LEFT JOIN (select staff_id, GROUP_CONCAT(language) as vitae_language, GROUP_CONCAT(url) as vitae_url from ".$table_prefix."vitae group by staff_id) vitae ON list.staff_id=vitae.staff_id";
		/*
		por enquanto não
		if(isset($_POST['name']) && $_POST['name'] !== "") {			
			list.name like '%".$staff_search_name."%' 
		}
		*/
		if(isset($_POST['category']) && $_POST['category'] !== "" && $_POST['category'] !== "All") {
			$staff_search_category = $_POST['category'];
			$query .= " where list.category like '%". $staff_search_category ."%'";
		}
		
		$query .= " order by list.category, list.name";
		
		$result = $wpdb->get_results($query);	
		
		// Iniciar a biblioteca PHPExcel			
		$spreadsheet = new Spreadsheet();
		
		// Set document properties
		$spreadsheet->getProperties()->setCreator('wp_stafflist')
		->setLastModifiedBy('wp_stafflist')
		->setTitle('StaffList Document')
		->setSubject('StaffList Document')
		->setDescription('Staff List excel generated using WP')
		->setKeywords('rms StaffList ccbc')
		->setCategory('List');
		
		$sheet = $spreadsheet->getActiveSheet();
		// Definir cabeçalhos das colunas
		$spreadsheet->setActiveSheetIndex(0);
		
		$sheet->setCellValue('A1', 'Name')
			->setCellValue('B1', 'Category')
			->setCellValue('C1', 'Address')
			->setCellValue('D1', 'Phone')
			->setCellValue('E1', 'Phone2')
			->setCellValue('F1', 'Fax')
			->setCellValue('G1', 'Email')
			->setCellValue('H1', 'Nationality')
			->setCellValue('I1', 'Languages')
			->setCellValue('J1', 'Languages ES')
			->setCellValue('K1', 'Languages PT')
			->setCellValue('L1', 'Instagram Link')
			->setCellValue('M1', 'Facebook Link')
			->setCellValue('N1', 'Linkedin Link')
			->setCellValue('O1', 'Staff ID')
			->setCellValue('P1', 'Person Type')
			->setCellValue('Q1', 'Vitae Language')
			->setCellValue('R1', 'Vitae Url')
			->setCellValue('S1', 'Countries Licensed')
			->setCellValue('T1', 'Countries Licensed ES')
			->setCellValue('U1', 'Countries Licensed PT')
			->setCellValue('V1', 'Descrição PT')
			->setCellValue('W1', 'Descrição EN')
			->setCellValue('X1', 'Descrição FR')
			->setCellValue('Y1', 'Descrição ES');
		
        if ($result) {
            // Adicionar mais colunas conforme necessário
			
			$cellKeys = array(43 => 'V', 4 => 'X', 1 => 'W', 2 => 'Y');
			
            // Preencher os dados dos posts
            $rowIndex  = 2;
			
			foreach ($result as $row) {
				
				/* gerando descricao */
				$description_decoded = json_decode($row->description, true, 512, JSON_UNESCAPED_UNICODE);
				
				$key2 = '';
				foreach ($description_decoded as $key => $value) {
					
					$numero = (int)$key;
					
					if(isset($cellKeys[$numero])) {
						$key2 = $cellKeys[$numero];
						
						$value = str_replace("\n", "", $value);
						$value = stripslashes($value);
						
						$sheet->setCellValue($key2 . $rowIndex, $value);
					}					
				};
				/* .gerando descricao */
				
				//$data_description = json_encode($description_decoded, JSON_UNESCAPED_UNICODE);
				
				$sheet->setCellValue('A' . $rowIndex, $row->name);
				$sheet->setCellValue('B' . $rowIndex, $row->category);
				$sheet->setCellValue('C' . $rowIndex, $row->address);
				$sheet->setCellValue('D' . $rowIndex, $row->phone);
				$sheet->setCellValue('E' . $rowIndex, $row->phone2);
				$sheet->setCellValue('F' . $rowIndex, $row->fax);
				$sheet->setCellValue('G' . $rowIndex, $row->email);
				$sheet->setCellValue('H' . $rowIndex, $row->nationality);
				$sheet->setCellValue('I' . $rowIndex, $row->languages);
				$sheet->setCellValue('J' . $rowIndex, $row->languages_es);
				$sheet->setCellValue('K' . $rowIndex, $row->languages_pt);
				$sheet->setCellValue('L' . $rowIndex, $row->instagram_link);
				$sheet->setCellValue('M' . $rowIndex, $row->facebook_link);
				$sheet->setCellValue('N' . $rowIndex, $row->linkedin_link);			
				$sheet->setCellValue('O' . $rowIndex, $row->staff_id);
				$sheet->setCellValue('P' . $rowIndex, $row->personType);
				$sheet->setCellValue('Q' . $rowIndex, $row->vitae_language);
				$sheet->setCellValue('R' . $rowIndex, $row->vitae_url);				
				$sheet->setCellValue('S' . $rowIndex, $row->countries_licensed);			
				$sheet->setCellValue('T' . $rowIndex, $row->countries_licensed_es);			
				$sheet->setCellValue('U' . $rowIndex, $row->countries_licensed_pt);
				
                $rowIndex ++;
			}
			
			// Criar o objeto Writer para salvar o arquivo Excel
			$writer = new Xlsx($spreadsheet);
			
			// Salvar o arquivo Excel na saída de dados (output)
			$fileName = date("YmdHis");
			$writer->save(plugin_dir_path(__FILE__) . '/upload/xlsx/' . $fileName . '_stafflist.xlsx');
			
			// Limpar a memória
			unset($writer);
			$spreadsheet->disconnectWorksheets();
			unset($spreadsheet);
			
            // Encerrar a execução e enviar a resposta JSON
            wp_send_json_success(array(
                'file_url' => admin_url('admin-ajax.php?action=download_excel&file=' . $fileName)
            ));
			
        } else {
            wp_send_json_error('Nenhum resultado encontrado.');
        }
    }
}
add_action('wp_ajax_export_stafflist_to_excel', 'handle_export_to_excel');
//add_action('wp_ajax_nopriv_export_stafflist_to_excel', 'handle_export_to_excel');

// Função para fazer o download do arquivo Excel
function download_excel() {
    if (current_user_can('administrator') && isset($_GET['action']) && isset($_GET['file']) &&  $_GET['action'] == 'download_excel') {
        
		$file_path = plugin_dir_path(__FILE__) . '/upload/xlsx/' . $_GET['file'] . '_stafflist.xlsx';		
		// Configurar o cabeçalho e o tipo de conteúdo do arquivo Excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $_GET['file'] . '_stafflist.xlsx"');
		
        // Redirecionar para o arquivo Excel gerado pela exportação
        readfile($file_path);
		
		//remover somente arquivos do dia anterior
		$directory = plugin_dir_path(__FILE__) . '/upload/xlsx/';
		$today = strtotime('today');		
		$files = glob($directory . '*.xlsx');
		
		foreach ($files as $file) {
			if (is_file($file) && filemtime($file) < $today) {
				unlink($file);
			}
		}
        // Encerrar a execução
        exit;
    }
}
add_action('init', 'download_excel');
