function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function getCageUrl() {
    var select = document.getElementById('habitat');
    var habitat = select.options[select.selectedIndex].value;
    var width = document.getElementById('width').value;
    var height = document.getElementById('height').value;
    if (isNumber(width) && isNumber(height)) {
        return habitat + '/' + width + '/' + height;
    }
}

function showAnimals() {
    var cageUrl = getCageUrl();
    if (cageUrl) {
        window.location.href = '/shop/cages/' + cageUrl;
    } else {
        alert("Incorrect values");
    }
}

function buy() {
    var cageUrl = getCageUrl();
    if (cageUrl) {
        window.location.href = '/shop/cages/buy/' + cageUrl;
    }
}

var tableRows = document.getElementsByTagName("TR");
for (var i = 0; i < tableRows.length; i++) {
    new function (tableRow) {
        var type = tableRow.dataset.animaltype;
        if (type !== undefined) {
            tableRow.onclick = function () {
                console.log(type);
                window.location.href = '/shop/animals/' + type;
            }
        }
    }(tableRows[i]);

}