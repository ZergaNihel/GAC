@extends('layouts.header')

@section('title','EMP Générale')
@section('js')
<script>
    $(document).ready(function () {
        $("#PrimaryModalalert").modal("show");
        //$("#InformationCour").modal("show");
        $("#InformationCour").on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget).data('ensn');
            var b = $(event.relatedTarget).data('ensp');
            var c = $(event.relatedTarget).data('mod');
            var d = $(event.relatedTarget).data('sec');
            var e = $(event.relatedTarget).data('seaj');
            var f = $(event.relatedTarget).data('seah');
            var g = $(event.relatedTarget).data('seas');

            var m = $(this)
            m.find('#ens').text(a + " " + b);
            m.find('#mod').text(c);
            m.find('#sea').text(e + " " + f + " " + g);
            m.find("#sec").text(d);



        });
        $("#InformationTP").on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget).data('ensn');
            var b = $(event.relatedTarget).data('ensp');
            var c = $(event.relatedTarget).data('mod');
            var d = $(event.relatedTarget).data('grp');
            var e = $(event.relatedTarget).data('seaj');
            var f = $(event.relatedTarget).data('seah');
            var g = $(event.relatedTarget).data('seas');
            // var h = $(event.relatedTarget).data('sec');

            //alert("e="+e+"a="+a+"b="+b+""+f+""+g);
            var m = $(this)
            m.find('#ens').text(a + " " + b);
            m.find('#mod').text(c);
            m.find('#sea').text(e + " " + f + " " + g);
            m.find("#grp").text(d);


            // alert(m.find("#idGroupe_etu").val());
            //m.find('#prepend-big-btn').val(c);
        });
        $("#InformationTD").on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget).data('ensn');
            var b = $(event.relatedTarget).data('ensp');
            var c = $(event.relatedTarget).data('mod');
            var d = $(event.relatedTarget).data('grp');
            var e = $(event.relatedTarget).data('seaj');
            var f = $(event.relatedTarget).data('seah');
            var g = $(event.relatedTarget).data('seas');
            // var h = $(event.relatedTarget).data('sec');

            //alert("e="+e+"a="+a+"b="+b+""+f+""+g);
            var m = $(this)
            m.find('#ens').text(a + " " + b);
            m.find('#mod').text(c);
            m.find('#sea').text(e + " " + f + " " + g);
            m.find("#grp").text(d);


            // alert(m.find("#idGroupe_etu").val());
            //m.find('#prepend-big-btn').val(c);
        });

        $(document).on('click', '#subMod', function () {
            //alert($("select[name='moduleCh']").val());
            if ($("select[name='section']").val() === null) {
                $("#alertreq").css('display', '');
            } else {
                $("#alertreq").css('display', 'none');
                $.ajax({
                    type: "POST",
                    data: $('#popMod').serialize(), // to submit fields at once
                    url: $('#popMod').attr('action'), // use the form's action url
                    success: function (data) {
                        $("#PrimaryModalalert").modal("hide");
                        $("#nameSec").val(data.sec.nomSec);
                        var x1;
                        var x2;
                        var x3;
                        var i;

                        for (i = 0; i < data.pop.length; i++) {

                            if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                                "dimanche") {
                                if (data.pop[i].type === "td") {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#D8').append(x3);
                                }
                                if (data.pop[i].type === "tp") {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#D8').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                                "dimanche") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#D10').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#D10').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                                "dimanche") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#D11').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#D11').append(x2);
                                }
                            }


                            if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                                "dimanche") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#D13').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#D13').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                                "dimanche") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#D15').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#D15').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                                "mardi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Ma8').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Ma8').append(x2);
                                }
                            }

                            if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                                "mardi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Ma10').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Ma10').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                                "mardi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Ma11').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Ma11').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                                "mardi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Ma13').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Ma13').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                                "mardi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Ma15').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Ma15').append(x2);
                                }
                            }

                            if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                                "lundi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop1[i].jour +
                                        '" data-seah="' + data.pop1[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#L8').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#L8').append(x2);
                                }
                            }

                            if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                                "lundi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#L10').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#L10').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                                "lundi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#L11').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#L11').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                                "lundi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#L13').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#L13').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                                "lundi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#L15').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#L15').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                                "mercredi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Me8').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Me8').append(x2);
                                }
                            }

                            if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                                "mercredi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Me10').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Me10').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                                "mercredi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Me11').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Me11').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                                "mercredi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Me13').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Me13').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                                "mercredi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#Me15').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#Me15').append(x2);
                                }
                            }


                            if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                                "jeudi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#J8').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';

                                    $('#J8').append(x2);
                                }
                            }

                            if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                                "jeudi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#J10').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';
                                    $('#J10').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                                "jeudi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#J11').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';
                                    $('#J11').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                                "jeudi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#J13').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';
                                    $('#J13').append(x2);
                                }
                            }
                            if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                                "jeudi") {
                                if (data.pop[i].type === 'td') {
                                    x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                        ' </a></div>';
                                    $('#J15').append(x3);
                                }
                                if (data.pop[i].type === 'tp') {
                                    x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                        data.pop[i].nom + '" data-ensp="' + data.pop[i]
                                        .prenom + '" data-mod="' + data.pop[i].nomModule +
                                        '" data-grp="' + data.pop[i].nomG +
                                        '" data-seaj="' + data.pop[i].jour +
                                        '" data-seah="' + data.pop[i].heure +
                                        '" data-seas="' + data.pop[i].salle + '">' + data
                                        .pop[i].nomModule + ' -- ' + data.pop[i].nomG +
                                        ' </a></div>';
                                    $('#J15').append(x2);
                                }
                            }

                        }




                        //alert(data.pop1.length);
                        for (i = 0; i < data.pop1.length; i++) {
                            // alert("pop1 = tptd");
                            if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                                "dimanche") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#D8').append(x1);
                            }
                            if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                                "dimanche") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#D10').append(x1);

                            }
                            if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                                "dimanche") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#D11').append(x1);
                            }
                            if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                                "dimanche") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nomSec + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#D13').append(x1);
                            }

                            if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                                "dimanche") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#D15').append(x1);
                            }
                            if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                                "mardi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Ma8').append(x1);
                            }

                            if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                                "mardi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Ma10').append(x1);
                            }
                            if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                                "mardi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Ma11').append(x1);
                            }

                            if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                                "mardi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Ma13').append(x1);
                            }
                            if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                                "mardi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nomSec + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Ma15').append(x1);
                            }

                            if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                                "lundi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#L8').append(x1);
                            }

                            if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                                "lundi") {
                                //alert(""+data.pop1[i].prenom+""+data.pop1[i].nom+""+data.pop1[i].salle+"");
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#L10').append(x1);

                            }
                            if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                                "lundi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seas="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#L11').append(x1);
                            }

                            if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                                "lundi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#L13').append(x1);

                            }
                            if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                                "lundi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#L15').append(x1);

                            }
                            if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                                "mercredi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Me8').append(x1);

                            }

                            if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                                "mercredi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Me10').append(x1);

                            }
                            if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                                "mercredi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Me11').append(x1);

                            }
                            if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                                "mercredi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Me13').append(x1);

                            }
                            if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                                "mercredi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#Me15').append(x1);

                            }


                            if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                                "jeudi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#J8').append(x1);

                            }

                            if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                                "jeudi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaJ="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#J10').append(x1);

                            }
                            if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                                "jeudi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#J11').append(x1);

                            }
                            if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                                "jeudi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#J13').append(x1);

                            }
                            if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                                "jeudi") {
                                x1 = '<div class="modal-area-button" id="courtd">' +
                                    '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop1[i]
                                    .prenom + '" data-mod="' + data.pop1[i].nomModule +
                                    '" data-sec="' + data.pop1[i].nomSec + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop1[i].salle + '">' +
                                    data.pop1[i].nom + ' -- ' + data.pop1[i].nomModule +
                                    ' </a>' +
                                    '</div>';
                                $('#J15').append(x1);
                            }


                        }

                    }
                });
            }
        });
        //----------------------------------------------endsubmod--------------------------------------
        $(document).on('change', '#selSec', function () {
            //alert("hohaha");
            $.ajax({
                type: "POST",
                data: $('#selectMod').serialize(), // to submit fields at once
                url: $('#selectMod').attr('action'), // use the form's action url
                success: function (data) {

                    $("#nameSec").val(data.sec.nomSec);


                    $(".modal-area-button").each(function () {
                        $("#courtd").remove();
                        $("#poptd").remove();
                        $("#poptp").remove();
                    });
                    $(".modal modal-edu-general").each(function () {
                        $("#PrimaryModal").remove();
                        $("#WarningModalalert").remove();
                        $("#Informationpro").remove();
                    });


                    var x1;
                    var x2;
                    var x3;
                    var i;
                    for (i = 0; i < data.pop.length; i++) {

                        if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                            "dimanche") {
                            if (data.pop[i].type === "td") {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#D8').append(x3);
                            }
                            if (data.pop[i].type === "tp") {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D8').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                            "dimanche") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#D10').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D10').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                            "dimanche") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#D11').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D11').append(x2);
                            }
                        }


                        if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                            "dimanche") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#D13').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D13').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                            "dimanche") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                    .prenom + '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#D15').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D15').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "8h30" && data.pop[i].jour === "mardi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                    .prenom + '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Ma8').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Ma8').append(x2);
                            }
                        }

                        if (data.pop[i].heure === "10h" && data.pop[i].jour === "mardi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Ma10').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Ma10').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "11h30" && data.pop[i].jour === "mardi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Ma11').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Ma11').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "13h30" && data.pop[i].jour === "mardi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Ma13').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#D13').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "15h" && data.pop[i].jour === "mardi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Ma15').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Ma15').append(x2);
                            }
                        }

                        if (data.pop[i].heure === "8h30" && data.pop[i].jour === "lundi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop1[i].jour + '" data-seah="' + data.pop1[i]
                                    .heure + '" data-seas="' + data.pop[i].salle + '">' +
                                    data.pop[i].nomG + ' -- ' + data.pop[i].nomModule +
                                    ' </a></div>';
                                $('#L8').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#L8').append(x2);
                            }
                        }

                        if (data.pop[i].heure === "10h" && data.pop[i].jour === "lundi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#L10').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#L10').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "11h30" && data.pop[i].jour === "lundi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#L11').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#L11').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "13h30" && data.pop[i].jour === "lundi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#L13').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#L13').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "15h" && data.pop[i].jour === "lundi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#L15').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#L15').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "8h30" && data.pop[i].jour ===
                            "mercredi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Me8').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Me8').append(x2);
                            }
                        }

                        if (data.pop[i].heure === "10h" && data.pop[i].jour ===
                            "mercredi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                    .prenom + '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Me10').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Me10').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "11h30" && data.pop[i].jour ===
                            "mercredi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Me11').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Me11').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "13h30" && data.pop[i].jour ===
                            "mercredi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Me13').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Me13').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "15h" && data.pop[i].jour ===
                            "mercredi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#Me15').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#Me15').append(x2);
                            }
                        }


                        if (data.pop[i].heure === "8h30" && data.pop[i].jour === "jeudi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#J8').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop1[i].nom + '" data-ensp="' + data.pop[i]
                                    .prenom + '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';

                                $('#J8').append(x2);
                            }
                        }

                        if (data.pop[i].heure === "10h" && data.pop[i].jour === "jeudi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#J10').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';
                                $('#J10').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "11h30" && data.pop[i].jour === "jeudi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#J11').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';
                                $('#J11').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "13h30" && data.pop[i].jour === "jeudi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#J13').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';
                                $('#J13').append(x2);
                            }
                        }
                        if (data.pop[i].heure === "15h" && data.pop[i].jour === "jeudi") {
                            if (data.pop[i].type === 'td') {
                                x3 = '<div class="modal-area-button" id="poptd"><a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTD" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomG + ' -- ' + data.pop[i].nomModule + ' </a></div>';
                                $('#J15').append(x3);
                            }
                            if (data.pop[i].type === 'tp') {
                                x2 = '<div class="modal-area-button" id="poptp"><a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationTP" data-ensn="' +
                                    data.pop[i].nom + '" data-ensp="' + data.pop[i].prenom +
                                    '" data-mod="' + data.pop[i].nomModule +
                                    '" data-grp="' + data.pop[i].nomG + '" data-seaj="' +
                                    data.pop[i].jour + '" data-seah="' + data.pop[i].heure +
                                    '" data-seas="' + data.pop[i].salle + '">' + data.pop[i]
                                    .nomModule + ' -- ' + data.pop[i].nomG + ' </a></div>';
                                $('#J15').append(x2);
                            }
                        }

                    }




                    //alert(data.pop1.length);
                    for (i = 0; i < data.pop1.length; i++) {
                        // alert("pop1 = tptd");
                        if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                            "dimanche") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#D8').append(x1);
                        }
                        if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                            "dimanche") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#D10').append(x1);

                        }
                        if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                            "dimanche") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#D11').append(x1);
                        }
                        if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                            "dimanche") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nomSec + ' -- ' +
                                data.pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#D13').append(x1);
                        }

                        if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                            "dimanche") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#D15').append(x1);
                        }
                        if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                            "mardi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Ma8').append(x1);
                        }

                        if (data.pop1[i].heure === "10h" && data.pop1[i].jour === "mardi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Ma10').append(x1);
                        }
                        if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                            "mardi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Ma11').append(x1);
                        }

                        if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                            "mardi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Ma13').append(x1);
                        }
                        if (data.pop1[i].heure === "15h" && data.pop1[i].jour === "mardi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nomSec + ' -- ' +
                                data.pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Ma15').append(x1);
                        }

                        if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                            "lundi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#L8').append(x1);
                        }

                        if (data.pop1[i].heure === "10h" && data.pop1[i].jour === "lundi") {
                            //alert(""+data.pop1[i].prenom+""+data.pop1[i].nom+""+data.pop1[i].salle+"");
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#L10').append(x1);

                        }
                        if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                            "lundi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seas="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#L11').append(x1);
                        }

                        if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                            "lundi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#L13').append(x1);

                        }
                        if (data.pop1[i].heure === "15h" && data.pop1[i].jour === "lundi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#L15').append(x1);

                        }
                        if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                            "mercredi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Me8').append(x1);

                        }

                        if (data.pop1[i].heure === "10h" && data.pop1[i].jour ===
                            "mercredi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Me10').append(x1);

                        }
                        if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                            "mercredi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Me11').append(x1);

                        }
                        if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                            "mercredi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Me13').append(x1);

                        }
                        if (data.pop1[i].heure === "15h" && data.pop1[i].jour ===
                            "mercredi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#Me15').append(x1);

                        }


                        if (data.pop1[i].heure === "8h30" && data.pop1[i].jour ===
                            "jeudi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#J8').append(x1);

                        }

                        if (data.pop1[i].heure === "10h" && data.pop1[i].jour === "jeudi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaJ="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#J10').append(x1);

                        }
                        if (data.pop1[i].heure === "11h30" && data.pop1[i].jour ===
                            "jeudi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#J11').append(x1);

                        }
                        if (data.pop1[i].heure === "13h30" && data.pop1[i].jour ===
                            "jeudi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#J13').append(x1);

                        }
                        if (data.pop1[i].heure === "15h" && data.pop1[i].jour === "jeudi") {
                            x1 = '<div class="modal-area-button" id="courtd">' +
                                '<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#InformationCour" data-ensn="' +
                                data.pop1[i].nom + '" data-ensp="' + data.pop1[i].prenom +
                                '" data-mod="' + data.pop1[i].nomModule + '" data-sec="' +
                                data.pop1[i].nomSec + '" data-seaj="' + data.pop1[i].jour +
                                '" data-seah="' + data.pop1[i].heure + '" data-seas="' +
                                data.pop1[i].salle + '">' + data.pop1[i].nom + ' -- ' + data
                                .pop1[i].nomModule + ' </a>' +
                                '</div>';
                            $('#J15').append(x1);
                        }


                    }

                }
            });
        });


    });

</script>
@endsection

@if(Auth::user()->role == 1)
@section('sidebar')

@include('layouts.sidebarAdmin2')

@endsection
@section('mobileSidebar')

@include('layouts.mobileSidebar2')

@endsection
@endif
@if(Auth::user()->role == 0)
@section('sidebar')

@include('layouts.sidebarEtudiant')

@endsection
@section('mobileSidebar')

@include('layouts.sidebarEtudiantMobile')

@endsection
@endif


@section('search')
<ul class="breadcome-menu">
    <li><a href="#">Semestre</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">{{$semestre->nomSem}}/ Emplois du Temps Général</span>
    </li>
</ul>
@endsection
@section('content')
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{url('empGenerale')}}" method="post" id="popMod">
                {{ csrf_field() }}
                <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                <div class="modal-body">
                    <div class="alert-wrap1 shadow-inner wrap-alert-b">
                        <div class="alert alert-danger alert-mg-b" role="alert" id="alertreq" style="display: none;">
                            <strong>Erreur!</strong> Vous devez remplir le champs.
                        </div>
                    </div>
                    <i class="educate-icon educate-checked modal-check-pro"></i>
                    <h2>Sections</h2>
                    <div class="form-group-inner">
                        <div class="chosen-select-single mg-b-20"><select name="section" class="chosen-select error"
                                tabindex="-1" id="">
                                <option value="" disabled selected>Select your option</option>
                                @foreach($sec as $s)
                                <option value="{{$s->idSec}}">{{$s->nomSec}}</option>
                                @endforeach
                            </select></div>
                    </div>
                </div>

            </form>
            <div class="modal-footer">

                <a href="{{url()->previous()}}">Précédent</a>
                <a href="#" id="subMod">valider</a>

            </div>

        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">


        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="product-status-wrap drp-lst">
                    <h4>Emplois du temps</h4>
                    <br>
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <label class="login2"> Section</label>
                            <div class="form-group">

                                <input name="nameasset" type="text" class="form-control" id="nameSec" value="Section"
                                    readonly>


                            </div>


                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="login2"> Section</label>
                            <div class="form-group">
                                <div class="chosen-select-single mg-b-20">

                                    <form action="{{url('empGenerale')}}" method="post" id="selectMod">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="semestre" value="{{$semestre->idSem}}">
                                        <select data-placeholder="Choose a Country..." id="selSec" class="chosen-select"
                                            tabindex="-1" name="section">
                                            <option value="" selected>Selectionner</option>
                                            @foreach($sec as $s)
                                            <option value="{{$s->idSec}}">{{$s->nomSec}}</option>
                                            @endforeach


                                        </select>

                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-status mg-b-15" id="tabEmpTemps">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <div class="asset-inner table-responsive">
                        <table>
                            <tr>
                                <th></th>
                                <th>8h30</th>
                                <th>10h</th>
                                <th>11h30</th>
                                <th>13h</th>
                                <th>13h30</th>
                                <th>15h</th>
                                <th>16h30</th>
                            </tr>
                            <tr>
                                <th>Dimanche</th>
                                <td id="D8"></td>
                                <td id="D10"></td>
                                <td id="D11"></td>
                                <td></td>
                                <td id="D13"></td>
                                <td id="D15"></td>
                                <td></td>


                            </tr>
                            <tr>
                                <th>Lundi</th>
                                <td id="L8"></td>
                                <td id="L10"></td>
                                <td id="L11"></td>
                                <td></td>
                                <td id="L13"></td>
                                <td id="L15"></td>
                                <td></td>


                            </tr>
                            <tr>
                                <th>Mardi</th>
                                <td id="Ma8"></td>
                                <td id="Ma10"></td>
                                <td id="Ma11"></td>
                                <td></td>
                                <td id="Ma13"></td>
                                <td id="Ma15"></td>
                                <td></td>



                            </tr>
                            <tr>
                                <th>mercredi</th>
                                <td id="Me8"></td>
                                <td id="Me10"></td>
                                <td id="Me11"></td>
                                <td></td>
                                <td id="Me13"></td>
                                <td id="Me15"></td>
                                <td></td>


                            </tr>
                            <tr>
                                <th>Jeudi</th>
                                <td id="J8"></td>
                                <td id="J10"></td>
                                <td id="J11"></td>
                                <td></td>
                                <td id="J13"></td>
                                <td id="J15"></td>
                                <td></td>


                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--            modal mauve TP   -->
<div id="InformationTP" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title"></h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                            <h2 style="color:#8e44ad ;">Travaux Pratique (TP)!</h2>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Module </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="mod"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Enseignant </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="ens"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Seance </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="sea"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Groupe </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="grp"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#" style="background-color: #8e44ad ;border-color: #8e44ad ;">OK</a>
            </div>
        </div>
    </div>
</div>

<!--            modal mauve TD   -->

<div id="InformationTD" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-3"
                style="background-color: #65b12d ;border-color: #65b12d ;">
                <h4 class="modal-title"></h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                            <h2 style="color:#65b12d ;">Travaux Dirigés (TD)!</h2>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Module </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="mod"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Enseignant </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="ens"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Seance </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="sea"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Groupe </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="grp"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#" style="background-color: #65b12d ;border-color: #65b12d ;">OK</a>
            </div>
        </div>
    </div>
</div>


<!--            modal bleu Cour   -->

<div id="InformationCour" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title"></h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                            <h2 style="color:#006DF0 ;">Cours</h2>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4>Module </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="mod"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Enseignant </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="ens"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Seance </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="sea"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <h4 style="color:#303030 ;">Section </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                                    <p style="text-align: left" id="sec"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">OK</a>
            </div>
        </div>
    </div>
</div>






</div>


@endsection
