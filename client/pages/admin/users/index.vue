<template>
	<div class="row mt-12">
		<div class="col-md-12">
			<div class="card shadow">
	            <div class="card-header border-0">
	              <div class="row align-items-center">
	                <div class="col">
	                  <h3 class="mb-0">Page visits</h3>
	                </div>
	                <div class="col text-right">
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
	                    <th scope="col">Email</th>
	                    <th scope="col" width="10%">Role</th>
	                    <th scope="col" width="5%">Edit</th>
	                    <th scope="col" width="5%">Block</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <tr v-for="user,index in users" :key="user.id">
	                    <th scope="row">
	                      {{ index + 1 }}
	                    </th>
	                    <td>
	                    	{{ user.name }}
	                    </td>
	                    <td>
	                     	{{ user.email }}
	                    </td>
	                    <td>
							<div v-for="role in user.roles">
								<p>{{ role }}</p>
							</div>	                    	
	                    </td>
	                    
	                    <td>
	                      <nuxt-link :to="'/admin/users/' + user.id + '/edit'" class="btn btn-warning">Edit</nuxt-link>
	                    </td>
	                    <td>
	                    	<button class="btn btn-danger" @click.prevent="deleteBlog(user.id, index)">Block</button>
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
		middleware: 'see-users',
		layout: 'admin',
		async asyncData({ $axios }) {
		  const data = await $axios.$get('/users')
		  return { users: data.data }
		}
	}
</script>