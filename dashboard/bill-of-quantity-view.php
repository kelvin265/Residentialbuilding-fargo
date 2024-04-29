<?php
    require_once "classes/phase.php";
    require_once "classes/activity.php";

    //  selecting all phases
    $phase= new Phase();
    $phases = $phase->selectAll();
    $phaseRows = [];
    while ($row = $phases->fetch_assoc()) {
        $phaseRows[] = $row;
    }

    $activity = new Activity();
    // retrieving data for estimated activities
    $query = "select * from activities where project_id ='".$_GET['project_id']."' and estimated=1";
    $activities = $activity->select($query);
    $estActivities = [];
    while ($row = $activities->fetch_assoc()) {
        $estActivities[] = $row;
    }
    // retrieving data for estimated activities
    $query = "select Concat(u.first_name, ' ', u.last_name) AS customer, p.project_name from users u, projects p where u.user_id = p.customer_id and p.project_id ='".$_GET['project_id']."'";
    $activities = $activity->select($query);
    $customer;
    $project;
    while ($row = $activities->fetch_assoc()) {
        $customer = $row['customer'];
        $project = $row['project_name'];
    }
?>

<?php
require_once('../vendor/autoload.php');

use TCPDF as TCPDF;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connect to the database (assuming you have already established a database connection)

// Retrieving data for estimated activities
// Assuming $estActivities is already populated from the database
// Example data population is removed for brevity

// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information and add a page
$pdf->SetCreator('Residential Building Fargo');
$pdf->SetTitle('Bill of Quantity Report');
$pdf->AddPage();

// Add a logo to the PDF at the top
$logoPath = 'assets/img/logo.jpg'; // Specify the path to your logo image
$pdf->Image($logoPath, 80.5, 20, 50); // Adjust the coordinates and size as needed

// Move the pointer to below the logo
$pdf->SetY(50); // Adjust the Y-coordinate as needed

// Add the title "Bill of Quantity" centered
$pdf->SetFont('helvetica', 'B', 22); // Set font to bold
$pdf->Cell(0, 10, 'Bill of Quantity', 0, 1, 'C'); // Output the title centered and move to the next line

$pdf->SetFont('helvetica', '', 14);
$pdf->SetXY(10, 70); // Set position for customer name
$pdf->Cell(0, 10, 'Customer: '.$customer, 0, 1); // Output customer name
$pdf->SetX(10); // Set position for project name
$pdf->Cell(0, 10, 'Project: '.$project, 0, 1); // Output project name

// Move the pointer to below the logo
$pdf->SetY(95);

// Add content to the PDF
$pdf->SetFont('helvetica', '', 12); // Set font to regular
$html = '<table border="1" style="border-collapse: collapse;">'; // Add border-collapse style for better appearance
$html .= '<thead><tr><th style="padding: 8px;">Phase</th><th style="padding: 8px;">Activity</th><th style="padding: 8px;">Start Date</th><th style="padding: 8px;">End Date</th><th style="padding: 8px;">Cost</th></tr></thead>';
$html .= '<tbody>';
foreach ($estActivities as $act) {
    $html .= '<tr>';
    // Retrieve phase name from phaseRows array
    $phaseName = '';
    foreach ($phaseRows as $row) {
        if ($row['phase_id'] == $act['phase_id']) {
            $phaseName = $row['name'];
            break;
        }
    }
    $html .= '<td style="padding: 10px;">' . $phaseName . '</td>';
    $html .= '<td style="padding: 10px;">' . $act['description'] . '</td>';
    $html .= '<td style="padding: 10px;">' . $act['start_date'] . '</td>';
    $html .= '<td style="padding: 10px;">' . $act['end_date'] . '</td>';   
    $totalActivityCost = $activity->totalActivityCost($act['activity_id']); // Calculate total activity cost
    $html .= '<td style="padding: 8px;">' . $totalActivityCost . '</td>'; // Output total activity cost
    $html .= '</tr>';
    $totalCost += $totalActivityCost; 
}
$html .= '</tbody>';
$html .= '<tfoot><tr><td colspan="4" style="text-align: right; padding: 8px;"><b>Total:</b></td><td style="padding: 8px;">' . $totalCost . '</td></tr></tfoot>'; // Footer row with total cost
$html .= '</table>';
$pdf->writeHTML($html);



// Output the PDF to a temporary file
$pdfFile = tempnam(sys_get_temp_dir(), 'pdf');
$pdf->Output($pdfFile, 'F');

// Display the PDF in the browser
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="Estimated_Activities_Report.pdf"');
readfile($pdfFile);
?>

