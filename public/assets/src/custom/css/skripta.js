$(document).ready(function() {
    mesazhetPerTekstBoxa();
    ndaliAutoComplete();

/*
	$(".select2").select2({
		placeholder: function(){
			$(this).data('placeholder');
		}
	});*/


    $('[title]').tooltip({
        placement: 'top'
    });
    
    
}); 

function ndaliAutoComplete()
{
    var inputat = document.getElementsByTagName("input");
    for(var i =0; i<inputat.length; i++)
    {
        inputat[i].setAttribute('autocomlpete', 'off');
    }
}




//listimi i artikujve te lista e artikujve,materialeve edhe pjeseve
function kerkoArtikullinPrejListesSeArtikujve(tipi)
{
    clearTimeout(window.to);
    window.to = setTimeout(function(){
        kerkoArtikullinPrejListesSeArtikujveTO(tipi);
    }, 1300);
    
}
function kerkoArtikullinPrejListesSeArtikujveTO(tipi)
{
    if($('#kerko').val().length>=3)
        $('#rezultatet').load('./artikujt/inc/kerkoArtikujtPrejListesSeArtikujve.php?lloji='+tipi+'&kerkimi='+encodeURIComponent($('#kerko').val()));
}




//listimi i artikujve te lista e artikujve,materialeve edhe pjeseve
function kerkoFurnizuesPrejListesSeFurnizuesve(fjala)
{
    clearTimeout(window.to);
    window.to = setTimeout(function(){
        kerkoFurnizuesPrejListesSeFurnizuesveTO(fjala);
    }, 1300);
    
}
function kerkoFurnizuesPrejListesSeFurnizuesveTO(fjala)
{
    if($('#kerko').val().length>3)
        $('#rezultatet').load('./artikujt/inc/kerkoFurnizuesPrejListesSeFurnizuesve.php?fjala='+fjala.value);
}

function kerkoKlientinPrejListesSeKlienteve(fjala, _lloji)
{
    var lloji = $('#'+_lloji+' option:selected').val();
    var f = encodeURI(fjala.value);
    if($('#kerko').val().length>3)
        $('#rezultatet').load('./klientet/inc/kerkoKlientePrejListesSeKlienteve.php?fjala='+f+'&lloji='+lloji);
    else
        $('#rezultatet').html('');
}



























































































function mesazhetPerTekstBoxa()
{
var elements = document.getElementsByTagName("INPUT");
    
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                if(e.target.getAttribute('type')=='email')
                    e.target.setCustomValidity("Email adresa e dhënë nuk është valide!");
               else
                    e.target.setCustomValidity("Ju lutem plotësoni këtë fushë!");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    };
    
    var elements = document.getElementsByTagName("SELECT");
    
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                if(e.target.getAttribute('type')=='email')
                    e.target.setCustomValidity("Email adresa e dhënë nuk është valide!");
               else
                    e.target.setCustomValidity("Ju lutem plotësoni këtë fushë!");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    };
}



function gjejFshatratPrejVendit(vendi, id)
{
    $('#vendi3').prop('disabled', true);
    $('#vendi3').children().remove();
    $('#uniform-vendik2 span').text('');
    $.getJSON("./klientet/inc/fshatrat.php",{kerkoVendinPrejKomunes:1,komuna:vendi}, function(j) {
        var options = '';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].vlera + '">' + j[i].emri + ' (' + j[i].vlera + ')</option>';
        }
        $("#vendi3").html(options);        
        $("#vendi3 options:first").prop('selected','selected');
        $('#vendi3').prop('disabled', false);
        $('#vendi3 > option[value="'+id+'"]').attr("selected", "selected");
    });
}

function hapeModalin($modali)
{
    $('#'+$modali).modal();
    
    var firstInput = $('.firstInput');
    if (firstInput != null) {
        firstInput.focus();
    }
}


function searchNeTabel($fjala, $tabelaId) {
	// Declare variables
	var filter, table, tr, td, i;
	filter = $fjala.toUpperCase();
	table = document.getElementById($tabelaId);
	tr = table.getElementsByTagName("tr");
	console.log(filter);

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td");
		var hide = true;
		if(td.length == 0)
		    hide=false;
		for(j=0; j<td.length; j++){
			if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
				hide=false
			}
        }
        if(hide)
	        tr[i].style.display = "none";
		else
	        tr[i].style.display = "";
	}
}












$(function () {
    $(".datafillimi").datepicker({
        defaultDate: "-1",
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#data2").datepicker("option", "minDate", selectedDate);
        }
    });
    $(".datafundi").datepicker({
        defaultDate: "+1",
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#data1").datepicker("option", "maxDate", selectedDate);
        }
    });
});

var grid = [];
function bllah(){
    var a = new Grid();
}