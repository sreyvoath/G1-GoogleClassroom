
function alert(){
    let isAlert = confirm.alert("Are you sure?");
    
}
let logoutBtn = document.querySelector('.btn-danger');
logoutBtn.addEventListener('click', alert)
