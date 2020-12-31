$(document).ready(function () {

  









  $(".btndeleteStudent").click(function () {
    var id_student = $(this).attr("id");

    $(".cfdeleteStudent").click(function () {
      $.ajax({
        url: "deleteStudent.php",
        type: "POST",
        data: { id_student: id_student },
        success: function (data) {
          //alert('ลบสำเร็จ');
          window.location.reload();
        },
      });
    });
  });

  $(".btnupdateStudent").click(function () {

    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);
    $('#updatePass_student').val(data[0]);
    $('#updateFirst_word').val(data[2]);
    $('#updateName').val(data[3]);
    $('#updateSurname').val(data[4]);
    $('#updateNumber').val(data[1]);
    $('#updateLevel_class').val(data[5]);
    $('#updatePhone').val(data[6]);
    $('#updateGrade').val(data[7]);


    $("#updateStudent").modal("show");




  });

  $("#viewStudent").dataTable();
});

function showpassword() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
