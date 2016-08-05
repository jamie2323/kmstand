<template>
  <div id="root">
    <header class="Header">
      <h1 v-link="'/'" class="Header__logo">
       <small>ritten registratie</small> <small v-if="user.authenticated"> van {{ user.name }}</small>
      </h1>
       <ul class="Header__links">
       <li class="Header__link" v-if="user.authenticated">
          <a v-link="'/ritten'">Ritten</a>
       </li>
        <li class="Header__link" v-if="!user.authenticated">
          <a v-link="'/login'">Login</a>
        </li>
         <li class="Header__link" v-if="!user.authenticated">
          <a v-link="'/registreer'">Registreer</a>
        </li>
        <li class="Header__link" v-if="user.authenticated">
          <a href="" @click.prevent="logout">Logout</a>
        </li>
      </ul> 
    </header>
    <main>
      <!-- router outlet -->
      <router-view
        class="view"
        keep-alive
        transition
        transition-mode="out-in">
      </router-view>
    </main>
  </div>
</template>

<script>

import auth from '../services/Auth';

export default {

  ready () {
    this.user = auth.user;
  },

  data () {
    return {
      modalIsOpen: false,
      user: {}
    }
  },

  methods: {
    showModal () {
      this.modalIsOpen = true;
    },

    logout () {
      auth.logout();
    }
  }
}
</script>

<style lang="stylus">
  *
    box-sizing: border-box

  .Button
    border: none
    background: deepskyblue
    color: white
    font-wight: light
    font-family: 'Roboto'
    padding: 10px
    border-radius: 1px
    margin-bottom: 20px
    margin-top: 5px
    &:hover
      background: darken(deepskyblue, 10%)  

  .view
    margin-top: 12px
    transition: opacity .2s ease
    padding-left: 15px
    padding-right: 15px
    &.v-enter, &.v-leave
      opacity: 0
    
  .Header
    display: flex
    justify-content: space-between
    width: 100%
    border-bottom: 1px #f0f0f0 solid
    padding-left: 20px
  
  .Header__logo
    font-family: "Lato"
    font-weight: 300
    color: #333
    cursor: pointer

    small
      font-size: 18px

  .Header__links
    display: flex
    list-style: none
    padding: 0
    margin: 0
    justify-content: center
    align-items: center

  .Header__link
    margin-right: 20px

    & > a
      color: deepskyblue
      text-decoration: none
      padding-bottom: 8px
      
      &:hover
        border-bottom: 1px solid deepskyblue
</style>