<template>
	<div class="row mt-12">
		<div class="col-md-12">
			<div class="card shadow">
					<div class="card-header border-0">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="mb-0">Edit Users</h3>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form @submit.prevent="submit">
							<div class="row">
								<div class="form-group col-md-12">
									<label>Name</label>
									<input type="text" class="form-control" v-model="user.name">
									<span class="alert-danger"></span>
								</div>

								<div class="form-group col-md-12">
									<label>Email</label>
									<input type="text" class="form-control" v-model="user.email">
									<span class="alert-danger"></span>
								</div>

								<div class="form-group col-md-12">
									<label>Roles</label>
									<v-select v-model="user.roles" multiple taggable :options="roles"></v-select>
									<span class="alert-danger"></span>
								</div>
							</div>
							<button class="btn btn-info" @click.prevent="submit">Submit</button>
						</form>
					</div>
				</div>
		</div>
	  </div>
</template>

<script>
import Swal from 'sweetalert2'
	export default {
		layout: 'admin',
		middleware: 'edit-users',
		async asyncData({ $axios, params }) {
		  const user = await $axios.$get(`/user/ ${params.id}`)
			const roles = await $axios.$get(`/allRoleNames`)
		  return { user: user.data, roles: roles.data }
		},

		methods: {
			submit() {
				this.$axios.post(`/user/${this.user.id}`, {
					name: this.user.name,
					email: this.user.email,
					roles: this.user.roles
				})
				.then((response) => {
					console.log('saved')
						if (response.status == 200) {
								Swal.fire({
										title: 'Hurrey!!',
										text: response.data.message,
										type: 'success',
										showCancelButton: false,
										confirmButtonColor: '#3085d6',
										confirmButtonText: 'Ok',
										animation: false,
										customClass: {
												popup: 'animated zoomInDown'
										}
								}).then((result) => {

										this.$router.push('/admin/users');

								})
						}
				})
			},
		}
	}
</script>