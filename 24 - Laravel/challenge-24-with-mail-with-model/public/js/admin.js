let radiobtn = document.querySelectorAll('[name="radiobtn"]')
radiobtn.forEach(function(value){
    value.addEventListener('change', function(e){
        reset();
        let val = e.target.value;
        document.getElementById(val + '-project').style.display = 'block';
        document.getElementById(val + '-label').classList.add('active');
    })
})

let projects = document.querySelectorAll('.project');
projects.forEach(function(value){
    value.addEventListener('mouseover', function(e){
        value.querySelector('.btns').classList.replace('d-none', 'd-block');
    })

    value.addEventListener('mouseout', function(e){
        value.querySelector('.btns').classList.replace('d-block', 'd-none');
    })

    value.querySelector('.edit-btn').addEventListener('click', function(e){
        e.preventDefault();
        value.querySelector('.show-project').classList.replace('d-block', 'd-none');
        value.querySelector('.edit-project').classList.replace('d-none', 'd-block');
    })

    value.querySelector('.cancel-btn').addEventListener('click', function(e){
        e.preventDefault();
        value.querySelector('.edit-project').classList.replace('d-block', 'd-none');
        value.querySelector('.show-project').classList.replace('d-none', 'd-block');
    })
})



function reset(){
    document.getElementById('add-project').style.display = 'none';
    document.getElementById('edit-project').style.display = 'none';
    document.getElementById('add-label').classList.remove('active');
    document.getElementById('edit-label').classList.remove('active');
}


