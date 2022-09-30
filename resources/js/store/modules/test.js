import Vue from 'vue';
export default {
    state: {
        tasks: [],
        questions: [],
        balls: [],
        questions_all: [],
    },
    mutations: {
        SET_QUESTIONS(state, questions) {
            state.questions = questions;
        },
        SET_TASKS(state, tasks) {
            state.tasks = tasks;
        },
        SET_ALL_QUESTIONS(state, questions) {
            state.questions_all = questions;
        },
        SET_QUESTIONS_DRAG(state, questions) {
            state.questions_all = questions;
        },
        SET_BALLES (state, { question_id, ball, task_id }) {
            const index = state.balls.findIndex(item => item.question_id === question_id);
            if (index !== -1) {
                Vue.set(state.balls, index, {
                    question_id: question_id,
                    ball: ball,
                    task_id: task_id
                });
            } else {
                state.balls.push({
                    question_id: question_id,
                    ball: ball,
                    task_id: task_id
                })
            }
        },
        SET_TASK_SUCCESS (state, { index, current_task, next_index, next_task}) {
            let task_ball = 0;
            for(let item of state.balls){
                if(item.task_id == current_task.id){
                    task_ball = task_ball + item.ball;
                }
            }

            Vue.set(state.tasks, index, {
                id: current_task.id,
                key: current_task.key,
                lesson_id: current_task.lesson_id,
                name: current_task.name,
                type: current_task.type,
                ball: task_ball,
                questions: current_task.questions,
                options: current_task.options,
                status: 'success',
            });
            if(next_index !== null){
                Vue.set(state.tasks, next_index, {
                    id: next_task.id,
                    key: next_task.key,
                    lesson_id: next_task.lesson_id,
                    name: next_task.name,
                    type: next_task.type,
                    questions: next_task.questions,
                    options: next_task.options,
                    status: 'current',
                });
            }
        }
    },
    actions: {
        async setQuestions({ commit }, {id , type}) {
            try {
                const { data } = await window.axios.post('/test/questions', { id: id, type: type});
                commit('SET_QUESTIONS',  data['items']);
            } catch (err) {
                throw err;
            }
        },
        async saveLessonBall({ commit }, {lesson_id , ball}) {
            try {
                const { data } = await window.axios.post('/test/question/save/ball', { lesson_id: lesson_id, ball: ball});
                
            } catch (err) {
                throw err;
            }
        },
        setAllQuestions (context, questions) {
            context.commit('SET_ALL_QUESTIONS', questions);
        },
        setTasks (context, tasks) {
            context.commit('SET_TASKS', tasks);
        },
        setQuestionsDrag (context, questions) {
           context.commit('SET_QUESTIONS_DRAG', questions);
        },
        setBalles(context, values) {
            context.commit('SET_BALLES', values);
        },
        setTaskSuccess(context, values) {
            context.commit('SET_TASK_SUCCESS', values);
        },
    },
    getters: {
        getQuestions(state) {
            return state.questions;
        },
        getAllQuestions(state) {
            return state.questions_all;
        },
        // getQuestion(state, id) {
        //     return function (id) {
        //         console.log(state.questions_all);
        //         console.log(id);
        //         const index = state.questions_all.findIndex(({ id }) => item.id === id);
        //         console.log(index);
        //         return state.questions[index];
        //     }
        // },
        getQuestion: (state) => (id) => {
           return state.questions_all[id];
        },
        getTasks(state){
            return state.tasks;
        },
        getBall(state){
            let ball = 0;
            for(let item of state.balls){
                ball = ball + item.ball;
            } 
            return ball;
        },
    },
};
