import { createStore } from "vuex"

const store = createStore({
    state(){
        return {
            studentAction: null
        }
    },

    mutations: {
        setStudentAction(state, value){
            state.studentAction = value
        },

        resetStudentAction(state){
            state.studentAction = null
        }
    },

    getters: {
        getStudentAction(state){
            return state.studentAction
        }
    }
})

export default store