function Search()
{
    console.log('Search function called');
    let search = document.getElementById('search').value;
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