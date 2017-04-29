<?php
require_once app_path('Frameworks/html2pdf/vendor/autoload.php');

ob_start();
?>

<page>
    <h1>Exemple d'utilisation</h1>
    <br>
    TEST <b>exemple d'utilisation</b>
    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
</page>

<?php
$content = ob_get_clean();

require_once app_path('Frameworks/html2pdf/vendor/autoload.php');
try 
{
	$html2pdf = new \HTML2PDF('P','A4','en');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('exemple.pdf');
}
catch (\HTML2PDF_exception $e)
{
	echo $e;
	exit;
}
?>