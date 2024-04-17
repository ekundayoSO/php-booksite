const submitBtn = document.querySelector("input");


const deleteAlert = () => {
    confirm("Are you sure you want to delete?");
}

submitBtn.addEventListener('click', deleteAlert);