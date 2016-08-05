<template>
<banner :title="title"></banner>
<div class="panel">
	<table class="table">
    <thead>
        <tr>
            <th>Door</th>
            <th>Van</th>
            <th>Naar</th>
            <th>Type</th>
            <th>Datum</th>
        </tr>
    </thead>  
        <tbody v-for="ride in rides" is="ride" :ride="ride"></tbody>
  </table>
</div>

 <div class="Pagination">
  <a
    v-if="+page-1 >= 1"
    v-link="{name: 'ritten', query: { page: +page - 1 }}"
    class="Page-link Page-link--prev">
    Terug
  </a>
  <a
    v-if="+page+1 <= lastPage"
    v-link="{name:'ritten', query: { page: +page + 1 }}"
    class="Page-link Page-link--next">
    Volgende
  </a>
</div>
</template>

<script>

import Banner from './Banner.vue';
import RideService from '../services/RideService.js';
import Ride from './Ride.vue';

export default {
	components: { Banner, Ride }, 

	data () {
		return {
			rides: [],
			title: 'Ritten',
			page: 1,
			lastPage: 1
		}
	},

	route: {
		data ({ to }) {
			this.page = to.query.page || 1;
	        return RideService.getAll(this.page, this.lastPage)
	          .then(({ data }) => ({
	            rides: data.rides,
              lastPage: data.lastPage
	          }));
	    }
	}
}
</script>

<style lang="stylus">
table.table { width: 100%; padding: 2em; border-color: grey; }

.table th, .table td { 
  text-align: left; 
  padding: 0.25em;
}

.panel {
	border-radius: 2px;
  border: 0;
  box-shadow: 0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12);
}

.Pagination
  display: flex;
  justify-content: center;
  margin-top: 20px;
  margin-bottom: 20px;

.Page-link
  text-decoration: none
  color: deepskyblue
  padding: 11px
  display: flex
  justify-content: center
  align-items: center
  width: 80px
  height: 30px
  
  &:hover
    background: #1bb1b2
    color: white
    border-radius: 1px
    border: none

.Page-link--prev:before
  content: '◀'
  font-size: 14px
  padding: 1px
  position: relative
  top: 1px
  left: -4px

.Page-link+.Page-link
  border-left: 1px solid #1bb1b2

.Page-link:hover+.Page-link
  border: white

.Page-link--next:after
  content: '▶'
  padding: 1px
  font-size: 14px
  position: relative
  top: 1px
  left: 4px

</style>