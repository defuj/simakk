import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user : null,
        login : null
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
          }
      },
      getters: {
        getUser : state =>{
          return state.user
        },
        getLogin : state =>{
          return state.login
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
      },
})

export default store;