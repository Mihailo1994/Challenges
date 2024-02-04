fetch('https://opentdb.com/api.php?amount=20')
    .then(function(response){  
        let loading = document.getElementById('loading-screen');
        loading.classList.replace('d-flex', 'd-none');
        let start = document.getElementById('start-screen');
        start.classList.replace('d-none', 'd-block');
        return response.json();
         
    })
    .then(function(data){
        console.log(data)
        let questions = data.results;

        let startBtn = document.getElementById('start-btn');
        let resetBtn = document.getElementById('reset-btn');
        let endBtn = document.getElementById('end-btn');
        let index = 0;
        let score = 0;
        let hashlocation = 1;
        let questionNr = 0;
        sessionStorage.setItem('score', score);

        function showQuestion(index){
            let div = document.createElement('div');
            div.classList.add('col-10', 'p-0', 'border');
            document.getElementById('wrapper').appendChild(div);
            
            let p = document.createElement('p');
            p.classList.add('p-4', 'mb-0', 'bg-light', 'border-bottom', 'h5');

            let question = new DOMParser().parseFromString(questions[index].question, "text/html");
            question.documentElement.textContent;
            p.innerText = question.documentElement.textContent;``
            
            // p.innerText = questions[index].question;

            div.appendChild(p);

            let div2 = document.createElement('div');
            div2.classList.add('p-4', 'text-center');
            div.appendChild(div2);  

            let q = [];
            q.push(questions[index].correct_answer);
            questions[index].incorrect_answers.forEach(element => {
                q.push(element);
            })
            let qshuffle = q.sort(() => Math.random() - 0.5);

            qshuffle.forEach(element => {
                let btn = document.createElement('button');
                btn.value = element;
                btn.innerText = element;
                btn.classList.add('btn', 'btn-outline-secondary', 'm-2', 'answer-btn');
                div2.appendChild(btn);
                btn.addEventListener('click', function(e){
                    if(e.target.value === questions[index].correct_answer){
                        score++;
                        sessionStorage.setItem('score', score);
                    }
                    console.log(sessionStorage.getItem('score'));
                    questionNr++;
                    document.getElementById('answered-questions').innerText = 'Completed: ' + questionNr + '/20';
                    if(hashlocation == 20){
                        hashlocation = '#';
                    }
                    hashlocation++;
                    location.hash = 'Question-' + hashlocation;
                })
            })
        };
        
        startBtn.addEventListener('click', startQuiz)

        window.addEventListener('hashchange', changeQuestion);

        resetBtn.addEventListener('click', reset);

        endBtn.addEventListener('click', reset);

        function startQuiz(){
            document.getElementById('start-screen').classList.replace('d-block', 'd-none');
            document.getElementById('main-screen').classList.replace('d-none', 'd-block');
            document.getElementById('answered-questions').innerText = 'Completed: ' + questionNr + '/20';
            location.hash = 'Question-' + hashlocation;
        }

        function changeQuestion(){
            if(index < questions.length ) {
                while(document.getElementById('wrapper').firstChild){
                    document.getElementById('wrapper').removeChild(document.getElementById('wrapper').firstChild);
                    }
                showQuestion(index);
                index++;
            } else {
                document.getElementById('main-screen').classList.replace('d-block', 'd-none'); 
                document.getElementById('score').innerText = 'Total correct answers: ' + sessionStorage.getItem('score') + '/20';
                document.getElementById('score-screen').classList.replace('d-none', 'd-block');
            }
        }

        function reset(){
            location.hash = '';
            location.reload();
            sessionStorage.clear();
        }

        
    })
    .catch(function(err){
        
    })