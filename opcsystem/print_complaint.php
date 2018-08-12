<?php
include 'session.php';
//Check to see if the URL variable is set and that it exists in the db
if(isset($_GET["cmp"])){
require('pdf/wordwrap.php');

	$get_cmp = $_GET["cmp"];
	if ($get_cmp == "alcpm")
	{ //print all complaints
echo "print all";
$pdf = new FPDF();

		$pdf->AddPage();
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",14);
		$pdf->Image('su/images/icon.png',90,10,20);
		$pdf->Ln(8);
		$pdf->Ln(8);
	
		$pdf->Cell(0,12,'Online Passenger Complaint System',0,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('times',"",14);
		$pdf->Cell(0,5,'All Complaints',0,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(9,8,'No:', 1);
		$pdf->Cell(30,8,'Passenger Name', 1);
		$pdf->Cell(35,8,'Email', 1);
		$pdf->Cell(20,8,'Issue Date', 1);
		$pdf->Cell(30,8,'Title', 1);
		$pdf->Cell(25,8,'Response date', 1);
		$pdf->Cell(30,8,'Response Status', 1);

		$pdf->Ln(8);
		
		//fetch complaints that have been responded to
		$all_rp = "SELECT * FROM complaint;";
		$all_rp_result = mysqli_query($connection, $all_rp) or die ("Failed to execute query."); 
		$all_rp_count = mysqli_num_rows($all_rp_result);
		$all_rp_row = mysqli_fetch_array($all_rp_result, MYSQLI_ASSOC);
		$ccount = 0;
		while($all_rp_row = mysqli_fetch_array($all_rp_result, MYSQLI_ASSOC)){
				$cdate = $all_rp_row['issuedate'];
				$rdate = $all_rp_row['responsedate'];
				$response = $all_rp_row['feedback_status'];
				$cmp = $all_rp_row['complaint'];
				$username = $all_rp_row['usermail'];
				$cmp_id = $all_rp_row['complaint_id'];
		
				$rctype = "SELECT * FROM complaint_type WHERE complaint_id = '$cmp_id';";
				$rc_result = mysqli_query($connection, $rctype) or die ("Failed to execute query.");
				$rc_row = mysqli_fetch_array($rc_result, MYSQLI_ASSOC);
				$ctype = $rc_row['complaint_type'];
		
				$ruser = "SELECT * FROM user WHERE usermail = '$username';";
				$ruser_result = mysqli_query($connection, $ruser) or die ("Failed to execute query.");
				$ruser_row = mysqli_fetch_array($ruser_result, MYSQLI_ASSOC);
				$ufname = $ruser_row['fname'];
				$ulname = $ruser_row['lname'];
				$ccount=$ccount + 1;
				$pdf->SetFont('times',"",10);
				$pdf->Cell(9,8,$ccount, 1);
				$pdf->Cell(30,8,$ufname." ".$ulname, 1);
				$pdf->Cell(35,8,$username, 1);
				$pdf->Cell(20,8,$cdate, 1);
				$pdf->Cell(30,8,$ctype, 1);
				$pdf->Cell(25,8,$rdate, 1);
				$pdf->Cell(30,8,$response, 1);
				$pdf->Ln(8);
			
		}	
		ob_end_clean();
		$pdf->Output();
} 
	else 
	{ 
		//Create pdf document
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('times',"B",14);
		$pdf->Image('su/images/icon.png',90,10,20);
		$pdf->Ln(8);
		$pdf->Ln(8);
	
		$pdf->Cell(0,12,'Online Passenger Complaint System',0,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('times',"",14);
		$pdf->Cell(0,5,'Individual Complaint',0,0,'C');
		$pdf->Ln(8);
		$pdf->SetFont('times',"",10);
		$pdf->SetFont('times',"",10);
		//
		$rp = "SELECT * FROM complaint WHERE id = '$get_cmp';";
		$rp_result =  mysqli_query($connection, $rp) or die ("Failed to execute.");
		$rp_count = mysqli_num_rows($rp_result);
		$rp_row = mysqli_fetch_array($rp_result, MYSQLI_ASSOC);
			
		$cdate = $rp_row['issuedate'];
		$rdate = $rp_row['responsedate'];
		$responsestatus = $rp_row['feedback_status'];
		$cmp = $rp_row['complaint'];
		$username = $rp_row['usermail'];
		$cmp_id = $rp_row['complaint_id'];
		
		$rctype = "SELECT * FROM complaint_type WHERE complaint_id = '$cmp_id';";
		$rc_result = mysqli_query($connection, $rctype) or die ("Failed to execute query.");
		$rc_row = mysqli_fetch_array($rc_result, MYSQLI_ASSOC);
		$ctype = $rc_row['complaint_type'];
		
		$ruser = "SELECT * FROM user WHERE usermail = '$username';";
		$ruser_result = mysqli_query($connection, $ruser) or die ("Failed to execute query.");
		$ruser_row = mysqli_fetch_array($ruser_result, MYSQLI_ASSOC);
		$ufname = $ruser_row['fname'];
		$ulname = $ruser_row['lname'];
		//
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(30,8,"Name: ", 0);
		$pdf->SetFont('times',"",10);
		$pdf->Cell(50,8,$ufname." ".$ulname, 0);
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(30,8,"Email: ", 0);
		$pdf->SetFont('times',"",10);
		$pdf->Cell(50,8,$username, 0);
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(30,8,"Issue date: ", 0);
		$pdf->SetFont('times',"",10);
		$pdf->Cell(50,8,$cdate, 0);
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(30,8,"Response status: ", 0);
		$pdf->SetFont('times',"",10);
		$pdf->Cell(20,8,$responsestatus, 0);
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(0,5,'Complaint Type: '.$ctype,0,0,'C');
		$pdf->SetFont('times',"",10);
		$pdf->Ln(8);
		$pdf->SetFont('times',"B",10);
		$pdf->Cell(30,5,"Complaint: ", 0);
		$pdf->SetFont('times',"",10);
		$pdf->MultiCell(170,5,$cmp);
		$pdf->Ln(8);
		
		ob_end_clean();
		$pdf->Output();
}

}
?>