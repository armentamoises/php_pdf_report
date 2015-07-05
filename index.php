<?php
/**
|--------------------------------------------------------------------------
| PDF Report(Table)
|--------------------------------------------------------------------------
|
| Version:  1.0
| Date:     2015-07-05
| Author:   Moises Armenta
|--------------------------------------------------------------------------
*/

	include 'pdf_reports_class.php';

	$reporte = new PDFreport();
	$reporte->AliasNbPages();
	$reporte->AddPage('L','Letter');
	$today   = date('Y-m-d');

	/**
    RGB Colors
    */
	$colors   = array(	'text' 			=> array('r' => 50, 	'g' => 50, 		'b' => 50),
						'text_th' 		=> array('r' => 255, 	'g' => 255, 	'b' => 255),
						'border' 		=> array('r' => 230, 	'g' => 230, 	'b' => 230),
						'odd_column' 	=> array('r' => 0, 	    'g' => 159, 	'b' => 229),
						'even_column' 	=> array('r' => 234, 	'g' => 48, 		'b' => 28),
						'odd_row' 		=> array('r' => 250, 	'g' => 250, 	'b' => 250),
						'even_row' 		=> array('r' => 230, 	'g' => 230, 	'b' => 230)
					);	

	$format	  = array(  'row_height' => 5, 'font' => 'segoe', 'font_size' => 10);
				
	$columns  = array(	0 => array('width' => 20, 'title' => 'ID'),
						1 => array('width' => 80, 'title' => 'Name'),
						2 => array('width' => 80, 'title' => 'Family'),
						3 => array('width' => 80, 'title' => 'From') 
					);
	/**
    Your database's query result goes here
    */
	$rows	  = array(  0  => array('id' => 1,  'name' => 'Eddard', 	'family_name' => 'Stark', 		'from' => 'Winterfell'),
						1  => array('id' => 2,  'name' => 'Daenerys', 	'family_name' => 'Targaryen', 	'from' => 'Dragonstone'),
						2  => array('id' => 3,  'name' => 'Catelyn', 	'family_name' => 'Stark', 		'from' => 'Winterfell'),
						3  => array('id' => 4,  'name' => 'Robert', 	'family_name' => 'Baratheon', 	'from' => "Stormlands"),
						4  => array('id' => 5,  'name' => 'Cersei', 	'family_name' => 'Lannister', 	'from' => 'Casterly Rock'),
						5  => array('id' => 6,  'name' => 'Jaime', 		'family_name' => 'Lannister', 	'from' => 'Casterly Rock'),
						6  => array('id' => 7,  'name' => 'Jon', 		'family_name' => 'Stark', 		'from' => 'Winterfell'),
						7  => array('id' => 8,  'name' => 'Robb', 		'family_name' => 'Stark', 		'from' => 'Winterfell'),
						8  => array('id' => 9,  'name' => 'Sansa', 		'family_name' => 'Stark', 		'from' => 'Winterfell'),
						9  => array('id' => 10, 'name' => 'Arya', 		'family_name' => 'Stark', 		'from' => 'Winterfell'),
						10 => array('id' => 11, 'name' => 'Loras', 		'family_name' => 'Tyrell', 		'from' => 'Highgarden'),
						11 => array('id' => 12, 'name' => 'Renly', 		'family_name' => 'Baratheon', 	'from' => 'Stormlands'),
						12 => array('id' => 13, 'name' => 'Stannis', 	'family_name' => 'Baratheon', 	'from' => 'Stormlands'),
						13 => array('id' => 14, 'name' => 'Margaery', 	'family_name' => 'Tyrell', 		'from' => 'Highgarden'),
						14 => array('id' => 15, 'name' => 'Brandon', 	'family_name' => 'Stark', 		'from' => 'Winterfell'),
						15 => array('id' => 16, 'name' => 'Rickon', 	'family_name' => 'Stark', 		'from' => 'Winterfell'),
						16 => array('id' => 17, 'name' => 'Viserys', 	'family_name' => 'Targaryen', 	'from' => 'Dragonstone'),
						17 => array('id' => 18, 'name' => 'Tywin', 		'family_name' => 'Lannister', 	'from' => 'Casterly Rock'),
						18 => array('id' => 19, 'name' => 'Lyana', 		'family_name' => 'Stark', 		'from' => 'Winterfell'),
						19 => array('id' => 20, 'name' => 'Theon', 		'family_name' => 'Greyjoy', 	'from' => 'Iron Ilands'),
						20 => array('id' => 21, 'name' => 'Joffrey', 	'family_name' => 'Baratheon', 	'from' => "King's Landing"),
						21 => array('id' => 22, 'name' => 'Tommen', 	'family_name' => 'Baratheon', 	'from' => "King's Landing"),
						22 => array('id' => 23, 'name' => 'Myrcella', 	'family_name' => 'Baratheon', 	'from' => "King's Landing"),
						23 => array('id' => 24, 'name' => 'Doran', 		'family_name' => 'Martell', 	'from' => "Dorne"),
						24 => array('id' => 25, 'name' => 'Oberyn', 	'family_name' => 'Martell', 	'from' => "Dorne")



					); 

	$reporte->table($colors, $columns, $rows, $format, 'REPORT TITLE');
	
	$reporte->Output('Report_'.$today, 'I');

?>