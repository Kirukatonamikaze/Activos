<?php 

	session_start();
	require __DIR__ . "/vendor/autoload.php";
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	$Fecha = date('Y-m-d'); 

	if(isset($_SESSION['activos_fincas'])){
		//bajamos los datos que se encuentran almacenados en session
		$datos = $_SESSION['activos_fincas'];
		//configuramos la zona horaria
		setlocale(LC_ALL, 'es_ES');
		$numeromes  = date('m');
		$dateObj   = DateTime::createFromFormat('!m', $numeromes);
		$nombremes = strftime('%B', $dateObj->getTimestamp());
		$documento = new Spreadsheet();
		$sheet = $documento->getActiveSheet();
		//Bordes de las celdas
		$bordesceldas = array(
			 'borders' => array( 
			 	'allBorders' => array( 
			 		'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			 		'color' => array(
			 			'rgb' => '00000000'), 
			 			), 
				 	), 
				);
		//estilos para las celdas del documento
		$estilotitulo = array(
	    	'font'  => array(
		        'bold'  => true,
		        'size'  => 12,
		        'name'  => 'Arial Black'
	    	)
	    );
	    $estilocontenido = array(
	    	'font'  => array(
		        'bold'  => false,
		        'size'  => 13,
		        'name'  => 'Arial'
	    	)
	    );
	    $estilocabeceras = array(
	    	'font'  => array(
		        'bold'  => true,
		        'size'  => 12,
		        'name'  => 'Arial Black'
	    	)
	    );
	    //Propiedades del documento
	    $documento
		    ->getProperties()
		    ->setCreator("C.I. TROPICAL")
		    ->setLastModifiedBy('Ing. Martinez') // última vez modificado por
		    ->setTitle('Informe de Ingresos')
		    ->setSubject('Este es un documento de excel con informacio relacionada a cada uno de los ingresos registrados en el sistema.')
		    ->setDescription('Este documento fue generado para app.citropical.net')
		    ->setKeywords('ingreso informe tropical')
		    ->setCategory('Informes');
		//Zoom de la hoja de excel
		$sheet->getSheetView()->setZoomScale(90);
		//Centrar el texto de las celdas seleccionadas
		$sheet->getStyle('A7:L7')->getAlignment()->setHorizontal('center');
		//Estilos cabeceras del documento
		$documento->getActiveSheet()->getStyle('A7:L7')->applyFromArray($estilocabeceras);
		//Ancho de las columnas
		$sheet->getColumnDimension('A')->setWidth(20);
		$sheet->getColumnDimension('B')->setWidth(20);
		$sheet->getColumnDimension('C')->setWidth(20);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(25);
		$sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('G')->setWidth(25);
		$sheet->getColumnDimension('H')->setWidth(25);
		$sheet->getColumnDimension('I')->setWidth(25);
		$sheet->getColumnDimension('J')->setWidth(25);
		$sheet->getColumnDimension('K')->setWidth(25);
		$sheet->getColumnDimension('L')->setWidth(25);

		//Altura de las filas
		       
		       //Encabezado del documento
		        $sheet->setCellValue('A2',"Autor:")->setCellValue('B2', $_SESSION['usuario']->PKUsuario);  
		        if (isset($_SESSION['activos_fincas'][0]['Existe']) && isset($_SESSION['activos_fincas'][0]['Existe']) == 1){
		        	$sheet->setCellValue('A3',"Finca:")->setCellValue('B3', "Todas"); 
		        }else{
		        	$sheet->setCellValue('A3',"Finca:")->setCellValue('B3', $_SESSION['activos_fincas'][0]['Finca']); 
		        }
		        $sheet->setCellValue('A4',"Fecha:")->setCellValue('B4', date('d/m/Y'));  
		        

		//Contenido de las cabeceras del documento
		$sheet->setCellValue('A7',"Código")
			  ->setCellValue('B7',"Nombre")
			  ->setCellValue('C7',"Marca")
			  ->setCellValue('D7',"Modelo")
			  ->setCellValue('E7',"Serie")
			  ->setCellValue('F7',"Costo")
			  ->setCellValue('G7',"Fecha Asignacion")
			  ->setCellValue('H7',"Ubicación")
			  ->setCellValue('I7',"Observaciones")
			  ->setCellValue('J7',"Responsable")
			  ->setCellValue('K7',"Finca")
			  ->setCellValue('L7',"Sociedad");
			
		//llenado dinamico del documento de excel



		$row = 8;
	  	foreach ($datos as $d){
	  		$sheet->setCellValue('A'.$row,$d['PKId_Activo'])
	  		      ->setCellValue('B'.$row,$d['Nombre_Activo'])
	  		      ->setCellValue('C'.$row,$d['Marca'])
	  			  ->setCellValue('D'.$row,$d['Modelo'])
	  			  ->setCellValue('E'.$row,$d['Serie'])
	  			  ->setCellValue('F'.$row,$d['Costo'])
	  			  ->setCellValue('G'.$row,$d['Fecha'])
	  			  ->setCellValue('H'.$row,$d['localizacion'])
	  			  ->setCellValue('I'.$row,$d['Observaciones'])
	  			  ->setCellValue('J'.$row,$d['Responsable'])
	  			  ->setCellValue('K'.$row,$d['Finca'])
	  			  ->setCellValue('L'.$row,$d['Descripcion_Razon']);
	  		$row = $row + 1;
	  	}
	  	$sheet->getStyle('A7:L7')->applyFromArray($bordesceldas);
	  	$sheet->getStyle('A7:L'.($row-1))->applyFromArray($bordesceldas);
	  	$sheet->setAutoFilter("A7:L7");
	  	$nombre_achivo = "activos_fincas".date('Y-m-d his').".xlsx";
		/**
		 * Los siguientes encabezados son necesarios para que
		 * el navegador entienda que no le estamos mandando
		 * simple HTML
		 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
		*/ 
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nombre_achivo . '"');
		header('Cache-Control: max-age=0');
		$writer = IOFactory::createWriter($documento, 'Xlsx');
		$writer->save('php://output');
		exit;
	}else{
		header('location:index.php');
	}