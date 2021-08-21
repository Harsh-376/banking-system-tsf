document.getElementById("open").onclick = () => {
    document.querySelector(".history-container").classList.toggle("active");
    document.getElementById("open").classList.toggle("active");
};

function check() {
    if (parseInt(document.forms['transaction-form']['amt'].value) > 50000) {
        alert('Transaction Only under $50,000');
        return false;
    } else {
        if (parseInt(document.forms['transaction-form']['amt'].value) > parseInt(document.getElementById("UserBalance").value)) {
            alert("Entered amount is more than your Balance!");
            return false;
        }
        else {
            return confirm('Are you sure you want to transfer money?');
        }
    }

}