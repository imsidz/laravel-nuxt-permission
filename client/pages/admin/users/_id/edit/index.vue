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
	            	<form>
	            		<div class="row">
	            			<div class="form-group col-md-12">
			            		<label>Name</label>
			            		<input type="text" class="form-control">
			            		<span class="alert-danger"></span>
			            	</div>

			            	<div class="form-group col-md-12">
			            		<label>Email</label>
			            		<input type="text" class="form-control">
			            		<span class="alert-danger"></span>
			            	</div>

			            	<div class="form-group col-md-12">
			            		<label>Roles</label>
			            		<input type="text" class="form-control">
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
	export default {
		 layout: 'admin',
		 middleware: 'edit-users'
	}
</script>