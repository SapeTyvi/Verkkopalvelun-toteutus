$(document).ready(function(){

	    // Suodatin napin toiminnallisuus
    var city = '';
    var job = '';

    $('.filter-city, .city-list, .filter-job, .job-list, .filter').hide();
    $('#filter').on('click', function(){
        $('.filter-city, .filter-job, .filter').slideToggle();
        $('.city-list, .job-list').hide();
        $(".city-list option:selected").prop("selected", false);
        $('.job-list option:selected').prop('selected', false);
        console.log($('.city-list option:selected').val());
        console.log($('.job-list option:selected').val());
        
             
    });
    $('.city-list-toggle').on('click', function(){
        $('.city-list').slideToggle();
    });
    $('.job-list-toggle').on('click', function(){
        $('.job-list').slideToggle();
    });

    $('.city-list option').each(function(){
        $(this).on('click', function(){
            city = $(this).val();
            $(this).prop("selected", true);
            if ( $('.city-list option').is(':selected') ){
                console.log($('.city-list option:selected').val());
            }          
        });
    });

    $('.job-list option').each(function(){
        $(this).on('click', function(){
            job = $(this).val();
            $(this).prop("selected", true);
            if ( $('.job-list option').is(':selected') ){
                console.log($('.job-list option:selected').val());
            }             
        });
    });

    $('.filter').on('click', function(){
        console.log(city + ' ' + job);
        $('#selected-filter').html("Valittu kaupungiksi: " + city + ". Ja työksi: " + job);
        $('.city-list, .job-list').hide();
        if ( $('body').width() < '992' ) {            
            $('.filter-city, .filter-job, .filter').hide();
        }
        // Tämän jälkeen tulisi ajax kutsu

    });
	
});