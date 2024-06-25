$(document).ready(function() {
    // Fonction pour charger la liste des employés
    function loadEmployeeList() {
        $.getJSON('employees.php', function(data) {
            var $list = $('#employeeList');
            $list.empty();
            $.each(data, function(key, value) {
                $list.append($('<li>').text(value.nom + ' ' + value.prenom).attr('data-employee-id', key).click(function() {
                    loadEmployeeDetails(key);
                }));
            });
        });
    }

    // Fonction pour charger les détails d'un employé
    function loadEmployeeDetails(employeeId) {
        $.getJSON('employees.php?employee_id=' + employeeId, function(data) {
            var $details = $('#employeeDetails');
            $details.empty();
            $details.append('<h2>Détails de l\'employé</h2>');
            $details.append('<p>Nom: ' + data.nom + '</p>');
            $details.append('<p>Prénom: ' + data.prenom + '</p>');
            $details.append('<p>Âge: ' + data.age + '</p>');
            $details.append('<p>Statut: ' + data.statut + '</p>');
            $details.append('<p>Salaire: ' + data.salaire + '</p>');
        });
    }

});
