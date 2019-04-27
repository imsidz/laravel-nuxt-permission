// export default function ({ $axios, store }){

// 	 $axios.onError(error => {
// 	 	return;
//         if (error.response.status === 422) {
//             store.dispatch('validation/setErrors', error.response.data.errors)
//            //stop the function call here, so we do not reject the error.
//             return Promise.reject(error);
//         }

//         return Promise.reject(error)
//     })
// 	// $axios.onError(error => {
// 	// 	if (error.response.status === 422) {
// 	// 		store.dispatch('validation/setErrors', error.response.data.errors)
// 	// 		return;
// 	// 	}

// 	// 	return Promise.reject(error)
// 	// })

// 	$axios.onRequest(() => {
// 		store.dispatch('validation/clearErrors')
// 	})
// }


// // export default function ({ $axios, redirect }) {
// //   $axios.onError(error => {
// //     if(error.response.status === 422) {
    	
// //     }
// //   })
// // }