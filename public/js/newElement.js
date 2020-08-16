num = 2;

function addNewIngredient(elName)
{
    var form = document.getElementById('form');
    var divElement = document.createElement('div');
    divElement.innerHTML = document.getElementById('selectDiv').innerHTML;

    var selectElement = divElement.querySelector('#selectEl');
    selectElement.name = elName + num.toString();

    var labelElement = divElement.querySelector('#label');
    labelElement.innerHTML = num.toString() + ": ";

    var numberElement = divElement.querySelector('#amount');
    numberElement.name = "amount" + num.toString();

    console.log(divElement.innerHTML);
    form.insertBefore(divElement, document.getElementById('addBtn'));
    num++;
}
