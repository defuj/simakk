import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user : null,
        login : null,
        search : null
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
        }
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
      },
})

export default store;