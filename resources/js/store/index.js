import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user : null,
        login : null,
        search : null,
        questions : [],
        answers : [],
        /*
        login : {
          token : String,
          refreshToken : String,
          expiresIn : Int,
          id : String,
          nickname : String,
          avatar : String,
          avatar_original : String,
          email : String,
        },
        user : {
          email : String,
          email_verified : Boolean,
          id : String,
          name : String,
          picture : String
        }
        */
      },
      mutations: {
          set_user: (state, user) =>{
              state.user = user
          }, 
          set_login: (state, login) => {
            state.login = login
          },
          set_logout: (state) => {
              state.user = null
              state.login = null
          },
          set_search: (state, search) => {
            state.search = search
          },
          set_questions: (state, questions) =>{
            state.questions = questions
          },
          clear_questions: (state, questions) =>{
            state.questions = []
          },
          add_questions: (state, questions) =>{
            state.questions.push(questions)
          },
      },
      getters: {
        getUser : state =>{
          return state.user
        },
        getLogin : state =>{
          return state.login
        },
        getSearch : state =>{
          return state.search
        },
        getQuestions : state =>{
          return state.questions
        },
      },
      actions: {
        saveUser({commit, state}, user){
          commit('set_user',user)
        },
        saveLogin({commit, state}, login){
          commit('set_login',login)
        },
        destroyLogin({commit, state}){
          commit('set_logout')
        },
        updateSearch({commit, state}, search){
          commit('set_search',search)
        },
        clearQuestions({commit, state}, questions){
          commit('clear_questions',questions)
        },
        addQuestions({commit, state}, questions){
          commit('set_questions',questions)
        },
      },
})

export default store;