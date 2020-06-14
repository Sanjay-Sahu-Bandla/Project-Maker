// alert(9);

$(document).ready(function() {

  $('form').on('submit',function(event) {

    event.preventDefault();
    var formData = new FormData(this);
    
    var loader = '<div class="spinner-border text-light ml-3" role="status" style="width: 25px; height: 25px;"><span class="sr-only">Loading...</span></div>';

    $('#loader').html(loader);

    $.ajax({
      type:'POST',
      url:'deploy.php',
      data: formData, 
      cache:false,
      contentType: false,
      processData: false,
      success:function(data) {

        if(data == 'Project_exists') {

          $('#loader').html('');
          
          alert("Project already exists !");
        }

        else {

          var split_data = data.split(',');

          $('#loader').html('');

          alert("JSON status : "+split_data[0]+"\n"+

            "Project status : "+split_data[1]);
          
        }

      },
      error: function(data){
        alert(data);
      }

    });

  });


  $('input, select, radio, .input-group-text').css('background','#303030','color','red');
  $('.form-control, select, checkbox, radio, .input-group-text').css('border','none', 'color','#3b94ee');
  $('*').css('color','#9f9f9f');
  $('input, select').css('color','#c6c6c6');


});

function myFunction() {
  var element = document.body;
  element.classList.toggle("dark-mode");
  element.classList.toggle("dark-text");
  element.classList.toggle("dark-primary");
  element.classList.toggle("dark-secondary");
  element.classList.toggle("dark-mode");
  element.classList.toggle("dark-text");
  element.classList.toggle("dark-primary");
  element.classList.toggle("dark-secondary");
} 