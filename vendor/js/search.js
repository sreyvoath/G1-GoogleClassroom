// Define the searchBar function
function searchBar() {
    // Retrieve all elements with the class 'tbodySearch'
    let classTitles = document.querySelectorAll('#tbodySearch');

    // Retrieve the value from the search input field and convert it to uppercase
    let input = search.value.trim().toUpperCase();

    // Iterate over each element with the class 'tbodySearch'
    classTitles.forEach(title => {
        // Retrieve the text content of the title element
        let titleText = title.querySelector('h6 a').textContent.toUpperCase();

        // Check if the title includes the input value
        if (titleText.includes(input)) {
            title.style.display = ''; // Show the title if it matches the input
        } else {
            title.style.display = 'none'; // Hide the title if it doesn't match the input
        }
    });
}

// Get the search input field
let search = document.querySelector('#search');

// Add an event listener to the search input field for keyup events
search.addEventListener('keyup', searchBar);
// Function to filter data based on class selection
function filterData() {
    let selectedClass = document.querySelector('#selectedClass').value;
    let tRows = document.querySelectorAll('#tbodySearch');
    for (let tr of tRows) {
        let classTitle = tr.firstElementChild.firstElementChild.firstElementChild.firstElementChild.lastElementChild.firstElementChild.textContent;
        console.log(classTitle);
        if (classTitle === selectedClass || selectedClass === 'All Classes') {
            show(tr);
        } else {
            hide(tr);
        }
    }
}

// Function to clear the class filter
function clearFilter() {
    let tRows = document.querySelectorAll('tbody tr');
    for (let tr of tRows) {
        show(tr);
    }
    document.getElementById('selectedClass').value = 'All Classes';
}

// Function to show an element
function show(element) {
    element.style.display = '';
}

// Function to hide an element
function hide(element) {
    element.style.display = 'none';
}