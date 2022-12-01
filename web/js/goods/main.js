document.querySelectorAll('.btn-delete-goods').forEach(el => {
    el.addEventListener('click', e=>{
        const id = e.currentTarget.parentNode.parentNode.parentNode.dataset.key;
        fetch(`/goods/delete?id=${id}`)
        .then((response) => {
            console.log(response);
        })
    })
})