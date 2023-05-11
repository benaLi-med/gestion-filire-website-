
<?php
// Include the FPDF library
require('../../fpdf/fpdf.php');
session_start();

// Inclure le fichier de connexion à la base de données  
require '../../model/connect.php';
// Define the PDF class

$cne = $_POST['cne']; 
$queryy = "SELECT CNE, Nom, Prénom, date_de_naissance FROM student WHERE CNE = '$cne'";
$resulty = mysqli_query($con, $queryy);
while ($student = mysqli_fetch_assoc($resulty)) {
    $nom = $student['Nom'];
    $prenom = $student['Prénom'];
    $datenai = $student['date_de_naissance'];
    $cnn = $student['CNE'];

}

class PDF extends FPDF
{
    private $con;
    private $nom;
    private $prenom;
    private $datenai;
    private $cnn;

    function __construct($con, $nom, $prenom, $datenai, $cnn)
    {
        parent::__construct();
        $this->con = $con;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->datenai = $datenai;
        $this->cnn = $cnn;
    }

    
    // Page header
    function Header()
    {
        // Set background color to violet
        $this->SetFillColor(90, 35, 200);
        $this->Rect(165, 06, 40, 20, 'F');
        $this->Image('../../images/fst_lg.jpg', 10, 6, 25);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Attestation des notes', 0, 0, 'C');
        // Logo 2
        $this->Image('../../images/lg.png', $this->GetPageWidth() - 35, $this->GetY() + 1, 25); // Add the image
        // Line break
        $this->Ln(40);


   

        // Display the student's information in the header
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Nom et prnom : ' . $this->nom . ' ' . $this->prenom, 0, 1);
        $this->Cell(0, 10, 'Date de naissance : ' . $this->datenai, 0, 1);
        $this->Cell(0, 10, 'CNE : ' . $this->cnn, 0, 1);
    }


    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
       
    }

    // Generate the table
    function GenerateTable($data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
    
        // Header
        $header = array('nom de Module ', 'Semester', 'Note', 'resultat');
        $w = array(60, 40, 30, 60);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
    
        // Data
        $this->SetFont('', '', 10);
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'L', $fill);
            $this->Ln();
    
            // Add horizontal line between rows
            $this->Cell(array_sum($w), 0, '', 'T');
            $this->Ln();
    
            $fill = !$fill;
        }
    
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    
}

// Check if the "generate_pdf" form was submitted
if (isset($_POST['generate_pdf'])) {
    // Get the data to display in the PDF table
    $data = array();
    $query = "SELECT module.nom, module.semestre, note.valeur FROM note INNER JOIN module ON note.module_id = module.id WHERE note.student_cne = '".$cne."' ORDER BY module.semestre ASC";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data[] = array($row[0], $row[1], $row[2], ($row[2] >= 10) ? "Valider" : "Non valider");
    }
   

    // Create a new PDF instance
    $pdf = new PDF($con, $nom, $prenom, $datenai, $cne);

  
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->GenerateTable($data);
    $pdf->Output();
}
?>




