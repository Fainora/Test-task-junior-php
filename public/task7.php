<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$fileName = './excel/Books.xlsx';

createReport($db, $fileName);

function readExcelFile($db, $fileName) 
{
    if(!file_exists($fileName)) {
        echo $_SESSION['message'] = "File '$fileName' not found";
        unset($_SESSION['message']);
        
        return false;
    }
    
    $array_books = [];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    
    if(in_array($file_ext, $allowed_ext)) {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileName);
        $data = $spreadsheet->getActiveSheet()->toArray();
    
        $count = 0;
        foreach($data as $row) {
            if($count > 0) {
                $book_name = $row[0];
    
                $sql = $db->query("SELECT `name` FROM `books` WHERE `name` = '$book_name'");
                $name = $sql->fetchColumn();

                if($name !== false) {
                    array_push($array_books, $name);
                }
            } else {
                $count = 1;
            }
        }

        return $array_books;
    } else {
        echo $_SESSION['message'] = 'Invalid File';
        unset($_SESSION['message']);
    }
}

function createReport($db, $fileName)
{
    $path = './excel/';
    $file = 'Report';
    $file_ext = 'xlsx';
    $data = readExcelFile($db, $fileName);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Книга');
    $sheet->setCellValue('B1', 'Авторы');

    $rowCount = 2;
    foreach($data as $row) {
        $sql = $db->query("SELECT `b`.`name` as `book`,
            GROUP_CONCAT(`a`.`name` ORDER BY `a`.`name` SEPARATOR ', ') `authors`
            FROM `Books` as `b`
            INNER JOIN `author_books` as `ab` ON `b`.`id` = `ab`.`book_id` 
            INNER JOIN `authors` `a` ON `ab`.`author_id` = `a`.`id`
            WHERE (`b`.`id` = `ab`.`book_id`) AND (`b`.`name` = '".$row."') AND (`a`.`id` = `ab`.`author_id`)
            GROUP   BY `b`.`id`, `b`.`name`");
        $res = $sql->fetchAll();

        $sheet->setCellValue('A' . $rowCount, $res[0]['book']);
        $sheet->setCellValue('B' . $rowCount, $res[0]['authors']);

        $rowCount++;
    }

    if($file_ext === 'xlsx') {
        $writer = new Xlsx($spreadsheet);
        $filename = $file . '.xlsx';
    } elseif($file_ext === 'xls') {
        $writer = new Xls($spreadsheet);
        $filename = $file . '.xls';
    } elseif($file_ext === 'csv') {
        $writer = new Csv($spreadsheet);
        $filename = $file . '.csv';
    }

    $writer->save($path . $filename);

    echo $_SESSION['message'] = 'File uploaded';
    unset($_SESSION['message']);
}