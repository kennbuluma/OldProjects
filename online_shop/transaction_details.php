<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>


<?php 
//Check to see if the URL variable is set and that it exists in the db
if(isset($_GET['ID'])){
	$targetID = $_GET['ID'];
	//Use this var to check to see if this ID exists, if yes then get the event
	//details, if no then exit this script and give message why
	
require('pdf/fpdf.php');


	
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('times',"B",14);
$pdf->Image('css/images/logo.GIF',90,10,30);
$pdf->Ln(8);
$pdf->Ln(8);

$pdf->Cell(0,0,'SALE RECEIPT',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"",14);
$pdf->Cell(0,0,'I-Shop Computer And Accessories Distributors',0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'Cell: +25470222222',0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'Address: P.O BOX 1111 - 80100',0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'Mombasa, Kenya',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"B",10);
$add = mysql_query("UPDATE transaction SET status='1' WHERE ID ='$targetID'") or die(mysql_error());
$sql = mysql_query("SELECT * FROM transaction WHERE transaction_id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$transaction_id = $row["transaction_id"];
		$user=$row["user"]; 
		$total = $row["total"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
		
		}
	}	
$sql = mysql_query("SELECT * FROM customers WHERE Email='$user' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$Firstname=$row["Firstname"]; 
		$Lastname = $row["Lastname"];
		$Email = $row["Email"];
		$Telephone = $row["Telephone"];
		$Country = $row["Country"];
		$City = $row["City"];
		$Address_Street = $row["Address_Street"];
		$Address = $row["Address"];
		 
		}
	}
$pdf->Cell(35,8,'TRANSACTION NO: ', 0);
$pdf->SetFont('times',"",10);
$pdf->Cell(38,8,$transaction_id , 0);
$pdf->Ln(8);
$pdf->SetFont('times',"B",10);
$pdf->Cell(28,8,'Customer Name: ', 0);
$pdf->SetFont('times',"",10);
$pdf->Cell(20,8,$Firstname, 0);
$pdf->Cell(38,8,$Lastname, 0);
$pdf->Ln(8);
$pdf->SetFont('times',"B",10);
$pdf->Cell(28,8,'Customer Email: ', 0);
$pdf->SetFont('times',"",10);
$pdf->Cell(42,8,$Email, 0);

$pdf->SetFont('times',"B",10);
$pdf->Cell(14,8,'Phone: ', 0);
$pdf->SetFont('times',"",10);
$pdf->Cell(38,8,$Telephone, 0);


$pdf->Ln(8);
$pdf->SetFont('times',"B",10);
$pdf->Cell(9,8,'No:', 1);
$pdf->Cell(38,8,'Item Name.', 1);
$pdf->Cell(22,8,'Product ID', 1);
$pdf->Cell(22,8,'Unit Price', 1);
$pdf->Cell(48,8,'Quantity', 1);
$pdf->Cell(28,8,'Total', 1);

$pdf->Ln(8);

//Event Details
$pdf->SetFont('times',"",10);
$sql = mysql_query("SELECT * FROM cart WHERE transaction_id='$targetID' ");	
$item = 0;
while($row=mysql_fetch_array($sql)){
	$item=$item + 1;
	$pdf->Cell(9,8,$item, 1);
	$pdf->Cell(38,8,$row['ItemName'], 1);
	$pdf->Cell(22,8,$row['Product_ID'], 1);
	$pdf->Cell(22,8,$row['UnitPrice'], 1);
	$pdf->Cell(48,8,$row['Quantity'], 1);
	$pdf->Cell(28,8,$row['Total'], 1);
	$pdf->Ln(8);
	}
$pdf->SetFont('times',"B",10);
$pdf->Cell(125,8,'',0);
$pdf->Cell(15,8,'TOTAL:',0);
	
$pdf->Cell(28,8,$total, 0);
$pdf->Output();
}
?>
