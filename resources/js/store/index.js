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
        changes : null,
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
          put_changes : (state,changes) =>{
            state.changes = changes
          }
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
        getChanges : state =>{
          return state.changes
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
        saveChanges({commit,state}, changes){
          commit('put_changes',changes)
        },
      },
})

export default store;