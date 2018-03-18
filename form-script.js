$(document).ready(function(){

// AJAX POST kutsu tiedon lähetystä varten
$('#submit-button').on( 'click', function(e){
    e.preventDefault();
    e.stopPropagation(); 

    /* Varoitus jos työ jää valitsematta */
    if($( "#job-subcategory option:selected" ).val() === '') {
        alert('Muist valita työ');
        
    }    

    /* Laitetaan input kenttien sisältö muutujiin */
    var job = $(this).closest("form").attr('data');
    var job_subcategory = $( "#job-subcategory option:selected" ).text();
    var budget = $( "#job-budget option:selected" ).val();
    var city = $("input[name='city']").val();
    var zipcode = $("input[name='zipcode']").val(); 
    var description = [];  

    
    var testi = $('#date').text();

    $('.description').each(function(){ 

    /* Lisätään taulukkoon kaikki .input luokan omaavien kenttien nimi attribuutti ja sisältö */
    description.push($(this).attr('data')+":  "+$(this).val());            
    });              
    /* Jos budjetti on valittu, lisätään tietoihin */
    if(budget != ''){
        description.push('Budjetti: ' + budget);
    }
    

    /* Luodaan taulukosta string, jossa erottimena toimii || merkki */    
    var data = description.join("|| ");    

                 
    $.ajax({
        type: "POST",
        url: "insert.php",
        data: {data, job, job_subcategory, city, zipcode},
        dataType: "JSON",
        success: function(data) {
            console.log(data);
        },
        error: function(err){
            console.log(err);
        },
        complete: function(){

        }
        
    });

  
}); 
/* AjAX kutsu loppuu */



});