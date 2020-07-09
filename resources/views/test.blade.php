<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <a href="#addForm">Show</a> -->
<!-- <a href="#" id="showForm">Show</a>
<table id="addForm">
    <tr>
        <td class="label">Address:</td>
        <td>
            <input type="text" />
        </td>
    </tr>
    <tr>
        <td class="label">Type of Toilet:</td>
        <td>
            <input type="radio" name="sex" value="Male" checked />Male
            <input type="radio" name="sex" value="Female" />Female
            <input type="radio" name="sex" value="Both" />Both</td>
    </tr>
    <tr>
        <td class="label">Review:</td>
        <td>
            <input type="text" />
        </td>
    </tr>
    <tr>
        <td class="label">Rating:</td>
    </tr>
</table>

<style>
    #addForm {
      display: none;
    }
  
</style>

<script type="text/javascript">
    
$(function() {

  $("#showForm").on("click", function() {

    $("#addForm").toggle();

  });

});

</script> -->





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
        }

        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
</style>



</head>
<body>

<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->
<a href="#" id="showForm">More Info</a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
      <div class="modal-content">
                <span class="close">&times;</span>

                <p>Some text in the Modal..</p>

               

             <table id="addForm">
                    <tr>
                        <td class="label">Address:</td>
                        <td>
                            <input type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Type of Toilet:</td>
                        <td>
                            <input type="radio" name="sex" value="Male" checked />Male
                            <input type="radio" name="sex" value="Female" />Female
                            <input type="radio" name="sex" value="Both" />Both</td>
                    </tr>
                    <tr>
                        <td class="label">Review:</td>
                        <td>
                            <input type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Rating:</td>
                    </tr>
            </table>

      </div>

</div>

<script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("showForm");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
</script>

</body>
</html>

