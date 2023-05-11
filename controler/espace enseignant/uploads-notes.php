<?php
session_start();
require '../../model/connect.php';
require '../../excelReader/excel_reader2.php';
require '../../excelReader/SpreadsheetReader.php';

if(isset($_POST["listN"])){
			$fileName = $_FILES["file"]["name"];
			$fileExtension = explode('.', $fileName);
             $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "../../file-uploads/" . $newFileName;
			move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);


			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$name = $row[0];
				$age = $row[1];
				$country = $row[2];
				mysqli_query($con, "INSERT INTO note VALUES('', '$name', '$age', '$country')");
			}
            if (!$error) {
                $_SESSION['un'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                     notes ont été ajoutées avec succès!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                header('location: ../../view/espace enseignant/add-note.php');
            } else {
                $_SESSION['un'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Une erreur s\'est produite lors de l\'ajout de notes.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                header('location: ../../view/espace enseignant/add-note.php');
            }

			
		}
?>