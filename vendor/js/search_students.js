// JavaScript function to filter table rows based on user input
document.getElementById('search_student').addEventListener('input', function() {
    // Get input value and convert it to lowercase for case-insensitive search
    var searchValue = this.value.toLowerCase();
    var tableRows = document.querySelectorAll('#studentTableBody tr');

    // Loop through each table row
    tableRows.forEach(function(row) {
        var studentName = row.querySelector('h6').innerText.toLowerCase();
        var studentEmail = row.querySelector('.emaii').innerText.toLowerCase();

        // Check if the student name or email matches the search query
        if (studentName.includes(searchValue) || studentEmail.includes(searchValue)) {
            // Show the row if it matches the search query
            row.style.display = '';
        } else {
            // Hide the row if it doesn't match the search query
            row.style.display = 'none';
        }
    });
});


//<======select class  name of student=======>

// Function to show an element
function show(element) {
    element.style.display = '';
}

// Function to hide an element
function hide(element) {
    element.style.display = 'none';
}

// Function to filter data based on the selected class
function filterData() {
    let selectedClass = document.getElementById('classFilter').value;
    let studentRows = document.querySelectorAll('#studentTableBody tr');

    studentRows.forEach(function(row) {
        let classTitle = row.querySelectorAll('td')[2].textContent;
        if (classTitle === selectedClass || selectedClass === 'All student') {
            show(row);
        } else {
            hide(row);
        }
    });
}

// Add event listener to the select element
document.getElementById('classFilter').addEventListener('change', filterData);