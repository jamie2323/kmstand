<template>
	<div class="Bar"><h1>{{ title }}</h1></div>
</template>

<script>
export default {
	props: ['title']
}
</script>

<style lang="stylus">
  .Bar 
    display flex
    justify-content: center
    align-items: center
    flex 1
    height 100px
    background #1bb1b2   
    h1
      margin: 0
      font-family: 'Lato', sans-serif
      font-weight: 300
      font-size: 50px
      text-transform: uppercase
      color white   
</style>