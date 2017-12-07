<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 11/16/2017
 * Time: 4:40 PM
 */
use Box\Spout\Common\Type;
use Box\Spout\Reader;

print_r($_FILES["excelFile"]);

//$excel_file = file_get_contents("php://input");
//file_put_contents("uploads/uploadexcel.xlsx", $excel_file);

//$reader = Reader\ReaderFactory::create(Type::XLSX); // for XLSX files
////$reader = ReaderFactory::create(Type::CSV); // for CSV files
////$reader = ReaderFactory::create(Type::ODS); // for ODS files
//
//$reader->open("php://input");
//
//foreach ($reader->getSheetIterator() as $sheet) {
//    foreach ($sheet->getRowIterator() as $row) {
//        // do stuff with the row
//        print_r($row);
//    }
//}
//
//$reader->close();