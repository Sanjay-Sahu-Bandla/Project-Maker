// alert(9);

$(document).ready(function() {

  // creating project
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

  // deleting project
  $('.delete_project').on('click', function() {

    $.post('delete_project.php', { id: $(this).attr('id') } ,() => {
    }).done((response) => {
      alert(response);
    })
  })
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