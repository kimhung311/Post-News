  <!-- // validate change_password -->

  <script>
function validatePassword() {
    var currentPassword, newPassword, confirmPassword, output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if (!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "enter again old password";
        output = false;
    } else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = " enter again new password";
        output = false;
    } else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "enter again new password";
        output = false;
    }
    if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not password";
        output = false;
    }
    return output;
}
  </script>
  <!-- // validate change_password -->