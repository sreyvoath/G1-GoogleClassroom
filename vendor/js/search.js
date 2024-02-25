
function searchBar() {
    let classTitle = document.querySelectorAll('#tbodySearch');
    let input = searchClass.value.toUpperCase();
    for (let title of classTitle){
        let titles =title.lastElementChild.firstElementChild.textContent.toUpperCase();
        if (titles.includes(input)){
            title.style.display = '';
            
        }else{
            title.style.display = 'none';
        }
        console.log(title)
    }

}
let searchClass = document.querySelector('#search');
searchClass.addEventListener('keyup', searchBar);