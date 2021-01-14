
jQuery(document).ready(function() {

    $('table').DataTable();

    //Affichage de zone de selection des agences et services, des visa et des dates de periodes
    $('#report_id').on('change', function () {
        $report_id = $(this).val();
        //Si l'element selecionné correspond à une période donnée, alors afficher les champs de selection des dates
        if (
            ($report_id === 'report_periode_passports_expirent') || ($report_id === 'report_periode_passports_recus')
            || ($report_id === 'report_periode_sortis_visiteurs')|| ($report_id === 'report_periode_entres_visiteurs')
            || ($report_id === 'report_periode_entres_sortis') || ($report_id === 'report_titulaire_visa')
            || ($report_id === 'report_titulaire_visa_retrait') || ($report_id === 'report_mensuel_titulaire')||
            ($report_id === 'report_couts_visa_mois')||($report_id === 'report_couts_visa_visiteur')||
            ($report_id === 'report_couts_visiteur_services')||($report_id === 'report_couts_visiteur_global')
        )
        {
            $('#row_report_periode').slideDown();//Le datetimepicker sera affiché à la suite de la selection
            $('#row_report_type_visa').slideUp();
            $('#row_report_agence').slideUp();//on affiche pas des dates de selection
            $('#row_report_service').slideUp();
        }
        else if (($report_id === 'fiche_signaletique'))
        {
            $('#row_report_visiteur').slideDown();//Le datetimepicker sera affiché à la suite de la selection
            $('#row_report_periode').slideUp();//on affiche pas des dates de selection
        }
        else if (($report_id === 'report_service_arrivee'))
        {
            $('#row_report_periode').slideDown();//Le datetimepicker sera affiché à la suite de la selection
            $('#row_report_service').slideDown();//Le dropdown de selection des agences d'octroi de visa sera affiché à la suite de la selection
            $('#row_report_type_visa').slideUp();//Le dropdown de selection des agences d'octroi de visa sera affiché à la suite de la selection
            $('#row_report_agence').slideUp();//on affiche pas des dates de selection
        }
        else if (($report_id === 'report_service_depart'))
        {
            $('#row_report_periode').slideDown();//Le datetimepicker sera affiché à la suite de la selection
            $('#row_report_service').slideDown();//Le dropdown de selection des agences d'octroi de visa sera affiché à la suite de la selection
            $('#row_report_type_visa').slideUp();//Le dropdown de selection des agences d'octroi de visa sera affiché à la suite de la selection
            $('#row_report_agence').slideUp();//on affiche pas des dates de selection
        }
        else if (($report_id === 'report_agence_visa') || ($report_id === 'report_periode_agence'))
        {
            $('#row_report_periode').slideDown();//on affiche pas des dates de selection
            $('#row_report_agence').slideDown();//Le dropdown de selection des agences d'octroi de visa sera affiché à la suite de la selection
            $('#row_report_service').slideUp();
            $('#row_report_type_visa').slideUp();
        }
        else{
            $('#row_report_periode').slideUp();//on affiche pas des dates de selection
            $('#row_report_type_visa').slideUp();
            $('#row_report_agence').slideUp();//on affiche pas des dates de selection
            $('#row_report_service').slideUp();
            $('#row_report_visiteur').slideUp();
        }
    });

    $('#bld').on('click', function (e) {
        e.preventDefault();
        $('#alt').hide(1500);
    });

    setTimeout(function () {
        $('#alt').show(1000);
    }, 500);

    setTimeout(function () {
        $('#alt').hide(1500);
    }, 9000);

    $('form').attr('autocomplete', 'off');

    $('.form-control').on('focus', function () {
        $(this).removeClass('is-invalid');
    });

});
