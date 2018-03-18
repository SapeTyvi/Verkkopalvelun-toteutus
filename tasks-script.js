$(window).load(function(){
    $('.load').fadeOut(  600, "linear", function() {
    // Animation complete.
  });
});

$(document).ready(function(){
    console.log($(window).width());
    console.log($('body').width());

    if ( $(window).width() < '992' ) {
        console.log('nyt toimi');
     }
    // Suodatin napin toiminnallisuus
    var city = '';
    var job = '';

    $('.filter-city, .city-list, .filter-job, .job-list, .filter').hide();
    $('#filter').on('click', function(){
        $('.filter-city, .filter-job, .filter').slideToggle();
        $('.city-list, .job-list').hide();
        $(".city-list option:selected").prop("selected", false);
        $('.job-list option:selected').prop('selected', false);           
    });
    $('.city-list-toggle').on('click', function(){
        $('.city-list').slideToggle();
    });
    $('.job-list-toggle').on('click', function(){
        $('.job-list').slideToggle();
    });

    $('.city-list option').each(function(){
        $(this).on('click', function(){
            city = $(this).attr('data-value');
            $(this).prop("selected", true);
            if ( $('.city-list option').is(':selected') ){
                console.log($('.city-list option:selected').val());
            }          
        });
    });

    $('.job-list option').each(function(){
        $(this).on('click', function(){
            job = $(this).attr('data-value');
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
        if(city === 'Näytä kaikki') {
            tf_table.ClearFilters();
        }
        tf_table.SetFilterValue(2, city);
        tf_table.SetFilterValue(0, job);
        tf_table.Filter();
        /*
        if ( $('body').width() < '992' ) {            
            $('.filter-city, .filter-job, .filter').hide();
        }*/
        
        // Tämän jälkeen tulisi ajax kutsu

    });

    if ( $(window).width() > '992' ) { 
        $('.filter').hide();
        $('.job-list option').each(function(){
            $(this).on('click', function(){
                job = $(this).attr('data-value');
                tf_table.SetFilterValue(0, job);
                tf_table.Filter();
                $(this).prop("selected", true);                             
            });
        });
        $('.city-list option').each(function(){
            $(this).on('click', function(){
                city = $(this).attr('data-value');
                tf_table.SetFilterValue(2, city);
                tf_table.Filter();
                         
            });
        });

    }

    // Lisätieto napin toiminnallisuus

    // Suodaus taulukkoon
    var tfConfig = { 
        popup_filters: false,
        fixed_headers: false
    
    }
    var table_Props = {
        col_0: "none",
        col_1: "none",
        col_2: "none",
        col_3: "none",
        col_4: "none",
        display_all_text: " Näytä kaikki ",
        sort_select: true,
        public_methods: true
    };
    var tf2 = setFilterGrid("table",tfConfig, table_Props);
    
	
});