

        const buttonPlus = document.querySelectorAll('.button-plus')[0];
        buttonPlus.addEventListener('click', function () {
            const questionTemplate = document.querySelectorAll('.questionTemplate')[0];
            const questions = document.querySelectorAll('.questions');
            const countQuestions = questions.length + 1 ?? 1;
            const clone = questionTemplate.cloneNode(true);
            const id = `perguntas-${countQuestions}`;
            const place = `Pergunta ${countQuestions}`;
            const allQuestions = document.querySelectorAll('.all-questions')[0];
            clone.classList.remove('d-none');
            clone.classList.remove('questionTemplate');
            clone.setAttribute('id', id);
            clone.setAttribute('class', 'questions');
            clone.querySelector('label').setAttribute('for', id);
            clone.querySelector('input').setAttribute('placeholder', place);
            allQuestions.append(clone);

            
            const buttonDelete = clone.querySelector('.delete-question');
            buttonDelete.addEventListener('click', function () {
                const divDelete = this.parentNode;
                divDelete.remove();
            });
        })

