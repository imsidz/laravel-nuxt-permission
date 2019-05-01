<template>
	<div class="row mt-12">
		<div class="col-md-12">
			<div class="card shadow">
	            <div class="card-header border-0">
	              <div class="row align-items-center">
	                <div class="col">
	                  <h3 class="mb-0">Roles</h3>
	                </div>
	                <div class="col text-right">
										<nuxt-link to="/admin/roles/create" class="btn btn-info btn-sm"> Add Roles </nuxt-link>
	                	<form class="form-inline float-right">
	                		<div class="input-group">
										<input type="text" class="form-control form-control-sm" placeholder="Search">
										<div class="input-group-append">
											<button class="btn btn-success btn-sm" type="submit">Search</button> 
										</div>
									</div>
	                	</form>
	                </div> 
	              </div>
	            </div>
	            <div class="table-responsive">
	              <!-- Projects table -->
	              <table class="table align-items-center table-flush">
	                <thead class="thead-light">
	                  <tr>
	                    <th scope="col" width="3%">#</th>
	                    <th scope="col">Name</th>
	                    <th scope="col">Permission Lists</th>
	                    <th scope="col" width="5%">Edit</th>
	                    <th scope="col" width="5%">Block</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <tr v-for="role,index in roles" :key="role.id">
	                    <th scope="row">
	                      {{ index + 1 }}
	                    </th>
	                    <td>
	                    	{{ role.name }}
	                    </td>
	                   
	                    <td class="">
							
											<ul class="d-inline-flex list-unstyled">
												<li v-for="permission in role.permissions"><span class="badge badge-primary bg-primary rounded text-white mr-1"> {{ permission.name }} </span></li>
											</ul>
								                    	
	                    </td>
	                    
	                    <td>
	                      <nuxt-link :to="'/admin/roles/' + role.id + '/edit'" class="btn btn-warning">Edit</nuxt-link>
	                    </td>
	                    <td>
	                    	<button class="btn btn-danger" @click.prevent="deleteBlog(role.id, index)">Delete</button>
	                    </td>
	                  </tr>
	                  
	                </tbody>
	              </table>
	            </div>
	          </div>
				</div>
      </div>
</template>

<script>	
	export default {
		middleware: 'see-roles',
		layout: 'admin',
		async asyncData({ $axios }) {
		  const data = await $axios.$get('/roles')
		  return { roles: data.data }
		}
	}
</script>