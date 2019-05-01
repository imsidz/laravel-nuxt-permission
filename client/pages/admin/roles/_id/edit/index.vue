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
									<input type="text" class="form-control" v-model="role.name">
									<span class="alert-danger"></span>
								</div>
								<div class="form-group col-md-12">
									<label>Roles</label>
									<v-select v-model="role.permissionName" multiple :options="permissions"></v-select>
									<span class="alert-danger"></span>
								</div>
							</div>
							<button class="btn btn-info" @click.prevent="submit">Update</button>
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
		middleware: 'edit-role',
		async asyncData({ $axios, params }) {
		    const role = await $axios.$get(`/role/${params.id}`)
		    const permissions = await $axios.$get(`/permissions`)
		    return { role: role.data, permissions: permissions.data }
		},

		methods: {
			submit() {
				this.$axios.post(`/role/${this.role.id}`, {
					name: this.role.name,
					permissions: this.role.permissionName
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

									this.$router.push('/admin/roles');

								})
						}
				})
				.catch((res) => {
					this.$notify({
						group: 'error',
						title: 'Important message',
						text: res.response.data.errors.message
					});
					
					this.$store.dispatch('validation/setErrors', res.response.data.errors)
				})
			},
		}
	}
</script>