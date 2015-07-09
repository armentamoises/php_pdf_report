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

include 'fpdf.php';

class PDFreport extends Fpdf{

      public function table($colors, $columns, $rows, $format, $title){           
            
            /**
            FPDF uses a few fonts by default, you don't have to add them (Helevetica & Times for instance), 
            but if you converted a font to a php file in order to use it, then you have to add the font by specifying a file.
            Font files should be placed in 'font' folder.
            */
            if($format['font'] != 'arial' AND  $format['font'] != 'times'){
                  switch ($format['font']) {
                        case 'segoe':
                              $this->AddFont('segoe','','segoeui.php');
                              break;
                        
                        default:
                              $this->AddFont('segoe','','segoeui.php');
                              $format['segoe'];
                              break;
                  }     
            }
            
            /**
            Title
            */
            $this->SetFillColor($colors['even_row']['r'], $colors['even_row']['g'], $colors['even_row']['b']);
            $this->SetFont($format['font'],'', $format['font_size']+2);
            $this->Cell(260, 15, $title,0,1,'C',true);
            $this->Ln($format['row_height']);

            /**
            Columns
            */
            $this->SetFont($format['font'],'', $format['font_size']);

            $contador   = 1;
            $header     = array();
            $width      = array();

            $this->SetTextColor($colors['text_th']['r'], $colors['text_th']['g'], $colors['text_th']['b']);
            $this->SetDrawColor($colors['border']['r'], $colors['border']['g'], $colors['border']['b']);
            
            while ( $contador <= sizeof($columns)  ) {
                  $header[$contador - 1] = '';
                  $width [$contador - 1] = $columns[$contador - 1]['width'];
                  $contador ++;
            }
            
            for($i=0;$i<count($header);$i++)

            $contador = 0;
            
            while ($contador < sizeof($columns) ) {
                  
                  if($contador % 2 == 0){
                        $this->SetFillColor($colors['odd_column']['r'], $colors['odd_column']['g'], $colors['odd_column']['b']);
                  }else{
                        $this->SetFillColor($colors['even_column']['r'], $colors['even_column']['g'], $colors['even_column']['b']);      
                  }

                  $this->Cell($width[$contador],$format['row_height']+1.5, $columns[$contador]['title'],1,0,'C', true);
                  $contador ++;     
            }
            
            $this->Ln($format['row_height']+1.5);
            $this->SetTextColor($colors['text']['r'], $colors['text']['g'], $colors['text']['b']);
            
            /**
            Rows
            */

            foreach ($rows as $key => $row) {
                  $keys = array_keys($row);
                  if($key % 2 == 0){
                        $this->SetFillColor($colors['odd_row']['r'], $colors['odd_row']['g'], $colors['odd_row']['b']);
                  }else{
                        $this->SetFillColor($colors['even_row']['r'], $colors['even_row']['g'], $colors['even_row']['b']);      
                  }

                  $contador = 0;
            
                  while ($contador < sizeof($columns) ) {
            
                        $this->Cell($width[$contador],$format['row_height'], $rows[$key][$keys[$contador]],1,0,'C', true);
                        $contador ++;
                        
                  }
                  $this->Ln($format['row_height']);
            }
      }  
}

?>