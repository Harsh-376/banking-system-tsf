let tableRow = document.querySelectorAll(".table-row");
for (let i = 1; i < tableRow.length; i++) {
    tableRow[i].onmouseover = () => {
        tableRow[i].className = 'table-row active';
    };
    tableRow[i].onmouseout = () => {
        tableRow[i].className = 'table-row';
    };
}