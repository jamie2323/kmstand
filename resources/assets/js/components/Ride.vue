<template>
<!-- <show-ride-modal :ride="ride"></show-ride-modal>
 -->    
 	<tr>
        <td>{{ ride.user.name }}</td>
        <td>{{ ride.location.from }}</td>
        <td>{{ ride.location.to }}</td>
        <td>{{ ride.type.name }}</td>
        <td>{{ ride.date }}</td>
        <td>
            <a @click="show" class="btn-show">Bekijk</a>
            <a v-link="{ name: 'ritten' }" class="btn-edit">Bewerk</a>
            <a v-link="{ name: 'ritten' }" class="btn-delete">Verwijder</a>
        </td>
    </tr>               
</template>

<script>

import ShowRideModal from './ShowRideModal.vue';

export default {

	components: { ShowRideModal }, 

	props: ['ride'],

	methods: {
			show () { 
				this.$root.showModal();
			}
		}
}		
</script>

<style lang="stylus">

.btn-edit, .btn-delete, .btn-show {
	background: #1bb1b2;
	text-decoration: none;
	color: white;
	padding: 3px;
}
@media screen and (max-width: 800px) {
  tr { 
    display: flex; 
    flex-direction: row;
    flex-wrap: wrap;
    margin: 0.5em 0;
    border: 1px solid rgba(3,3,3,0.2);
  }
  td, th {
    flex: 1 1 150px;
    border: 0.5px solid rgba(3,3,3,0.2);
  }
  td.edit-buttons, td.empty {
    /*flex: 1 0 90%;
    text-align: center;*/
  }
}  
</style>