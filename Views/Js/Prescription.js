function validateForm() {
    var patientName = document.getElementById('patientName').value.trim();
    var dateIssued = document.getElementById('dateIssued').value.trim();
    var prescriptionText = document.getElementById('prescriptionText').value.trim();

    
    if (patientName === '' || dateIssued === '' || prescriptionText === '') {
        alert('All fields are required');
        return false;
    }

    return true;
}

function Search()
{
   
    console.log('Search function called');
    let search = document.getElementById('searchInput').value;
    console.log('Search value:', search);
    let searchResultsContainer = document.getElementById('searchResults');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controllers/SearchPatient.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                
                searchResultsContainer.innerHTML = xhr.responseText;
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };

    xhr.send('query=' + searchValue);
}