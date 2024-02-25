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