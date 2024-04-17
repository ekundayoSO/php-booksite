const submitBtn = document.querySelector("input");


const deleteAlert = () => {
    alert("Are you sure?");
}

submitBtn.addEventListener('click', deleteAlert);