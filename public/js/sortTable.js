var lowToHigh;
var currentTable;

function sortTable(column) {
    var tableSize = document.getElementById('table').rows[0].cells.length;
    if(currentTable !== 'table'){
        lowToHigh = new Boolean(tableSize);
        currentTable = 'table';
    }

    var table, rows, switching, i, first, second, shouldSwitch, isNum = false;
    table = document.getElementById('table');
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            first = rows[i].getElementsByTagName("TD")[column].innerHTML.toLowerCase();
            second = rows[i + 1].getElementsByTagName("TD")[column].innerHTML.toLowerCase();
            //check if the two rows should switch place:
            if (parseFloat(first))
                isNum = true

            if (isNum){
                first = parseFloat(first);
                second = parseFloat(second);
                if (lowToHigh[column] && first > second || !lowToHigh[column] && first < second){
                    shouldSwitch = true;
                    break;
                }
                continue;
            }

            if (lowToHigh[column] && first > second || !lowToHigh[column] && first < second){
                shouldSwitch = true;
                break;
            }

            // if (param == ""){
            //     if (shouldSwitchDefaultOrNum(x.innerHTML.toLowerCase(), y.innerHTML.toLowerCase(), window.lowToHigh[column])){
            //         shouldSwitch = true;
            //         break;
            //     }
            // }
            // if (param == "num"){
            //     if (shouldSwitchDefaultOrNum(parseFloat(x.innerHTML.toLowerCase()), parseFloat(y.innerHTML.toLowerCase()),
            //         window.lowToHigh[column])){
            //         shouldSwitch = true;
            //         break;
            //     }
            // }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }

    lowToHigh[column] = !lowToHigh[column];
}

function shouldSwitchDefaultOrNum(first, second, lowToHigh){
    return lowToHigh && first > second || !lowToHigh && first < second;
}
