<?php

namespace App\Service;

use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * example:
 * $exporter = new ExcelExporter('nameYouWant', array $titles, array $dataSet)
 * $exporter->make();
 * 
 */



class ExcelExporter
{

    private $data, $aTitle, $border, $fileName, $titleBgColor;
    private $spreadSheet;
    public function __construct(string $fileName, array $aTitle, array $data)
    {
        $this->fileName = $fileName . date('Y-m-d');
        $this->aTitle = $aTitle;
        $this->data = $data;
        $this->spreadSheet = new Spreadsheet();
    }

    public function setTitleBgColor(string $color)
    {
        $this->titleBgColor = $color;
    }

    public function make()
    {
        set_time_limit(0);

        // switch to first worksheet 
        $currentSheet = $this->spreadSheet->getActiveSheet(0);
        // setting titles 
        foreach ($this->aTitle as $titleIndex => $titleVal) {
            $cellsLoc = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($titleIndex + 1) . '1';
            $currentSheet->setCellValue($cellsLoc, $titleVal);
            $currentSheet->getStyle($cellsLoc)
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB($this->titleBgColor);
        }

        //setting data row
        foreach ($this->data as $vIndex => $colValue) {
            $colValue = array_values($colValue);
            $vIndex += 2;
            foreach ($colValue as $hIndex => $cellValue) {
                $pos = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($hIndex + 1) . $vIndex;
                $currentSheet->setCellValue($pos, $cellValue);
            }
        }

        if ($this->border) {
            $style = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ]
                ]
            ];
            $currentSheet->getStyle('A1:' . $pos)->applyFromArray($style);
        }


        $cellIterator = $currentSheet->getRowIterator('1')->current()->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(true);
        foreach($cellIterator as $cell){
            $currentSheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }
        
    }

    public function downloadExcel(){
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $this->fileName. '.xls');
        header('Cache-Control: max-age=0');
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadSheet, 'Xls');
        $writer->save('php://output');
    }

    public function downloadCsv(){
        header('Content-Type: text/x-csv');
        header('Content-Disposition: attachment;filename=' . $this->fileName. '.csv');
        header('Cache-Control: max-age=0');
        $writer =  new \PhpOffice\PhpSpreadsheet\Writer\Csv($this->spreadSheet);
        $writer->save('php://output');
    }
}
