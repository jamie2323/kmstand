import Vue from 'vue';

export default {

  getAll (page, lastpage) {
    return Vue.http.get('/api/rides?page=' + page);
  }
}
