<template>
<modal title="New Topic">
  <form class="Modal__form" @submit.prevent="createTopic">
    <p>{{ ride.date }}</p>
  </form>
</modal>
</template>

<script>

import Modal from './Modal.vue'

export default {

  components: { Modal },

  props: ['ride'],

  data () {
    return {
      newTopic: { title: '', body: '', category_id: 0 },
      showLoader: false
    }
  },

  methods: {
    createTopic () {
      this.showLoader = true;

      // topicServices.create(this.newTopic)
      //   .then(topic => {
      //     this.$dispatch('topicWasCreated', topic.data);
      //     this.showLoader = false;
      //     this.$root.modalIsOpen = false;
      //   });
      
      // // Clear inputs
      // this.newTopic.title = '';
      // this.newTopic.body = '';
    }
  }
}
</script>
