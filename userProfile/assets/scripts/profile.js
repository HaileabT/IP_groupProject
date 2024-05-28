const editFormId=document.getElementById("all-form-group");
const editPro=document.getElementById("edit-pro");
const savePro=document.getElementById("save");
document.addEventListener('DOMContentLoaded', function() {
    const confirmationModal = document.getElementById('confirmationModal');
    const  confirmationMessage = document.getElementById('confirmationMessage');
    const confirmYes = document.getElementById('confirmYes');
    const confirmNo = document.getElementById('confirmNo');

    var currentAction = null;

    function showModal(message, action) {
        confirmationMessage.textContent = message;
        confirmationModal.style.display = 'block';
        currentAction = action;
    }

    confirmYes.addEventListener('click', function() {
        if (currentAction) currentAction();
        confirmationModal.style.display = 'none';
    });

    confirmNo.addEventListener('click', function() {
        confirmationModal.style.display = 'none';
    });

    document.getElementById('del-pro').addEventListener('click', function(event) {
  
        showModal('Are you sure you want to delete your account?', function() {
            confirmYes.setAttribute("href","../signin-and-signup/controller/database/users/delete.php");
            alert('Account deleted successfully.');
        });
    });

    document.getElementById('logout').addEventListener('click', function(event) {
    showModal('Are you sure you want to logout?', function() {
        confirmYes.setAttribute("href","./../signin-and-signup/controller/validator/logout.php");
        alert('Logged out successfully.');
    });
      
    });
    window.addEventListener('click', function(event) {
        if (event.target == confirmationModal) {
            confirmationModal.style.display = 'none';
        }
    });
});

document.getElementById("cancel").addEventListener('click',(e)=>{
    e.preventDefault();
    editFormId.style.display='none';
})

editPro.addEventListener("click",e=>{
    e.stopPropagation();
editFormId.style.display='block';
})
// document.addEventListener("click",e=>{
//     editFormId.style.display='none';
// });

