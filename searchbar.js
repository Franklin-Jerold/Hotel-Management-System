
const searchFun = () => {
    let filter = document.getElementById('Input').value.toUpperCase();

    let Table = document.getElementById('Table');

    let tr = Table.getElementsByTagName('tr');

    for (var i = 0; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName('td')[1];


        if (td) {
            let textValue = td.textContent || td.innerHTML;

            if (textValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }

        }
    }

}

