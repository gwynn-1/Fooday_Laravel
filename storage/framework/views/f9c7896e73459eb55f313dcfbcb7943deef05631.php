<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 11/16/2017
 * Time: 1:02 PM
 */


use Box\Spout\Writer;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;

//dd($title);

$oExcel =  Writer\WriterFactory::create(Type::XLSX); // for XLSX files
$oExcel->openToBrowser($title.".xlsx");

$oExcel->addRowWithStyle($table_title,(new StyleBuilder())->setFontBold()->setFontSize(14)->build());
foreach ($table as $sheet){
    $oExcel->addRow(get_object_vars($sheet));
}
$oExcel->close();
