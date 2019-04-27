export default function ({ store, redirect }) {
  if (store.state.auth.loggedIn) {
  	console.log('trigger guest')
    return redirect('/')
  }
}