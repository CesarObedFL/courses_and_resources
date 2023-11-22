<?php

require $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/vendor/autoload.php';

#require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$html2pdf = new Html2Pdf();

//$html = "<h1 style='background:green;'>HelloWorld</h1>This is my first test";
//$html2pdf->writeHTML($html);
//$html2pdf->output('pdf_generated.pdf');

// to print a, specific view
try {
    ob_start();
    include $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php//libraries_project/pdf_generator/document.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}