<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

header('Content-Type: application/json');

$employees = array(
    "1" => array("nom" => "Bah", "prenom" => "Mamadou", "age" => 22, "statut" => "Manager", "salaire" => 50000, "adresse" => "123 rue de Paris", "n_secu" => "123456789012345", "username" => "mbah", "ip" => "192.168.1.10"),
    "2" => array("nom" => "Tanguy", "prenom" => "Tanguy", "age" => 18, "statut" => "Développeur", "salaire" => 40000, "adresse" => "456 avenue de la République", "n_secu" => "234567890123456", "username" => "ttanguy", "ip" => "192.168.1.11"),
    "3" => array("nom" => "Utard", "prenom" => "Gil", "age" => 17, "statut" => "Designer", "salaire" => 45000, "adresse" => "789 boulevard Saint-Germain", "n_secu" => "345678901234567", "username" => "gutard", "ip" => "192.168.1.12"),
    "4" => array("nom" => "Coulibaly", "prenom" => "Odiouma", "age" => 20, "statut" => "DevSecOps", "salaire" => 55000, "adresse" => "6 boulevard de Bamako", "n_secu" => "5645678901234567", "username" => "ismo", "ip" => "192.168.1.13"),
);

if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    if (array_key_exists($employee_id, $employees)) {
        echo json_encode($employees[$employee_id]);
    } else {
        echo json_encode(array("error" => "Employee not found"));
    }
    exit;
}

echo json_encode($employees);
?>
