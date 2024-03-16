

// Function to show an element
function show(element) {
    element.style.display = '';
}

// Function to hide an element
function hide(element) {
    element.style.display = 'none';
}

// =============> TEACHER SEARCH BAR <==================

// Function to clear the class filter
function clearFilter() {
    let tRows = document.querySelectorAll('tbody tr');
    for (let tr of tRows) {
        show(tr);
    }
    document.getElementById('selectedClass').value = 'All Classes';
}

// Define the searchBar function
function searchTeacher() {

    let classTitles = document.querySelectorAll('#tbodySearch');
    let input = search.value.trim().toUpperCase();

    // Iterate over each element with the class 'tbodySearch'
    classTitles.forEach(title => {
        let titleText = title.querySelector('h6 a').textContent.toUpperCase();
        if (titleText.includes(input)) {
            show(title);
        } else {
            hide(title);
        }
    });
}

let search = document.querySelector('#search');
search.addEventListener('keyup', searchTeacher);

// Function to filter data based on class selection
function filterData() {
    let selectedClass = document.querySelector('#selectedClass').value;
    let tRows = document.querySelectorAll('#tbodySearch');
    for (let tr of tRows) {
        let classTitle = tr.firstElementChild.firstElementChild.firstElementChild.firstElementChild.lastElementChild.firstElementChild.textContent;
        if (classTitle === selectedClass || selectedClass === 'All Classes') {
            show(tr);
        } else {
            hide(tr);
        }
    }

}


//========================> STUDENT SEARCH BAR <=====================

// Define the searchBar function
function searchStudent() {

    // let classTitles = document.querySelectorAll('#tbodySearch');
    // let input = search.value.trim().toUpperCase();

    // // Iterate over each element with the class 'tbodySearch'
    // classTitles.forEach(title => {
    //     let titleText = title.querySelector('h6 a').textContent.toUpperCase();
    //     if (titleText.includes(input)) {
    //         show(title); 
    //     } else {
    //         hide(title);
    //     }
    // });
}


let student = document.querySelector('#search_student');
student.addEventListener('keyup', searchStudent);


// password hide and show 

let Hide = document.querySelector(".password");