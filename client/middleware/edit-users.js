export default function ({ store, redirect, route, history }) {
	if (store.state.auth.loggedIn) {
		if (!store.state.auth.user.permissions.includes('edit user')) {

		    return redirect('/')
		    // window.history.go(-1)
		    // this.$router.go(-1)
		}
	}else{
		return redirect('/login')
	}
  
}