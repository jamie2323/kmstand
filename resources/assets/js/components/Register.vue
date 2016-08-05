<template>
	<banner :title="title"></banner>
	<div class="register-view">
		<form class="Register-form" @submit.prevent="register">
			<input
		      type="text"
		      name="name"
		      class="Register-form__input"
		      v-model="user.name"
		      placeholder="Name" required>

		    <input
		      type="email"
		      name="email"
		      class="Register-form__input"
		      v-model="user.email"
		      placeholder="Email" required>

		    <input
		      type="password"
		      name="password"
		      class="Register-form__input"
		      v-model="user.password"
		      placeholder="Password" required>
		      
		    <button type="submit" class="Button Register-form__button">
		      Register
		    </button>
		  </form>
	</div>
</template>

<script>

import Banner from './Banner.vue'
import auth from '../services/Auth'

export default {
	
	components: { Banner },

	data() {
		return {
			title: 'Registreer',
			user: {
				name: '',
				password: '',
				email: ''
			}
		}
	},

	methods: {
		register () {
			auth.register(this.user);
      		this.creds = { name: '', email: '', password: '' };
		}
	}
}	

</script>

<style lang="stylus">
.register-view
  display: flex
  width: 500px
  justify-content: center
  align-items: center
  margin: 0 auto
  flex-wrap: wrap

.Register-form
  display: flex
  justify-content: center
  align-items: center
  flex-wrap: wrap
  margin-top: 5px

.Register-form__input
  flex-basis: 100%
  height: 40px
  padding: 10px
  border-radius: 1px
  border: 1px solid #eee
  margin-top: 15px

  &:hover, &:active, &:focus
    border: 1px solid darken(#eee, 10%)
    box-shadow: none
    outline: none

.Register-form__button
  margin-top: 15px  
</style>